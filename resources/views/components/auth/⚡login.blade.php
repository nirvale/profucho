<?php

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Http;

new class extends Component
{
    #[Validate]
    public $email;
    #[Validate]
    public $password;
    public $remember;
    public bool $showPassword = false;
    public $brandLogoImage, $brandLogoImage2, $organization;
    protected $userCache = null;

    // ✅ Renombrado para claridad
    public $turnstileToken = null;

    protected function rules()
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255', 'min:10'],
            'password' => ['required', 'string'],
            'turnstileToken' => ['required', 'string'], // ✅ Nombre consistente
        ];
    }

    protected function getUser(): ?User
    {
        if (!$this->userCache) {
            $this->userCache = User::where('email', $this->email)->first();
        }
        return $this->userCache;
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));
        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
    }

    protected function ensureIsNotAccountSuspended(): void
    {
        $user = $this->getUser();
        if (!$user) return;

        if ($user->hasRole(['Suspendido'])) {
            throw ValidationException::withMessages([
                'email' => __('The account is suspended, please contact the administrator.'),
            ]);
        }

        if ($user->hasRole(['Eliminado'])) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }
    }

    /**
     *  Método dedicado para verificar Turnstile
     */
    protected function verifyTurnstile(): void
    {
        // 1. Validar que el token existe
        if (empty($this->turnstileToken)) {
            $this->dispatch('reload-turnstile');
            throw ValidationException::withMessages([
                'turnstileToken' => __('Are u human?, Please check.'),
            ]);
        }

        // 2. Verificar con Cloudflare
        $response = Http::asForm()->post(
            'https://challenges.cloudflare.com/turnstile/v0/siteverify',
            [
                'secret' => config('app.turnstile.secret_key'), // Desde .env
                'response' => $this->turnstileToken,
                'remoteip' => request()->ip(),
            ]
        );

        // 3. Manejar errores HTTP
        if ($response->failed()) {
            logger()->error('Turnstile verification failed', [
                'status' => $response->status(),
                'body' => $response->body(),
                'token' => $this->turnstileToken,
            ]);

            throw new \Exception('Error al verificar el captcha. Inténtalo de nuevo.');
        }

        $data = $response->json();

        // 4. Verificar si el token es válido
        if (!($data['success'] ?? false)) {
            $errorCode = $data['error-codes'][0] ?? 'unknown';

            //  Mensajes de error más descriptivos
            $errorMessages = [
                'missing-input-response' => 'No se recibió el token de verificación.',
                'invalid-input-response' => 'El token de verificación no es válido.',
                'expired-input-response' => 'El token de verificación ha expirado.',
                'timeout' => 'La verificación ha expirado por tiempo.',
                'invalid-input-secret' => 'Error de configuración del captcha.',
            ];

            $this->dispatch('reload-turnstile');
            $this->turnstileToken = null;

            throw ValidationException::withMessages([
                'turnstileToken' => $errorMessages[$errorCode] ?? 'Verificación de seguridad fallida. Inténtalo de nuevo.',
            ]);
        }
    }

    public function loginUser(): void
    {
        //  1. Validar Turnstile (primero)
        $this->verifyTurnstile();

        //  2. Validar campos (incluyendo token)
        $this->validate();

        //  3. Verificar límites y suspensiones
        $this->ensureIsNotRateLimited();
        $this->ensureIsNotAccountSuspended();

        //  4. Intentar autenticar
        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->dispatch('reload-turnstile');
            $this->turnstileToken = null;
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        //  5. Login exitoso
        RateLimiter::clear($this->throttleKey());
        Session::regenerate();
        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    public function mount()
    {
        if (auth()->check()) {
            return $this->redirect('/intranet');
        }

    }



    public function togglePassword()
    {
        $this->showPassword = !$this->showPassword;
    }
};
?>


<x-ui.auth.login.card title="Log in">
    <x-ui.auth.login.email-input wire:model="email" />
    <x-ui.auth.login.password :showPassword="$showPassword" wire:model="password" />
    <x-ui.auth.login.login-button />
    <x-ui.auth.login.remember />

    <script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('turnstileHandler', () => ({
            token: null,
            widgetId: null,
            container: null, //  Guardar referencia al contenedor

            init() {
                this.container = document.querySelector('#turnstile-container');

                // Renderizar Turnstile
                this.$nextTick(() => {
                    this.renderTurnstile();
                });

                // Callbacks de Turnstile
                window.onSuccess = (token) => {
                    // console.log(' Turnstile completado');
                    this.token = token;
                    this.$wire.set('turnstileToken', token);
                };

                window.onError = (errorCode) => {
                    // console.error(' Turnstile Error:', errorCode);
                    this.$dispatch('notifyalpine', 'Error',
                        'Error en la verificación: ' + errorCode,
                        'error', 3000);
                };

                window.onExpired = () => {
                    // console.warn(' Turnstile expirado');
                    this.token = null;
                    this.$wire.set('turnstileToken', null);
                };

                window.onTimeout = () => {
                    console.warn(' Turnstile timeout');
                };

                // Escuchar evento de recarga
                this.$wire.on('reload-turnstile', () => {
                    // console.log(' Recargando Turnstile...');
                    this.reloadTurnstile();
                });
            },

            renderTurnstile() {
                const isMobile = window.innerWidth < 480;
                if (!this.container || typeof turnstile === 'undefined') {
                    console.warn(' Contenedor o Turnstile no disponible');
                    return;
                }

                // ✅ Limpiar el contenedor ANTES de renderizar
                this.cleanupTurnstile();

                turnstile.ready(() => {
                    // console.log(' Turnstile listo, renderizando...');

                    // ✅ Crear un nuevo div para Turnstile
                    const div = document.createElement('div');
                    div.className = 'cf-turnstile';
                    div.setAttribute('data-sitekey', '{{ config("app.turnstile.site_key") }}');
                    div.setAttribute('data-theme', 'light');
                    div.setAttribute('data-size', 'flexible');
                    this.container.appendChild(div);

                    // ✅ Renderizar y guardar widgetId
                    this.widgetId = turnstile.render(div, {
                        sitekey: '{{ config("app.turnstile.site_key") }}',
                        theme: 'light',
                        size: isMobile ? 'normal' : 'flexible',
                        callback: (token) => {
                            // console.log(' Challenge Success:', token);
                            this.token = token;
                            this.$wire.set('turnstileToken', token);
                        },
                        'error-callback': (errorCode) => {
                            console.error(' Error:', errorCode);
                            this.$dispatch('notifyalpine', 'Error',
                                'Error en la verificación: ' + errorCode,
                                'error', 3000);
                        },
                        'expired-callback': () => {
                            console.warn('⚠️ Token expirado');
                            this.token = null;
                            this.$wire.set('turnstileToken', null);
                        },
                        'timeout-callback': () => {
                            console.warn('⏱️ Timeout');
                        }
                    });

                    // console.log(' Turnstile renderizado, widgetId:', this.widgetId);
                });
            },

            // ✅ Método para limpiar el widget correctamente
            cleanupTurnstile() {
                if (this.widgetId !== null && typeof turnstile !== 'undefined') {
                    try {
                        // ✅ Usar turnstile.remove() para limpiar correctamente
                        turnstile.remove(this.widgetId);
                        console.log('✅ Turnstile removido correctamente');
                    } catch (e) {
                        console.warn('⚠️ Error al remover Turnstile:', e);
                    }
                    this.widgetId = null;
                }

                // ✅ Limpiar el contenedor
                if (this.container) {
                    this.container.innerHTML = '';
                }
            },

            reloadTurnstile() {
                // ✅ Limpiar el widget actual antes de recargar
                this.cleanupTurnstile();

                // ✅ Renderizar de nuevo
                setTimeout(() => {
                    this.renderTurnstile();
                }, 100);

                this.token = null;
                this.$wire.set('turnstileToken', null);
            }
        }));
    });

    </script>

    {{-- ✅ Contenedor con Alpine --}}
    <div x-data="turnstileHandler" class="text-center" >
        <!-- ✅ Contenedor vacío - Turnstile se renderiza aquí -->
        <div id="turnstile-container" wire:ignore class="flex justify-center items-center w-full"></div>
        <x-ui.forms.input-error for="turnstileToken" />


    </div>

    <x-ui.auth.login.register />
</x-ui.auth.login.card>

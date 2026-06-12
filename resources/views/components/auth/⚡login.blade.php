<?php

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Session;
use App\Models\User;

new class extends Component
{
  #[Validate]
  public $email;
  #[Validate]
  public $password;

  public $remember;

  public bool $showPassword = false;

  public $brandLogoImage, $brandLogoImage2, $organization;

  protected $userCache = null; // Almacenar el usuario

  protected function rules()
  {
      return [
          'email' => [
              'required',
              'string',
              'email',
              'max:255',
              'min:10'

          ],
          'password'=> [
            'required',
            'string',
            // 'min:8'
          ]
      ];
  }

  protected function getUser(): ?User
  {
      if (!$this->userCache) {
          $this->userCache = User::where('email', $this->email)->first();
      }
      return $this->userCache;
  }

  /**
   * Ensure the authentication request is not rate limited.
   */
  protected function ensureIsNotRateLimited(): void
  {
      if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
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

  /**
   * Get the authentication rate limiting throttle key.
   */
  protected function throttleKey(): string
  {
      return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
  }

  protected function ensureIsNotAccountSuspended(): void
  {
    // $user = User::find(5)->customerProfile->company;
    // $user = User::with(['customerProfile.user_status'])->where('email',$this->email)->first();
    // $customerProfile = User::with(['customerProfile'])->where('email',$this->email)->first()->customerProfile;
    // $employeeProfile = User::with(['employeeProfile'])->where('email',$this->email)->first()->employeeProfile;
    // dd($user->customerProfile->user_status->name);

    $user = $this->getUser();
    if ($user) {
      if ($user->hasRole(['Suspendido']) ) {
        throw ValidationException::withMessages([
            'email' => [
                __('The account is suspended, please contact to the administrator.'),
            ]
        ]);
      }elseif ($user->hasRole(['Eliminado'])) {
        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
      }
    }else {
      return;
    }

  }


  public function loginUser(): void
  {

    $this->validate();

    $this->ensureIsNotRateLimited();
    $this->ensureIsNotAccountSuspended();

    if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    RateLimiter::clear($this->throttleKey());
    Session::regenerate();

    $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);    
  }

  // public function render()
  // {
  //     return view('livewire.login');
  // }

  public function mount()
  {
      // Redirect if already logged in
      if (auth()->check()) {
          return $this->redirect('/intranet'); // home route
      }
  }

  public function togglePassword()
  {
      $this->showPassword = !$this->showPassword;
  }

};
?>


<x-ui.auth.login.card  title="Log in">
  <x-ui.auth.login.email-input wire:model="email" />
  <x-ui.auth.login.password :showPassword="$showPassword" wire:model="password" />
  <x-ui.auth.login.login-button/>
  <x-ui.auth.login.remember />
  <x-ui.auth.login.register />
</x-ui.auth.login.card>

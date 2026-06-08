<?php

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Intranet\Profile;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


new class extends Component
{
  use WithFileUploads;
  #[Validate]
  public $name;
  #[Validate]
  public $address;
  #[Validate]
  public $phone;
  #[Validate]





  public $email;
  #[Validate]
  public $avatar;
  #[Validate]
  public $password;
  #[Validate]
  public $password_confirmation;

  public bool $showPassword = false;

  public $brandLogoImage, $brandLogoImage2, $organization;

  public $cleanup=['name','address','phone','email','avatar','password','password_confirmation'];
  public $cleanupSuccess=['name','address','phone','avatar','password_confirmation'];


  protected function rules()
  {

      $rules = [
          'name' => ['required', 'string', 'max:255', 'min:10'],
          'address' => ['nullable', 'string', 'max:255', 'min:10'],
          'phone' => ['nullable', 'digits:10', 'integer'],
          'email' => [
              'required',
              'string',
              'email',
              'max:255',
              'min:10',
              Rule::unique('users') //
          ],
          'avatar' => ['nullable', 'image', 'mimes:jpeg,jpg', 'dimensions:max_width=300,max_height=300', 'max:256'],
          'password'=>[
              // 'nullable',           // Permite que esté vacío
              'confirmed',
              Password::min(8)
              ->letters()
              ->numbers(),
              // ->mixedCase()
              // ->symbols()
              // ->uncompromised(),
          ]
      ];

    return $rules;
  }


  public function togglePassword()
  {
      $this->showPassword = !$this->showPassword;
  }

  public function register(){
    $this->validate();

    try {
        DB::beginTransaction();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ])->syncRoles(['Jugador']);
        $profile = Profile::create([
            'phone' => $this->phone,
            'address' => $this->address,
            'user_id' => $user->id,
            'is_active'=> 1
        ]);

        // Manejar avatar si se subió uno nuevo
        if (isset($this->avatar)) {
            // Eliminar avatares anteriores si existen
            Storage::delete([
                'images/profiles/'.$user->id.'-200x200.jpg',
                'images/profiles/'.$user->id.'-50x50.jpg'
            ]);

            // Guardar nuevos avatares
            Image::decode($this->avatar)
                ->cover(200, 200)
                ->save('../storage/app/private/images/profiles/'.$user->id.'-200x200.jpg',
                       progressive: true, quality: 70);

            Image::decode($this->avatar)
                ->cover(50, 50)
                ->save('../storage/app/private/images/profiles/'.$user->id.'-50x50.jpg',
                       progressive: true, quality: 70);
        }

        DB::commit();
        // $this->reset($this->cleanup);
        $this->resetValidation();
        $this->reset($this->cleanupSuccess);
        $this->dispatch('notifyalpine', '¡Terminado!',
                       'Se registró exitosamente su usuario: '.$user->name,
                       'success', 2500);
        $this->dispatch('iniciarSecuenciaLogin');
        // $this->dispatch('reloadUserMenu');

    } catch (\Exception $e) {
        DB::rollBack();
        Log::info('error al crear usuario: '. $e);
        $this->dispatch('notifyalpine', '¡Error!',
                       'Falló la creación del usuario',
                       'error', 0);
     $this->reset($this->cleanup);
     $this->resetValidation();
    }
  }

  protected function throttleKey(): string
  {
      return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
  }

  #[On('breakfast')]
  public function login(): void
  {
    $remember=true;
    if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $remember)) {
        RateLimiter::hit($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    RateLimiter::clear($this->throttleKey());
    Session::regenerate();

    $this->redirectIntended(default: route('welcome', absolute: false), navigate: true);
  }

};
?>


<x-ui.auth.register.card :brandLogoImage="$brandLogoImage" :brandLogoImage2="$brandLogoImage2" :organization="$organization" title="{{__('Register')}}">
  <x-ui.auth.register.file label="{{__('Photo')}}" helper="JPG:300x300 Max" :isOptional=true  class=" w-full file-input-primary" wire:model.live.blur="avatar" model="avatar"  />
  <x-ui.forms.input label="{{__('Full name')}}" type="text" placeholder="{{__('Full name')}}" :isOptional=false wire:model.live.blur="name"  model="name" />
  <x-ui.forms.input label="{{__('Email')}}" type="email" placeholder="{{__('Email')}}" :isOptional=false wire:model.live.blur="email" model="email" />
  <x-ui.forms.input label="{{__('Address')}}" type="text" placeholder="{{__('Address')}}" :isOptional=true wire:model.live.blur="address" model="address"/>
  <x-ui.forms.input label="{{__('Phone')}}" type="text" placeholder="{{__('Phone')}}" :isOptional=true wire:model.live.blur="phone" model="phone" />
  <x-ui.forms.password label="{{__('Password')}}" type="password" placeholder="******" :isOptional=false wire:model.live.blur="password" model="password" :showPassword=$showPassword/>
  <x-ui.forms.password label="{{__('Password Confirmation')}}" type="password" placeholder="******" :isOptional=false wire:model.live.blur="password_confirmation" model="password_confirmation" :showPassword=$showPassword/>
  <div class="flex gap-3 p-5 justify-center">
    <button class="btn btn-primary w-24 lg:w-40 rounded-sm" wire:loading.attr="disabled" wire:target="register" wire:click="register">
      <span wire:loading.remove wire:target="register">{{__('Register')}}</span>
      <span wire:loading wire:target="register">
          <span class="loading loading-spinner loading-sm"></span>
          {{__('Saving...')}}
      </span>
    </button>
  </div>
</x-ui.auth.login.card>

<script>
    this.on('iniciarSecuenciaLogin', () => {
        setTimeout(() => {
            this.$dispatchSelf('breakfast');
        }, 3000);
    });
</script>

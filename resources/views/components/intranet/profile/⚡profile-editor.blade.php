<?php

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\Intranet\Profile;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
  use WithFileUploads;
    //catálogos
    //fin catálogos
    public $logoText;
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
    public $userId=null;
    public bool $showPassword=false;
    public $editingPassword=false;
    public $editingProfile=false;

    public $cleanup=['name','address','phone','email','avatar','password','password_confirmation','editingProfile','editingPassword'];




    public function mount(){
      $user=User::FindOrFail(Auth::Id());
      $this->userId=$user->id;
      // dd($this->role);
      $this->name=$user->name;
      $this->email=$user->email;
      $user->load('profile');
      $existsA = Storage::exists('images/profiles/'. $user->id.'-200x200.jpg');
      $this->phone=$user->profile->phone;
      $this->address=$user->profile->address;

    }

    public function togglePassword()
    {
        $this->showPassword = !$this->showPassword;
        // $this->js('console.log("'.$this->showPassword.'")');
    }

    public function cancel(){
      $this->reset($this->cleanup);
      $this->resetValidation();
    }

    // public function orgToJson(){
    //
    //   // $this->organization = Organization::first()->toArray();
    //   return $this->organization->toJson();
    //
    //
    // }
    public function updated($propertyName)
    {
        // $this->validateOnly($propertyName);
        $this->js("console.log('".$propertyName."')");
    }

    // public function updatedEditBoxOpen(){
    //   $this->js("console.log('cambie')");
    // }

    protected function rules()
    {
        if ($this->editingProfile) {
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
                  Rule::unique('users')->ignore($this->userId) // Importante para edición
              ],
              'avatar' => ['nullable', 'image', 'mimes:jpeg,jpg', 'dimensions:max_width=300,max_height=300', 'max:256'],
          ];
        }
        if ($this->editingPassword) {
          $rules['password'] = [
              // 'nullable',           // Permite que esté vacío
              'confirmed',
              Password::min(8)
              ->letters()
              ->numbers(),
              // ->mixedCase()
              // ->symbols()
              // ->uncompromised(),
          ];
        }

        return $rules;
    }

    public function update()
    {
        // $this->editingProfile=true;
        $this->validate();

        try {
            DB::beginTransaction();

            $user = User::findOrFail(Auth::Id());
            // Actualizar datos básicos del usuario
            $user->name = $this->name;
            $user->email = $this->email;

            // Solo actualizar password si se proporcionó uno nuevo
            if ($this->password) {
                $user->password = Hash::make($this->password);
            }

            // Actualizar perfil
            $user->profile->phone = $this->phone;
            $user->profile->address = $this->address;

            // push() guarda el usuario Y el perfil
            $user->push();  // <-- Esto guarda ambos modelos user y profile

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
            $this->dispatch('notifyalpine', '¡Terminado!',
                           'Se actualizó exitosamente su usuario: '.$user->name,
                           'success', 0);
            $this->dispatch('reloadUserMenu');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::info('error al actualizar usuario: '. $e);
            $this->dispatch('notifyalpine', '¡Error!',
                           'Falló la actualización del usuario',
                           'error', 0);
         $this->reset($this->cleanup);
         $this->resetValidation();
        }
    }

    public function updatePassword()
    {
        // $this->editingPassword=true;
        $this->validate();

        try {
            DB::beginTransaction();

            $user = User::findOrFail(Auth::Id());
            // Solo actualizar password si se proporcionó uno nuevo
            if ($this->password) {
                $user->password = Hash::make($this->password);
            }
            // push() guarda el usuario Y el perfil
            $user->update();  // <-- modelos user
            DB::commit();
            // $this->reset($this->cleanup);
            $this->resetValidation();
            $this->dispatch('notifyalpine', '¡Terminado!',
                           'Se actualizó exitosamente su usuario: '.$user->name,
                           'success', 0);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::info('error al actualizar usuario: '. $e);
            $this->dispatch('notifyalpine', '¡Error!',
                           'Falló la actualización del usuario',
                           'error', 0);
         $this->reset($this->cleanup);
         $this->resetValidation();
        }
    }
};
?>
<section class="flex flex-col gap-4 w-full" x-data="trackerAlive" >
  <div id="main" class="mx-auto w-full" >
    <div class="card w-full  shadow-sm mx-auto rounded h-full bg-base-300/30" >
      <div class="card-body">

        <div class="flex justify-between">
          {{-- <h2 class="text-xl font-bold">{{__('My Profile')}}</h2> --}}
          <span :class="badgeClasses" class="badge badge-md" x-text="badgeStatus ? '{{ __("Edit Mode") }}' : '{{ __("Observer Mode") }}'">{{__('Caution')}}</span>
          <div class="w-32">
            <x-ui.logo-secondary />
          </div>
          {{-- <span class="text-xl">ArkSystem</span> --}}
        </div>
      </div>
    </div>
  </div>
  <div class="join join-vertical bg-base-300/30">
    <div class="collapse collapse-arrow join-item border-base-300 border">
      <input type="radio" name="profile-accordion" checked="checked" />
      <div class="collapse-title font-semibold">{{__('Personal data')}}</div>
      <div class="collapse-content text-sm lg:flex lg:flex-row lg:justify-between lg:w-3/4 lg:mx-auto text-center lg:text-justify px-0">
      @if ($userId && !$avatar)
        <div class="avatar  py-5  flex-col items-center lg:bg-base-100/50 lg:p-2 lg:border rounded-sm rounded-r-none lg:shadow-sm">

          <div class="mx-auto border rounded-sm rounded-r-none shadow-sm bg-base-100/70 p-2  w-[200px] h-[200px] ">
            {{-- <img src="https://img.daisyui.com/images/profile/demo/yellingwoman@192.webp" /> --}}
            <img class="border" src="{{route('avatar.displayImage',$userId.'-200x200.jpg')}}" alt="">
          </div>
          <span class=" label text-primary p-2">{{__('Profile photo')}}</span>
        </div>
      @endif

      @if ($avatar)
        <div class="avatar  py-5  flex-col items-center lg:bg-base-100/50 lg:p-2 lg:border rounded-sm rounded-r-none lg:shadow-sm">

          <div class="mx-auto border rounded-sm rounded-r-none shadow-sm bg-base-100/70 p-2  w-[200px] h-[200px] ">
            {{-- <img src="https://img.daisyui.com/images/profile/demo/yellingwoman@192.webp" /> --}}
            <img class="border " src="{{ $avatar->temporaryUrl() }}">
          </div>
          <span class="label text-primary rounded-sm p-2">{{__('Preview profile photo')}}</span>
        </div>
      @endif
        <div class="w-full border rounded-sm rounded-l-none shadow-sm bg-base-100/70 p-2"  @mousedown="switchPrfl" @mousedown.away="outsidePrfl">
          <x-ui.forms.input label="{{__('Full name')}}" type="text" placeholder="{{__('Full name')}}" :isOptional=false wire:model.live.blur="name"  model="name" />
          <x-ui.forms.input label="{{__('Email')}}" type="email" placeholder="{{__('Email')}}" :isOptional=false wire:model.live.blur="email" model="email" />
          <x-ui.forms.input label="{{__('Address')}}" type="text" placeholder="{{__('Address')}}" :isOptional=true wire:model.live.blur="address" model="address"/>
          <x-ui.forms.input label="{{__('Phone')}}" type="text" placeholder="{{__('Phone')}}" :isOptional=true wire:model.live.blur="phone" model="phone" />
          <x-ui.forms.file label="{{__('Photo')}}" helper="JPG:300x300 Max" :isOptional=true  class=" w-full file-input-primary" wire:model.live.blur="avatar" model="avatar"  />
          <div class="flex gap-3 p-5 justify-center">
            <button class="btn btn-primary w-24 lg:w-40 rounded-sm" wire:loading.attr="disabled" wire:target="update" wire:click="update">
              <span wire:loading.remove wire:target="update">{{__('Save')}}</span>
              <span wire:loading wire:target="update">
                  <span class="loading loading-spinner loading-sm"></span>
                  {{__('Saving...')}}
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="collapse collapse-arrow join-item border-base-300 border">
      <input type="radio" name="profile-accordion" />
      <div class="collapse-title font-semibold">{{__('Password')}}</div>
      <div class="collapse-content text-sm lg:w-2/5 lg:mx-auto px-0" @mousedown="switchPwd" @mousedown.away="outsidePwd">
        <div class=" border rounded-sm shadow-sm bg-base-100/70 p-2">
          <x-ui.forms.password label="{{__('Password')}}" type="password" placeholder="******" :isOptional=false wire:model.live.blur="password" model="password" :showPassword=$showPassword/>
          <x-ui.forms.password label="{{__('Password Confirmation')}}" type="password" placeholder="******" :isOptional=false wire:model.live.blur="password_confirmation" model="password_confirmation" :showPassword=$showPassword/>
          <div class="flex gap-3 p-5 justify-center">
            <button class="btn btn-primary w-24 lg:w-40 rounded-sm" wire:loading.attr="disabled" wire:target="updatePassword" wire:click="updatePassword">
              <span wire:loading.remove wire:target="updatePassword">{{__('Save')}}</span>
              <span wire:loading wire:target="updatePassword">
                  <span class="loading loading-spinner loading-sm"></span>
                  {{__('Saving...')}}
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="collapse collapse-arrow join-item border-base-300 border">
      <input type="radio" name="my-accordion-4" />
      <div class="collapse-title font-semibold">How do I update my profile information?</div>
      <div class="collapse-content text-sm">Go to "My Account" settings and select "Edit Profile" to make changes.</div>
    </div> --}}
  </div>
{{-- fin editar usuario --}}
</section>

<?php

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

new class extends Component
{
    public $name;
    public $avatar;
    public $id;

    private $profilePathAvatar = 'images/profiles';

    protected $listeners = ['reloadUserMenu' => '$refresh'];

      // public function render()
      // {
      //     return view('livewire.profile.user-menu');
      // }

      public function boot()
      {
          $user = Auth::user()->load('profile');
          $this->name=strtok($user->name,' ').nl2br(str_replace(' ', '&nbsp;', '           '));
          $this->id=$user->id;
          if ($user->profile) {
            $this->avatar=$user->id .'-50x50.jpg';
          // }elseif ($user->customerProfile) {
          //   $this->avatar=$user->customerProfile->avatar .'-50x50.jpg';
          }else {
            $this->avatar='avatar.svg';
          }



      }


      public function logout()
      {
          Auth::guard('web')->logout();

          Session::invalidate();
          Session::regenerateToken();

          return redirect('/');
      }
};
?>

<div class="">
  <!--navbar menu-->
  <li class="hidden lg:block">
    <div class="flex gap-2">
      <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="relative">
          <div class="">
            <span class="mr-1">{!! $name ?? 'nombre de usuario'  !!}</span>
            <div class="w-10 rounded-full btn btn-ghost btn-circle avatar bg-neutral-content absolute -bottom-2.5 right-0 -mx-3.5 z-2">
              <img class="btn-circle" src="{{ route('avatar.displayImage', $avatar) . '?t=' . now()->timestamp }}}} }}" />
            </div>
          </div>
        </div>
        <ul tabindex="0" class="menu  dropdown-content bg-primary rounded-b-sm z-1 mt-0 w-52 p-0 shadow">
          <li><a href="{{ route('profile.show') }}">{{ __('Profile')}}<span class="badge bg-primary text-primary-content">{{ __('New') }}</span></a></li>
          @role(['Administrador de Sistema','Administrador'])
          <li>
             <details>
               <summary>{{ __('Settings')}}</summary>
               <ul>
                 <li class=""><a href="{{ route('admin.users') }}">{{ __('Users')}}</a></li>
                 {{-- <li><a>item 2</a></li> --}}
               </ul>
             </details>
           </li>
          @endrole
          <!-- Authentication -->
          <li><a wire:click='logout'>Logout</a></li>

        </ul>
      </div>
    </div>
  </li>
    <!--vertical menu-->
    <li class="block lg:hidden">
      <details close>
        <summary>
          <h5 class="flex items-center gap-2 -ml-2 drop-shadow-xl">
            <span class="text-info">
              <div class="w-10 rounded-full btn btn-ghost btn-circle avatar bg-neutral-content">
                <img class="btn-circle" src="{{ route('avatar.displayImage', $avatar) }}" />
              </div>
            </span>
            <span class="mr-1">{!! $name ?? 'nombre de usuario'  !!}</span>
          </h5>
        </summary>
        <ul>
          <li><a href="{{ route('profile.show') }}">{{ __('Profile')}}<span class="badge bg-primary text-primary-content">{{ __('New') }}</span></a></li>
          @role(['Administrador de Sistema','Administrador'])
          <li>
             <details>
               <summary>{{ __('Settings')}}</summary>
               <ul>
                 <li class=""><a href="{{ route('admin.users') }}">{{ __('Users')}}</a></li>
                 {{-- <li><a>item 2</a></li> --}}
               </ul>
             </details>
           </li>
          @endrole
          <!-- Authentication -->
          <li><a wire:click='logout'>Logout</a></li>
        </ul>
      </details>
    </li>



</div>

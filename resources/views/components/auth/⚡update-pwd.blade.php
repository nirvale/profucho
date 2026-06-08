<?php

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\On;

new class extends Component
{
  use AuthorizesRequests;
  public $modalId;
  public $title;
  public $content;
  public $icon;
  public $id;
  public $showSave = true;
  public $showClose = true;
  public $fullName;
  public $password;
  public $password_confirmation;
  public $status='modal-close';
  public $showPassword=true;

  public bool $showErrorBag = true;
  public $cleanup=['modalId','status','title','content','icon','showSave','showClose','fullName','password','password_confirmation',];

  // protected $listeners = [
  //   'showModalChangePwd' => 'showModal',
  // ];

  public function boot(){

  }

  public function savePwd(){
    $this->authorize('Administrar operación');
    $validated = $this->validate([
      'password' => ['required', 'string', Password::default(), 'confirmed'],
    ]);

      try {
        $this->showSave=false;
        $this->showClose=false;
        DB::BeginTransaction();
        $user = User::find($this->id);
        $user->password=Hash::make(e($this->password));
        $user->push();
        DB::commit();
        $this->dispatch('notifyalpine', '¡Terminado!',
                       'Se actualizó el passowrd:' ,
                       'success', 0);
        $this->reset($this->cleanup);
        $this->dispatch('pg:eventRefresh-userTable', []);
      } catch (\Exception $e) {
        DB::rollBack();
        Log::info('error al guardar: '. $e  . "\n" );
        $this->reset($this->cleanup);
        $this->dispatch('notifyalpine', '¡Terminado!',
                       'Falló actualización de passowrd:' ,
                       'error', 0);
      }







  }

  #[On('showModalChangePwd')]
  public function showModal($options){
    $this->authorize('Administrar operación');
    // dd($options);
    $this->id=$options['content']['id'];
    $this->fullName=$options['content']['name'];
    $this->modalId=$options['modalId'];
    $this->status=$options['status'];
    $this->title=$options['title'];
    $this->content=$options['content'];
    $this->icon=$options['icon'];
  }
  public function closeModal(){
    $this->reset($this->cleanup);
    // $this->resetErrorBag(); // Clear all error messages
    $this->resetValidation(); // Reset validation rules
  }
  public function togglePassword()
  {
      $this->showPassword = !$this->showPassword;
  }

};
?>

<x-ui.modal modalId="{{$modalId}}" status="{{$status}}" title="{{$title}}" icon="{!! $icon !!}">
  {{-- {!!$content!!} --}}
  <span class="text-xl text-secondary/80 mx-auto text-center block w-full">Usuario:{{' '.$this->fullName}}</span>

  <x-ui.forms.password label="{{__('Password')}}" type="password" placeholder="******" :isOptional=false wire:model.live.blur="password" model="password" :showPassword=$showPassword/>
  <x-ui.forms.password label="{{__('Password Confirmation')}}" type="password" placeholder="******" :isOptional=false wire:model.live.blur="password_confirmation" model="password_confirmation" :showPassword=$showPassword/>
  <x-slot:buttons>
      <x-ui.forms.save-button wireFunction="savePwd" :showSave="$showSave" />
      <x-ui.forms.close-button wireFunction="closeModal" :showClose="$showClose" />
  </x-slot>
</x-ui.modal>

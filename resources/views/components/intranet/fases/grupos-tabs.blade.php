@props(['roundIdActive'])
<div>
  <!-- name of each tab group should be unique -->
  <div class="tabs tabs-lift -mx-5">

    <input id="tabFaseUno" type="radio" name="my_tabs_2" class="tab" aria-label="{{__('First Round')}}" {{ $roundIdActive == 1 ? 'checked' : '' }} />
    <div class="tab-content border-base-300 bg-base-100 p-0 lg:p-2">
      <livewire:group-fase-table :round=1 :stage=1 :suscDisabled=true />
    </div>

    <input id="tabFaseDos" type="radio" name="my_tabs_2" class="tab" aria-label="{{__('Second Round')}}"  {{ $roundIdActive == 2 ? 'checked' : '' }}/>
    <div class="tab-content border-base-300 bg-base-100 p-0 lg:p-2">
      <livewire:group-fase-table :round=2 :stage=1 :suscDisabled=false />
    </div>


    <input id="tabFaseTres" type="radio" name="my_tabs_2" class="tab" aria-label="{{__('Third Round')}}"  {{ $roundIdActive == 3 ? 'checked' : '' }}/>
    <div class="tab-content border-base-300 bg-base-100 p-0 lg:p-20">
      <div class="flex w-full items-center justify-center">
         <span class="animate-ping text-xl text-primary  font-bold">{{__('Coming Soon')}}</span>
      </div>
    </div>
  </div>

</div>

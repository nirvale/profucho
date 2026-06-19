<x-layouts.app :powergrid=false title='Fase de grupos' :js="[]">
    <x-layouts.main>
      <x-slot name="breadcrumbs">
        <li><a>{{ __('Home') }}</a></li>
        <li><a>{{__('Dashboard')}}</a></li>
        {{-- <li><a>{{__('Groups')}}</a></li> --}}
      </x-slot>
      <x-layouts.main-header >
        <x-slot:icon>
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" class="text-primary/70"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M13 8V4q0-.425.288-.712T14 3h6q.425 0 .713.288T21 4v4q0 .425-.288.713T20 9h-6q-.425 0-.712-.288T13 8M3 12V4q0-.425.288-.712T4 3h6q.425 0 .713.288T11 4v8q0 .425-.288.713T10 13H4q-.425 0-.712-.288T3 12m10 8v-8q0-.425.288-.712T14 11h6q.425 0 .713.288T21 12v8q0 .425-.288.713T20 21h-6q-.425 0-.712-.288T13 20M3 20v-4q0-.425.288-.712T4 15h6q.425 0 .713.288T11 16v4q0 .425-.288.713T10 21H4q-.425 0-.712-.288T3 20m2-9h4V5H5zm10 8h4v-6h-4zm0-12h4V5h-4zM5 19h4v-2H5zm4-2"/>
          </svg>
        </x-slot:icon>
        <x-slot:title1>
          {{__('Dashboard')}}
        </x-slot:>
        <x-slot:title2>
          {{  Auth::user()->name}}
        </x-slot:title2>
      </x-layouts.main-header>
      <x-layouts.flexwrap >
        <x-dashboard.top />

        <x-dashboard.groups  />
        {{-- <livewire:group-fase-table/> --}}

      </x-layouts.flexwrap>
    </x-layouts.main>
    <x-slot:modals >
      <livewire:auth.update-pwd/>
  </x-slot:modals>

</x-layouts.app>

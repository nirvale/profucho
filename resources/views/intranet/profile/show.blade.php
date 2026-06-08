<x-layouts.app :powergrid=false title='Perfil' :js="['resources/js/hero.js']">
    <x-layouts.main>
      <x-slot name="breadcrumbs">
        <li><a>{{ __('User') }}</a></li>
        <li><a>{{__('Profile')}}</a></li>
      </x-slot>
      <x-layouts.flexwrap >
        <livewire:intranet.profile.profile-editor  />
      </x-layouts.flexwrap>
    </x-layouts.main>
</x-layouts.app>

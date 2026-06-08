@props(['powergrid' => false, 'title','js'=>[]])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="">
    <x-layouts.head :powergrid="$powergrid" :title='$title' :js="$js"/>
    <body class="bg-base-100 text-base-content min-h-screen">
        <div class="drawer">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />

            <div class="drawer-content flex flex-col min-h-screen bg-repeat" style="background-image: url('{{ asset('storage/cesped.jpg') }}');">
                <x-layouts.header />
                {{ $slot }}
                <x-layouts.footer />
            </div>

            <x-layouts.sidebar />
        </div>
        <x-layouts.notifier/>
        {{$modals ?? ''}}
    </body>
</html>

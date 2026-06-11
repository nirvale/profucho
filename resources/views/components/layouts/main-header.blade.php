<div id="main-header" class="mx-auto w-full" >
  <div class="card w-full  shadow-sm mx-auto rounded h-full bg-base-300/30" >
    <div class="card-body py-4">

      <div class="flex flex-col-reverse justify-center items-center gap-2 lg:flex-row lg:justify-between">
        {{-- <h2 class="text-2xl text-base-content/70 font-bold flex flex-row gap-2 items-center">{{$slot}}</h2> --}}
        <div class="text-2xl text-base-content/70 font-bold flex flex-col lg:flex-row gap-2 items-center">
          <div class="flex items-center justify-between gap-2">
            {{$icon}}
            <div>{{$title1}}</div>
            <div class="hidden lg:block text-secondary"> |</div>
          </div>
          <div class="text-lg lg:text-2xl" >{{$title2}}</div>
        </div>

        {{-- <span :class="badgeClasses" class="badge badge-md" x-text="badgeStatus ? '{{ __("Edit Mode") }}' : '{{ __("Observer Mode") }}'">{{__('Caution')}}</span> --}}
        <div class="w-32 mt-1">
          <x-ui.logo-secondary />
        </div>
        {{-- <span class="text-xl">ArkSystem</span> --}}
      </div>
    </div>
  </div>
</div>

<div id="main-header" class="mx-auto w-full" >
  <div class="card w-full  shadow-sm mx-auto rounded h-full bg-base-300/30" >
    <div class="card-body py-4">

      <div class="flex justify-between">
        <h2 class="text-2xl text-base-content/70 font-bold flex flex-row gap-2 items-center">{{$slot}}</h2>
        {{-- <span :class="badgeClasses" class="badge badge-md" x-text="badgeStatus ? '{{ __("Edit Mode") }}' : '{{ __("Observer Mode") }}'">{{__('Caution')}}</span> --}}
        <div class="w-32 mt-1">
          <x-ui.logo-secondary />
        </div>
        {{-- <span class="text-xl">ArkSystem</span> --}}
      </div>
    </div>
  </div>
</div>

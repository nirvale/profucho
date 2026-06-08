<div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-300 grow starting:opacity-0 px-4 lg:px-20 py-0">
  <main class="flex  w-full  px-1 lg:py-5 lg:px-10 flex-col bg-base-100 h-full shadow-lg ">
    <x-layouts.breadcrumbs>
      {{$breadcrumbs}}
    </x-layouts.breadcrumbs>

      {{$slot}}


  </main>

</div>

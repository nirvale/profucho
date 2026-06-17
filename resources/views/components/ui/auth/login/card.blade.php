@props(['title'])
{{-- <div class="text-[13px] leading-[20px] flex-1 p-2 pb-12 lg:pb-0 lg:p-2 bg-base-200 text-base-content rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none shadow-lg">
    <div class="mx-auto card w-full max-w-md bg-base-200">
        <div class="card-body">
            <!-- Logo o Título -->

            <x-ui.logo-primary />

            <!-- Formulario -->
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-full border p-4">
              <legend class="fieldset-legend">{{$title}}</legend>
                {{$slot}}
            </fieldset>
        </div>
    </div>
</div> --}}


<div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-700 grow starting:opacity-0 px-4 lg:px-20 py-6 lg:py-8">
    <main class="flex max-w-[400px] w-full flex-col-reverse lg:flex-row bg-base-100/90 rounded-lg shadow-lg shadow-neutral/30">
        <!-- Left Column: Text Content -->
        <div class="mx-auto card w-full max-w-md ">
            <div class="card-body items-center">
                <!-- Logo o Título -->

                <x-ui.logo-primary-responsive class="w-[300px] -my-10"  />

                <!-- Formulario -->
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-full border p-2">
                  <legend class="fieldset-legend">{{$title}}</legend>
                    {{$slot}}
                </fieldset>
            </div>
        </div>



    </main>
</div>

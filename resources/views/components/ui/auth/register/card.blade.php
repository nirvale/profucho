@props(['brandLogoImage','brandLogoImage2','organization','title'])
<div class="text-[13px] leading-[20px] flex-1 p-2 pb-12 lg:pb-0 lg:p-2 bg-transparent text-base-content ">
    <div class="mx-auto card w-full max-w-md bg-base-200/90 my-10">
        <div class="card-body">
            <!-- Logo o Título -->
            <x-ui.logo-secondary  />
            <!-- Formulario -->
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-full border p-4">
              <legend class="fieldset-legend">{{$title}}</legend>
                {{$slot}}
            </fieldset>
        </div>
    </div>
</div>

<x-layouts.app :powergrid=true title='Fase de grupos' :js="[]">
    <x-layouts.main>
      <x-slot name="breadcrumbs">
        <li><a>{{ __('Home') }}</a></li>
        <li><a>{{__('Instructions')}}</a></li>
        {{-- <li><a>{{__('Groups')}}</a></li> --}}
      </x-slot>
      <x-layouts.main-header >
        <x-slot:icon>
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" class="text-primary/70"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M13 8V4q0-.425.288-.712T14 3h6q.425 0 .713.288T21 4v4q0 .425-.288.713T20 9h-6q-.425 0-.712-.288T13 8M3 12V4q0-.425.288-.712T4 3h6q.425 0 .713.288T11 4v8q0 .425-.288.713T10 13H4q-.425 0-.712-.288T3 12m10 8v-8q0-.425.288-.712T14 11h6q.425 0 .713.288T21 12v8q0 .425-.288.713T20 21h-6q-.425 0-.712-.288T13 20M3 20v-4q0-.425.288-.712T4 15h6q.425 0 .713.288T11 16v4q0 .425-.288.713T10 21H4q-.425 0-.712-.288T3 20m2-9h4V5H5zm10 8h4v-6h-4zm0-12h4V5h-4zM5 19h4v-2H5zm4-2"/>
          </svg>
        </x-slot:icon>
        <x-slot:title1>
          {{__('Instructions')}}
        </x-slot:>
        <x-slot:title2>
          {{  Auth::user()->name ?? 'Invitado' }}
        </x-slot:title2>
      </x-layouts.main-header>
      <x-layouts.flexwrap >
        <!-- name of each tab group should be unique -->
<div class="tabs tabs-lift">
  <input type="radio" name="my_tabs_3" class="tab" aria-label="{{__('Score')}}" checked="checked"/>
  <div class="tab-content bg-base-100 border-base-300 p-6">

    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
      <table class="table text-md text-base-content font-medium">
        <!-- head -->
        <thead>
          <tr>
            <th>Id</th>
            <th>Evento</th>
            <th>Puntos</th>
            <th>Descripción</th>
          </tr>
        </thead>
        <tbody>
          <!-- row 1 -->
          <tr>
            <th>1</th>
            <td>Acertar Ganador o empate</td>
            <td>3</td>
            <td>Si el jugador acierta al pronosticar el equipo ganador o empate en el partido, suma 3 puntos</td>
          </tr>
          <!-- row 2 -->
          <tr>
            <th>2</th>
            <td>Distancia goles equipo local</td>
            <td>3 (max.)</td>
            <td>
              <ul>
                <li>* Si el jugador acierta a los goles marcados por el equipo local, suma 3 puntos.</li>
                <li>* Si el jugador queda a una distancia de 1 gol de los marcados por el equipo local, suma 2 puntos.</li>
                <li>* Si el jugador queda a una distancia de 2 goles de los marcados por el equipo local, suma 1 puntos.</li>
                <li>* Si el jugador queda a una distancia de 3 o más goles de los marcados por el equipo local, no suma puntos.</li>
              </ul>
            </td>
          </tr>
          <!-- row 3 -->
          <tr>
            <th>3</th>
            <td>Distancia goles equipo visitante</td>
            <td>3 (max.)</td>
            <td>
              <ul>
                <li>* Si el jugador acierta a los goles marcados por el equipo visitante, suma 3 puntos.</li>
                <li>* Si el jugador queda a una distancia de 1 gol de los marcados por el equipo visitante, suma 2 puntos.</li>
                <li>* Si el jugador queda a una distancia de 2 goles de los marcados por el equipo visitante, suma 1 puntos.</li>
                <li>* Si el jugador queda a una distancia de 3 o más goles de los marcados por el equipo visitante, no suma puntos.</li>
              </ul>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>

  <input type="radio" name="my_tabs_3" class="tab" aria-label="{{__('Fill')}}"  />
  <div class="tab-content bg-base-100 border-base-300 p-6">

    <ul class="steps steps-vertical text-md text-base-content font-medium">
      <li class="step step-primary">Regístrate (Sólo email y password son obligatorios).</li>
      <li class="step step-info">Suscríbete a una quiniela (Fase 1 de grupos y sus rondas, etc..).</li>
      <li class="step step-neutral">Llena el marcador de cada partido en la tabla, el marcador se bloquea 5 minutos antes de inicio del partido.</li>
      <li class="step step-warning">Ya estás participando.</li>
    </ul>

  </div>

  <input type="radio" name="my_tabs_3" class="tab" aria-label="{{__('Edit')}}" />
  <div class="tab-content bg-base-100 border-base-300 p-6 text-md text-base-content font-medium">
    <ul>
      <li>* Para editar un marcador pronosticado solo haz click en el boton gris de la sección "Editable", tu marcador para ese partido se reiniciará </li>
      <li>* Si el botón está verde puedes editar libremente.</li>
      <li>* La edición se cierra 5 minutos antes de la hora programada del partido.</li>
      <li>* No olvides marcar tu partido como no editable (botón en gris), si queda con la leyenda "sin marcador", no puede generar puntos, no se asume que es cero...</li>
    </ul>


  </div>
</div>
      </x-layouts.flexwrap>
    </x-layouts.main>
    <x-slot:modals >
      <livewire:auth.update-pwd/>
  </x-slot:modals>

</x-layouts.app>

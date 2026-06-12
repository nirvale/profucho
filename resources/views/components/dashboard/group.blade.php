@props(['group','members'])


<div class="card bg-base-100 shadow-md border border-base-300 lg:basis-[calc(25%-0.75rem)] ">
    <!-- Cabecera -->
    <div class="bg-secondary text-secondary-content p-3">
        <h2 class="text-md font-bold">Grupo {{$group}}</h2>
    </div>

    <!-- Tabla -->
    <div class="overflow-x-auto">
        <table class="table table-xs">
            <thead>
                <tr class="bg-base-200">
                    <th>Pos</th>
                    <th>Equipo</th>
                    <th class="text-center">Pts</th>
                    <th class="text-center">GF</th>
                    <th class="text-center">GC</th>
                    <th class="text-center">DG</th>
                 </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                  <tr>
                      <td class="text-center font-bold">{{$member->position}}</td>
                      <td>{{$member->team->name}}</td>
                      <td class="text-center font-bold text-primary">{{$member->team->points}}</td>
                      <td class="text-center">{{$member->team->goals_scored}}</td>
                      <td class="text-center">{{$member->team->goals_conceded}}</td>
                      <td class="text-center {{$member->team->goals_difference > 0 ? 'text-success' : 'text-error' }}">{{$member->team->goals_difference > 0 ? '+'.$member->team->goals_difference : $member->team->goals_difference}}</td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

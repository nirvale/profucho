<?php

namespace App\Livewire;

use App\Models\Intranet\Game;
use App\Models\Intranet\Bet;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use App\Models\Intranet\Team;

final class Game16Table extends PowerGridComponent
{
    public string $tableName = 'game16Table';
    public bool $showErrorBag = true;


    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::responsive()
                ->fixedColumns('name', 'actions'),
            PowerGrid::footer()
                ->showPerPage(perPage: 50, perPageValues: [0, 50, 100, 500])
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        $this->authorize('Administrar operación');
        return Game::query()
                      ->join('stages','stages.id','=','games.stage_id')
                      ->join('teams as hometeams','hometeams.id','=','games.home_team_id')
                      ->join('teams as awayteams','awayteams.id','=','games.away_team_id')

                      ->select(
                          'games.*',
                          'hometeams.name as home_team_name',    // ← Añadir para ver los equipos
                          'awayteams.name as away_team_name',     // ← Añadir para ver los equipos
                          'stages.name as stage_name',
                      )

                      ;
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('hometeam',function($model){
              return $model->hometeam->name;
            })
            ->add('awayteam',function($model){
              return $model->awayteam->name;
            })
            ->add('stagename',function($model){
              return $model->stage->name;
            })
            ->add('round',function($model){
              return $model->round;
            })
            ->add('home_score',function($model){
                return $model->home_score ?? 'Sin marcador';
            })
            ->add('away_score',function($model){
                return $model->away_score ?? 'Sin marcador';
            })
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
            ->sortable()
            ->searchable(),
            Column::make('Stage', 'stagename','stages.name')
                ->sortable()
                ->searchable(),
            Column::make('Round', 'round')
                ->sortable(),
                // ->searchable(),
            Column::make('Home Team', 'hometeam','hometeams.name')
                ->sortable()
                ->searchable(),
            Column::make('Away Team', 'awayteam','awayteams.name')
                ->sortable()
                ->searchable(),
            Column::make('Date', 'date')
                ->sortable()
                ->searchable(),
            Column::make('Home Score', 'home_score')
            ->sortable()
            ->contentClasses('text-error font-bold text-md animate-pulse')
             ->editOnClick(
               hasPermission: auth()->user()?->can('Administrar operación'),
               saveOnMouseOut: true
              ),
                // ->searchable(),
            Column::make('Away Score', 'away_score')
                ->sortable()
                ->contentClasses('text-error font-bold text-md animate-pulse')
                 ->editOnClick(
                   hasPermission: auth()->user()?->can('Administrar operación'),
                   saveOnMouseOut: true
                  ),
            Column::make('Home YC', 'home_yc')
                ->sortable()
                ->contentClasses('text-error font-bold text-md animate-pulse')
                ->editOnClick(
                  hasPermission: auth()->user()?->can('Administrar operación'),
                  saveOnMouseOut: true
                 ),
            Column::make('Home RC', 'home_rc')
                ->sortable()
                ->contentClasses('text-error font-bold text-md animate-pulse')
                ->editOnClick(
                  hasPermission: auth()->user()?->can('Administrar operación'),
                  saveOnMouseOut: true
                 ),
            Column::make('Away YC', 'away_yc')
                ->sortable()
                ->contentClasses('text-error font-bold text-md animate-pulse')
                ->editOnClick(
                  hasPermission: auth()->user()?->can('Administrar operación'),
                  saveOnMouseOut: true
                 ),
            Column::make('Away RC', 'away_rc')
                ->sortable()
                ->contentClasses('text-error font-bold text-md animate-pulse')
                ->editOnClick(
                  hasPermission: auth()->user()?->can('Administrar operación'),
                  saveOnMouseOut: true
                 ),
            Column::make(
                title: __('Is Active'),
                field: 'is_active',

            )
                ->toggleable(
                    hasPermission: auth()->user()?->can('Administrar operación'),
                    trueLabel: 'Yes',
                    falseLabel: 'No'
                )
                ->sortable(),

        ];
    }

    public function onUpdatedEditable(string|int $id, string $field, string $value): void
    {
        try {
            DB::beginTransaction();

            $game = Game::findOrFail($id);

            if ($game->is_active) {
                $this->dispatch('notifyalpine', '¡Error!', 'No se puede actualizar el resultado mientras las apuestas estén abiertas.', 'error', 3000);
                return;
            }

            // ==================== TARJETAS ====================
            if ($field == 'home_yc') {
                if ($game->home_yc > 0) {
                  $game->hometeam->decrement('yellow_cards', $game->home_yc);
                }
                $game->home_yc = e($value);
                $game->hometeam->increment('yellow_cards', (int)$value);
                $game->save();
            }

            if ($field == 'home_rc') {
                if ($game->home_rc > 0) {
                  $game->hometeam->decrement('red_cards', $game->home_rc);
                }
                $game->home_rc = e($value);
                $game->hometeam->increment('red_cards', (int)$value);
                $game->save();
            }

            if ($field == 'away_yc') {
                if ($game->away_yc > 0) {
                  $game->awayteam->decrement('yellow_cards', $game->away_yc);
                }
                $game->away_yc = e($value);
                $game->awayteam->increment('yellow_cards', (int)$value);
                $game->save();
            }

            if ($field == 'away_rc') {
                if ($game->away_rc > 0) {
                  $game->awayteam->decrement('red_cards', $game->away_rc);
                }
                $game->away_rc = e($value);
                $game->awayteam->increment('red_cards', (int)$value);
                $game->save();
            }

            // ==================== DATOS COMUNES PARA PUNTUACIONES ====================


            // ==================== HOME_SCORE ====================
            if ($field == 'home_score' && is_null($game->home_score)) {
              $maxPoints = 3;
              $bets = Bet::where('game_id', $game->id)
                  ->whereNotNull('home_score_p')
                  ->whereNotNull('away_score_p')
                  ->where('status', true)
                  ->get();

                $safeValue = (int)$value;
                $game->home_score = $safeValue;
                $whoWin = null;

                if (!is_null($game->away_score)) {
                    if ($game->home_score > $game->away_score) {
                        $whoWin = 1;
                        // Team::where('id', $game->home_team_id)->increment('points', 3);
                    } elseif ($game->home_score < $game->away_score) {
                        $whoWin = 2;
                        // Team::where('id', $game->away_team_id)->increment('points', 3);
                    } elseif ($game->home_score == $game->away_score) {
                        $whoWin = 3;
                        // Team::where('id', $game->away_team_id)->increment('points', 1);
                        // Team::where('id', $game->home_team_id)->increment('points', 1);
                    }
                }

                foreach ($bets as $bet) {
                    // Puntos por precisión del marcador local
                    $puntos = $maxPoints - abs($safeValue - $bet->home_score_p);
                    if ($puntos > 0) {
                        $bet->increment('score', $puntos);
                        if ($bet->user && $bet->user->profile) {
                            $bet->user->profile->increment('score_' . $game->round, $puntos);
                        }
                    }

                    // Puntos por acertar el ganador
                    if (!is_null($game->away_score)) {
                        $pronosticWhoWin = null;
                        if ($bet->home_score_p > $bet->away_score_p) {
                            $pronosticWhoWin = 1;
                        } elseif ($bet->home_score_p < $bet->away_score_p) {
                            $pronosticWhoWin = 2;
                        } elseif ($bet->home_score_p == $bet->away_score_p) {
                            $pronosticWhoWin = 3;
                        }

                        // if ($pronosticWhoWin == $whoWin) {
                        //     $extraPoints = ($whoWin == 3) ? 1 : 3;
                        //     $bet->increment('score', $extraPoints);
                        //     if ($bet->user && $bet->user->profile) {
                        //         $bet->user->profile->increment('score_' . $game->round, $extraPoints);
                        //     }
                        // }

                        if ($pronosticWhoWin == $whoWin) {
                            $bet->increment('score', 6);  // Directo, sin ternario
                            if ($bet->user && $bet->user->profile) {
                                $bet->user->profile->increment('score_' . $game->round, 6);
                            }
                        }
                    }
                }

                $game->save();

                // Estadísticas de goles
                // Team::where('id', $game->home_team_id)->increment('goals_scored', $safeValue);
                // Team::where('id', $game->home_team_id)->increment('goals_difference', $safeValue);
                // Team::where('id', $game->away_team_id)->increment('goals_conceded', $safeValue);
                // Team::where('id', $game->away_team_id)->decrement('goals_difference', $safeValue);
            }

            // ==================== AWAY_SCORE ====================
            if ($field == 'away_score' && is_null($game->away_score)) {
              $maxPoints = 3;
              $bets = Bet::where('game_id', $game->id)
                  ->whereNotNull('home_score_p')
                  ->whereNotNull('away_score_p')
                  ->where('status', true)
                  ->get();
                $safeValue = (int)$value;
                $game->away_score = $safeValue;
                $whoWin = null;

                if (!is_null($game->home_score)) {
                    if ($game->home_score > $game->away_score) {
                        $whoWin = 1;
                        // Team::where('id', $game->home_team_id)->increment('points', 3);
                    } elseif ($game->home_score < $game->away_score) {
                        $whoWin = 2;
                        // Team::where('id', $game->away_team_id)->increment('points', 3);
                    } elseif ($game->home_score == $game->away_score) {
                        $whoWin = 3;
                        // Team::where('id', $game->away_team_id)->increment('points', 1);
                        // Team::where('id', $game->home_team_id)->increment('points', 1);
                    }
                }

                foreach ($bets as $bet) {
                    // Puntos por precisión del marcador visitante
                    $puntos = $maxPoints - abs($safeValue - $bet->away_score_p);
                    if ($puntos > 0) {
                        $bet->increment('score', $puntos);
                        if ($bet->user && $bet->user->profile) {
                            $bet->user->profile->increment('score_' . $game->round, $puntos);
                        }
                    }

                    // Puntos por acertar el ganador
                    if (!is_null($game->home_score)) {
                        $pronosticWhoWin = null;
                        if ($bet->home_score_p > $bet->away_score_p) {
                            $pronosticWhoWin = 1;
                        } elseif ($bet->home_score_p < $bet->away_score_p) {
                            $pronosticWhoWin = 2;
                        } elseif ($bet->home_score_p == $bet->away_score_p) {
                            $pronosticWhoWin = 3;
                        }

                        // if ($pronosticWhoWin == $whoWin) {
                        //     $extraPoints = ($whoWin == 3) ? 1 : 3;
                        //     $bet->increment('score', $extraPoints);
                        //     if ($bet->user && $bet->user->profile) {
                        //         $bet->user->profile->increment('score_' . $game->round, $extraPoints);
                        //     }
                        // }

                        if ($pronosticWhoWin == $whoWin) {
                            $bet->increment('score', 6);  // Directo, sin ternario
                            if ($bet->user && $bet->user->profile) {
                                $bet->user->profile->increment('score_' . $game->round, 6);
                            }
                        }
                    }
                }

                $game->save();

                // Estadísticas de goles
                // Team::where('id', $game->away_team_id)->increment('goals_scored', $safeValue);
                // Team::where('id', $game->away_team_id)->increment('goals_difference', $safeValue);
                // Team::where('id', $game->home_team_id)->increment('goals_conceded', $safeValue);
                // Team::where('id', $game->home_team_id)->decrement('goals_difference', $safeValue);
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatch('notifyalpine', '¡Error!', 'No se pudo actualizar el resultado. ' . $e->getMessage(), 'error', 3000);
            Log::error('Error en onUpdatedEditable: ' . $e->getMessage(), [
                'id' => $id,
                'field' => $field,
                'value' => $value,
                'trace' => $e->getTraceAsString()
            ]);
        }
    }

    public function onUpdatedToggleable(string|int $id, string $field, string $value): void
    {
        // Log::info('actualizando toggeable: '.$id."\n");
        $this->authorize('Administrar operación');
        try {
            DB::beginTransaction();
            $game = Game::findOrFail($id);

            // $bets= Bet::where('game_id','=',$game->id)->get();

            if ($field == 'is_active' && $game->is_active != e($value)) {

                Bet::where('game_id', $game->id)->update(['status' => !e($value)]);
                $game->is_active = e($value);
                $game->save();
            }
            DB::commit();
            if ($game->is_active) {
              $this->dispatch('notifyalpine', '¡Exito', 'Se marcó como activo el juego:<br>'.$game->id, 'success', 0);
            }elseif (!$game->is_active) {
              $this->dispatch('notifyalpine', '¡Exito', 'Se marcó como inactivo el juego:<br>'.$game->id, 'success', 0);
            }
            // $this->skipRender();
        } catch (\Exception $e) {
            DB::rollback();
            $this->dispatch('notifyalpine', '¡Error', 'Falla al inactivar el juego:<br>'.$game->id, 'error', 0);
            Log::error('desactivando juego: '.$e."\n");
        }
        //
        // game::query()->find($id)->update([
        //     $field => e($value),
        // ]);
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    // public function actions(Game $row): array
    // {
    //     return [
    //         Button::add('edit')
    //             ->slot('Edit: '.$row->id)
    //             ->id()
    //             ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
    //             ->dispatch('edit', ['rowId' => $row->id])
    //     ];
    // }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}

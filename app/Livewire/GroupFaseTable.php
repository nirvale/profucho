<?php

namespace App\Livewire;

use App\Models\Intranet\Bet;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use App\Models\User;
use App\Models\Intranet\Stage;
use App\Models\Intranet\Game;
use App\Models\Intranet\Amount;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use Illuminate\Validation\Validator;

final class GroupFaseTable extends PowerGridComponent
{
    use AuthorizesRequests;
    public string $tableName = 'groupFaseTable';
    public bool $showErrorBag = true;
    public $user;
    public $stage;
    public $stageFull;
    public $round;
    public $suscribed;
    public $roundenable;
    public $init;
    public $amount;
    public $home_score_p;
    public $away_score_p;


    public function mount(): void
    {
       parent::mount();
        // dd($this->round);
        $this->user = auth()->user();
        $this->suscribed=$this->user->profile->{"enabled_{$this->round}"};
        $this->init=$this->user->profile->init_1;
        $this->stageFull = Stage::findOrFail($this->stage);
        $this->amount = Amount::where('is_active','=',1)->where('stage_id','=',$this->stage)->first();
        // dd($this->user->profile);
        // Puedes hacer otras inicializaciones aquí
        // Pero NO modifiques datasource directamente
        // $query = Bet::query()->where('user_id',$this->user->id)->where('stage_id',$this->stage)->get();
        // dd($query[0]->user->bets);
    }

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


    public function header(): array
    {

        return [
            // Button::add('new')
            //     ->slot('
            //       <span class="flex items-center gap-1">
            //         <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="" viewBox="0 0 24 24"><!-- Icon from Material Symbols Light by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M18.25 10.5h-2.5q-.213 0-.356-.144t-.144-.357t.144-.356t.356-.143h2.5V7q0-.213.144-.356t.357-.144t.356.144t.143.356v2.5h2.5q.213 0 .356.144t.144.357t-.144.356t-.356.143h-2.5V13q0 .213-.144.356t-.357.144t-.356-.144T18.25 13zM9 11.385q-1.237 0-2.119-.882T6 8.385t.881-2.12T9 5.386t2.119.88t.881 2.12t-.881 2.118T9 11.385m-7 6.192v-.608q0-.619.36-1.158q.361-.54.97-.838q1.416-.679 2.834-1.018q1.417-.34 2.836-.34t2.837.34t2.832 1.018q.61.298.97.838q.361.539.361 1.158v.608q0 .44-.299.74q-.299.298-.74.298H3.04q-.441 0-.74-.299t-.3-.739m1 .039h12v-.647q0-.332-.215-.625q-.214-.292-.593-.494q-1.234-.598-2.545-.916T9 14.616t-2.646.318t-2.546.916q-.38.202-.593.494Q3 16.637 3 16.97zm6-7.231q.825 0 1.413-.588T11 8.384t-.587-1.412T9 6.384t-1.412.588T7 8.384t.588 1.413T9 10.384m0 7.232"/>
            //         </svg>'.
            //         __('New')
            //         .'
            //       </span>
            //       ')
            //     ->class('btn btn-primary btn-sm rounded-md ')
            //     ->icon('')
            //     ->attributes([
            //         'x-data' => 'subTrackerAlive',
            //         // 'x-show'=>'showNewButton',
            //         'x-on:click' => 'switchShowNewButton; $dispatch(\'switchnewbox\');',
            //         ':disabled' => '!showNewButton',
            //         '@shownewbutton.window' => 'switchShowNewButton',
            //         // 'x-transition:enter'=>'transition ease-out duration-100',
            //         // 'x-transition:enter-start'=>'opacity-0 transform scale-90',
            //         // 'x-transition:enter-end'=>'opacity-100 transform scale-100',
            //         // 'x-transition:leave'=>'transition ease-in duration-100',
            //         // 'x-transition:leave-start'=>'opacity-100 transform scale-100',
            //         // 'x-transition:leave-end'=>'opacity-0 transform scale-90',
            //         // 'wire:loading.attr'=>'disabled',
            //         // 'wire:target'=>'newUser',
            //         'wire:click' => 'newUser',
            //     ])
            //     ->id('new'),
            Button::add('crear')
                ->slot(view('components.ui.forms.play-button', [
                  'label' => 'Jugar $50.00',
                  'type' => 'create',
                ])->render())
                ->class('btn btn-success btn-sm rounded-sm mx-1 text-sm')
                ->attributes([
                    'x-data' => 'subTrackerAlive',
                    // 'x-show'=>'showNewButton',
                    // 'x-init' => "showNewButton = !{$this->user->profile->{"enabled_{$this->round}"}}",
                    'x-on:click' => 'switchShowNewButton;',
                    ':disabled' => '!showNewButton',
                    '@shownewbutton.window' => 'switchShowNewButton',
                    // 'x-transition:enter'=>'transition ease-out duration-100',
                    // 'x-transition:enter-start'=>'opacity-0 transform scale-90',
                    // 'x-transition:enter-end'=>'opacity-100 transform scale-100',
                    // 'x-transition:leave'=>'transition ease-in duration-100',
                    // 'x-transition:leave-start'=>'opacity-100 transform scale-100',
                    // 'x-transition:leave-end'=>'opacity-0 transform scale-90',
                    // 'wire:loading.attr'=>'disabled',
                    // 'wire:target'=>'newUser',
                    // 'wire:click' => 'newUser',
                ])->dispatch('suscribe',['stage'=>$this->stage,'round'=>$this->round])
                ->id('play-button'),
            Button::add('badge')
                ->slot(view('components.ui.forms.badge', [
                  // 'label' => 'test',
                  'type' => 'create',
                ])->render())
                ->class('')
                ->attributes([
                    'x-data' => 'subTrackerAlive',
                    // 'x-show'=>'showNewButton',
                    // 'x-init' => "showNewButton = !{$this->user->profile->{"enabled_{$this->round}"}};",
                    // 'x-on:click' => 'switchShowNewButton;',
                    // ':disabled' => '!showNewButton',
                    // '@shownewbutton.window' => 'switchShowNewButton',
                    'x-text'=> 'badgeText',
                    ':class' => 'newBoxOpenedBadgeClasses',
                    // 'x-transition:enter'=>'transition ease-out duration-100',
                    // 'x-transition:enter-start'=>'opacity-0 transform scale-90',
                    // 'x-transition:enter-end'=>'opacity-100 transform scale-100',
                    // 'x-transition:leave'=>'transition ease-in duration-100',
                    // 'x-transition:leave-start'=>'opacity-100 transform scale-100',
                    // 'x-transition:leave-end'=>'opacity-0 transform scale-90',
                    // 'wire:loading.attr'=>'disabled',
                    // 'wire:target'=>'newUser',
                    // 'wire:click' => 'newUser',
                ])
                ->id('badge'),

            // ->dispatch('testingHide', []), //para componente de fuera de powergrid
            // ->dispatch('testingHide', []),//para componente de fuera de powergrid
        ];

    }

    #[On('suscribe')]
    public function suscribe($stage,$round){

      if (!$stage || !$round || $stage != $this->stage || $round != $this->round) {
          return; // No es para este componente
      }

      if (!$this->user->profile->{"enabled_{$this->round}"}) {
        try {
          DB::beginTransaction();
          $this->user->profile->{"enabled_{$this->round}"}=true;
          $games=Game::where('stage_id','=',$this->stage)->where('is_active','=',1)->where('round','=',$this->round)->get();

          foreach ($games as $game) {
            $bet=Bet::create([
              'user_id' => $this->user->id,
              'game_id' => $game->id,
              'stage_id' => $game->stage_id,
              'amount_id' => $this->amount->id,
            ]);
          }
          $this->user->profile->init_1=true;
          $this->init=true;
          $this->user->push();
          DB::commit();
          $this->dispatch('notifyalpine', '¡Se ha suscrito con éxito!', 'Se ha suscrito correctamante a:<br>'.$this->stageFull->name.': ronda '.$this->round, 'success', 0);
          $this->dispatch('pg:eventRefresh-groupFaseTable');
          $this->user = auth()->user()->fresh();
          $this->suscribed=true;
          $this->dispatch('reinit-button-play');
        } catch (\Exception $e) {
          DB::rollBack();
          Log::error('no se pudo suscribir: '.$this->user->id."\n".$e);
          $this->dispatch('notifyalpine', '¡Noticia!', 'No se pudo suscribir a:<br>'.$this->stageFull->name, 'error', 0);
        }


      }else {
        $this->dispatch('notifyalpine', '¡Noticia!', 'Ya se había suscrito anteriormente a:<br>'.$this->stageFull->name, 'warning', 0);
      }
    }

    public function datasource(): Builder
    {

      if ($this->suscribed && $this->init) {

        $query = Bet::query()
            ->where('bets.user_id', $this->user->id)
            ->where('bets.stage_id', $this->stage)
            ->join('users', 'users.id', '=', 'bets.user_id')
            ->join('games', 'games.id', '=', 'bets.game_id')
            ->join('teams as hometeams', 'hometeams.id', '=', 'games.home_team_id')  // ← Sin espacios
            ->join('teams as awayteams', 'awayteams.id', '=', 'games.away_team_id')  // ← Sin espacios
            ->where('games.round','=',$this->round)
            ->select(
                'bets.*',
                'users.name as user_name',
                'hometeams.name as home_team_name',    // ← Añadir para ver los equipos
                'awayteams.name as away_team_name',     // ← Añadir para ver los equipos
            );
      }else {
        $query = Bet::query()->whereRaw('0 = 1');
      }

      return $query;
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('created_at')
            ->add('name',function($model){
              return $model->user->name;
            })
            ->add('date',function($model){
              return $model->game->date;
            })
            ->add('hometeam',function($model){
              return $model->game->hometeam->name;
            })
            ->add('awayteam',function($model){
              return $model->game->awayteam->name;
            })
            ->add('home_score_p',function($model){
                return $model->home_score_p ?? 'Sin marcador';
            })
            ->add('away_score_p',function($model){
                return $model->away_score_p ?? 'Sin marcador';
            })
            ->add('userscore',function($model){
              return $model->score;
            })
            ->add('status',function($model){
              if ($model->status) {
                return '<svg xmlns="http://www.w3.org/2000/svg" class="text-error" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M4 22V8h3V6q0-2.075 1.463-3.537T12 1t3.538 1.463T17 6v2h3v14zm8-5q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17M9 8h6V6q0-1.25-.875-2.125T12 3t-2.125.875T9 6z"/></svg>';
              }else {
                return '<svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M12 17q.825 0 1.413-.587T14 15t-.587-1.412T12 13t-1.412.588T10 15t.588 1.413T12 17m-8 5V8h9V6q0-2.075 1.463-3.537T18 1t3.538 1.463T23 6h-2q0-1.25-.875-2.125T18 3t-2.125.875T15 6v2h5v14z"/></svg>';
              }

            })
            ;
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            // Column::make(__('Name'), 'name','users.name')
            //     ->sortable()
            //     ->searchable(),
          Column::make(__('Date'), 'date','games.date')
              ->sortable()
              ->searchable(),
          Column::make(__('Home Team'), 'hometeam','hometeams.name')
              ->sortable()
              ->searchable(),
          Column::make(__('Away Team'), 'awayteam','awayteams.name')
              ->sortable()
              ->searchable(),
          Column::make(__('Home Score'), 'home_score_p')  // ← Nombre real, no 'homescorep'
               ->sortable()
               ->searchable()
               ->contentClasses('text-error font-bold text-md animate-pulse')
               ->editOnClick(
                 hasPermission: auth()->user()?->can('Jugar'),
                 saveOnMouseOut: true
                ),

           Column::make(__('Away Score'), 'away_score_p')  // ← Nombre real
               ->sortable()
               ->searchable()
               ->contentClasses('text-error font-bold text-md animate-pulse')
               ->editOnClick(
                 hasPermission: auth()->user()?->can('Jugar'),
                 saveOnMouseOut: true

               ),
          Column::make(__('User Score'), 'userscore','bets.score')
              ->sortable()
              ->contentClasses('text-success font-bold' )
              ->searchable()
              ->withSum('Score total', header: true, footer: false),
          Column::make(__('Estatus'), 'status','bets.status')
              ->sortable()
              ->searchable(),


            // Column::action('Action')
        ];
    }
    public function onUpdatedEditable(string|int $id, string $field, string $value): void
    {
        $bet=Bet::findOrFail($id);
        if ($bet->status==true) {
          $this->dispatch('notifyalpine', '¡Error!', 'Ya no es posbible modificar su pronóstico:<br>', 'error', 3000);
        }else {
          $this->withValidator(function (Validator $validator) use ($id, $field) {
              if ($validator->errors()->isNotEmpty()) {
                  $this->dispatch('toggle-' . $field . '-' . $id);
              }
          })->validate();

          if ($field === 'home_score_p') {
            try {
              DB::beginTransaction();
              $bet->home_score_p = (int)$value;
              if (!is_null($bet->away_score_p)) {
                $bet->status=true;
              }
              $bet->save();
              DB::commit();
            } catch (\Exception $e) {
              DB::rollBack();
              $this->dispatch('notifyalpine', '¡Error!', 'No se pudo actualizar, notifique al administrador:<br>', 'error', 3000);
              Log::error('no se pudo actualizar:'."\n".$e);
            }
          }elseif ($field === 'away_score_p') {
            try {
              DB::beginTransaction();
              $bet->away_score_p = (int)$value;
              if (!is_null($bet->home_score_p)) {
                $bet->status=true;
              }
              $bet->save();
              DB::commit();
            } catch (\Exception $e) {
              DB::rollBack();
              $this->dispatch('notifyalpine', '¡Error!', 'No se pudo actualizar, notifique al administrador:<br>', 'error', 3000);
              Log::error('no se pudo actualizar:'."\n".$e);
            }
          }

        }
    }

    public function filters(): array
    {
        return [
        ];
    }

    protected function rules()
    {
        return [
            'home_score_p.*' => [
                'required',
                'integer',
                'min:0',
                'max:10'
            ],

            'away_score_p.*' => [
              'required',
              'integer',
              'min:0',
              'max:10'
            ],

        ];
    }

    protected function validationAttributes()
    {
        return [
            'home_score_p.*'       => 'Goles local',
            'away_score_p.*' => 'Goles visitante',
        ];
    }

    protected function messages()
    {
        return [
            'home_score_p.*.required' => 'Goles local: obligatiorio',
            'away_score_p.*.required' => 'Goles visita: obligatiorio',
            'home_score_p.*.integer' => 'Goles local: número',
            'home_score_p.*.min' => 'Mínimo: 0',
            'home_score_p.*.max' => 'Máximo: 10',
            'away_score_p.*.integer' => 'Goles local: número',
            'away_score_p.*.min' => 'Mínimo: 0',
            'away_score_p.*.max' => 'Máximo: 10',
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }


    // public function actions(Bet $row): array
    // {
    //     return [
    //
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

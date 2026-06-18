<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Intranet\Profile;

class Ranking extends Component
{
    public $profiles;
    public $stageId;
    public $roundId;
    public $title;
    public $subtitle;
    /**
     * Create a new component instance.
     */
     public function __construct($stageId, $roundId, $title, $subtitle)
     {
         $this->stageId = $stageId;
         $this->roundId = $roundId;
         $this->title = $title;
         $this->subtitle = $subtitle;
         // No hagas queries aquí
     }

     public function render()
     {
         // Construye el nombre de la columna dinámicamente
         $column = 'score_' . $this->roundId;

         // Ejecuta la query y pasa la variable a la vista
         $this->profiles = Profile::whereNotIn('id', [1, 3, 4])
             ->where($column, '>', 0)
             ->orderBy($column, 'desc')
             ->take(10)
             ->get();

         return view('components.dashboard.ranking', [
             // 'profiles' => $profiles
         ]);
     }

    /**
     * Get the view / contents that represent the component.
     */
    // public function render(): View|Closure|string
    // {
    //
    // }
}

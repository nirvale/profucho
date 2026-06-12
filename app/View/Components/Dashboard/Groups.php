<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Intranet\Group;

class Groups extends Component
{
    public $groups;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // $this->groups=Group::all()->groupBy('name');
        $this->groups=Group::join('teams','teams.id','groups.team_id')
              ->orderBy('teams.points','desc')
              ->select('groups.*')
              ->get()
              ->groupBy('name','')
              ->sortKeys()

        ;

        // dd($this->groups);
    }

    // $ventas = Venta::with('vendedor')
    // ->join('vendedores', 'ventas.vendedor_id', '=', 'vendedores.id')
    // ->orderBy('vendedores.nivel', 'asc') // Ordenar por campo de relación
    // ->select('ventas.*')
    // ->get()
    // ->groupBy('vendedor_id');

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.groups');
    }
}

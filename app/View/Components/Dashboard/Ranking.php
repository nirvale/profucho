<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Intranet\Profile;

class Ranking extends Component
{
    public $profiles;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->profiles=Profile::whereNotIn('id', [1,3,4])->where('score_1','>',0)->orderBy('score_1','desc')->take(10)->get();
        // dd($this->profiles);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.ranking');
    }
}

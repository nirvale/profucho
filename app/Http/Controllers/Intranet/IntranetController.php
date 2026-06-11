<?php

namespace App\Http\Controllers\Intranet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class IntranetController extends Controller
{
  use AuthorizesRequests;
  public function dashboard()
  {
      return view('intranet.dashboard');
  }

  public function users()
  {
    // if (!auth()->user()?->hasPermissionTo('Administrar usuarios')) {
    //     abort(403);
    // }
     $this->authorize('Administrar operación');
    return view('intranet.admin.users');
  }

  public function games()
  {
     $this->authorize('Administrar operación');
    return view('intranet.admin.games');
  }

  public function grupos()
  {
      return view('intranet.fases.grupos');
  }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
  public function login()
  {
    // return view('auth.login', $this->getLogoDataForView());
    return view('auth.login');
  }

  public function register()
  {
    // return view('auth.login', $this->getLogoDataForView());
    return view('auth.register');
  }
}

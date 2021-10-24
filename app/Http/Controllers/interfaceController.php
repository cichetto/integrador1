<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class interfaceController extends Controller
{
    // Funções principais =============================================================================

    public function agenda(){
        return view('interface.agenda');
    }

    public function home(){
        return view('interface.home');
    }

    public function login(){
        return view('interface.login');
    }

    // Funções públicas ===============================================================================
    // Funções protegidas =============================================================================
}

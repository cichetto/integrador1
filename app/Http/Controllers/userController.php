<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    // Funções principais =============================================================================

    public function add(){
        return view('user.add');
    }

    public function edit(){
        return view('user.edit');
    }

    public function list(){
        return view('user.list');
    }

    public function remove(){
        return view('user.remove');
    }

    public function view(){
        return view('user.view');
    }

    // Funções públicas ===============================================================================
    // Funções protegidas =============================================================================
}

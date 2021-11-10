<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;

class grupoController extends Controller
{
    // Funções principais =============================================================================

    public function add(){
        return view('grupo.add');
    }

    public function edit(){
        return view('grupo.edit');
    }

    public function list(){
        return view('grupo.list');
    }

    public function remove(){
        return view('grupo.remove');
    }

    // Funções públicas ===============================================================================

    // Funções protegidas =============================================================================
}

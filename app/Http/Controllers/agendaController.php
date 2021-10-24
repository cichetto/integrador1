<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class agendaController extends Controller
{

    // Funções principais =============================================================================

    public function add(){
        return view('agenda.add');
    }

    public function edit(){
        return view('agenda.edit');
    }

    public function list(){
        return view('agenda.list');
    }

    public function remove(){
        return view('agenda.remove');
    }

    // Funções públicas ===============================================================================
    // Funções protegidas =============================================================================
}

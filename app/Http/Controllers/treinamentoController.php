<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class treinamentoController extends Controller
{
    // Funções principais =============================================================================

    public function add(){
        return view('treinamento.add');
    }

    public function edit(){
        return view('treinamento.edit');
    }

    public function list(){
        return view('treinamento.list');
    }

    public function rel(){
        return view('treinamento.rel');
    }

    public function remove(){
        return view('treinamento.remove');
    }

    public function view(){
        return view('treinamento.view');
    }

    // Funções públicas ===============================================================================
    // Funções protegidas =============================================================================
}

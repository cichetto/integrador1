<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class areaController extends Controller
{
    // Funções principais =============================================================================

    public function add(){
        return view('area.add');
    }

    public function edit(){
        return view('area.edit');
    }

    public function list(){
        return view('area.list');
    }

    public function remove(){
        return view('area.remove');
    }

    // Funções públicas ===============================================================================

    // Funções protegidas =============================================================================
}

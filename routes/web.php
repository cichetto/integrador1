<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\agendaController;
use App\Http\Controllers\areaController;
use App\Http\Controllers\grupoController;
use App\Http\Controllers\interfaceController;
use App\Http\Controllers\treinamentoController;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',             [interfaceController::class, 'login']);
Route::get('/home',         [interfaceController::class, 'home']);
Route::get('/minhaagenda',  [interfaceController::class, 'agenda']);

Route::prefix('/agenda')->group(function(){
    Route::get('/add',      [agendaController::class, 'add']);
    Route::get('/edit',     [agendaController::class, 'edit']);
    Route::get('/list',     [agendaController::class, 'list']);
    Route::get('/remove',   [agendaController::class, 'remove']);
});

Route::prefix('/area')->group(function(){
    Route::get('/add',      [areaController::class, 'add']);
    Route::get('/edit',     [areaController::class, 'edit']);
    Route::get('/list',     [areaController::class, 'list']);
    Route::get('/remove',   [areaController::class, 'remove']);
});

Route::prefix('/grupo')->group(function(){
    Route::get('/add',      [grupoController::class, 'add']);
    Route::get('/edit',     [grupoController::class, 'edit']);
    Route::get('/list',     [grupoController::class, 'list']);
    Route::get('/remove',   [grupoController::class, 'remove']);
});

Route::prefix('/treinamento')->group(function(){
    Route::get('/add',      [treinamentoController::class, 'add']);
    Route::get('/edit',     [treinamentoController::class, 'edit']);
    Route::get('/list',     [treinamentoController::class, 'list']);
    Route::get('/rel',      [treinamentoController::class, 'rel']);
    Route::get('/remove',   [treinamentoController::class, 'remove']);
    Route::get('/view',     [treinamentoController::class, 'view']);
});

Route::prefix('/user')->group(function(){
    Route::get('/add',      [userController::class, 'add']);
    Route::get('/edit',     [userController::class, 'edit']);
    Route::get('/list',     [userController::class, 'list']);
    Route::get('/remove',   [userController::class, 'remove']);
    Route::get('/view',     [userController::class, 'view']);
});
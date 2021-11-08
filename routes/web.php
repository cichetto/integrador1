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

Route::get('/',             [interfaceController::class, 'login'])->name('login');
Route::get('/home',         [interfaceController::class, 'home'])->name('home');
Route::get('/minhaagenda',  [interfaceController::class, 'agenda'])->name('minhaagenda');

Route::prefix('/agenda')->group(function(){
    Route::get('/add',      [agendaController::class, 'add'])->name('agenda.add');
    Route::get('/edit',     [agendaController::class, 'edit'])->name('agenda.edit');
    Route::get('/list',     [agendaController::class, 'list'])->name('agenda.list');
    Route::get('/remove',   [agendaController::class, 'remove'])->name('agenda.remove');
});

Route::prefix('/area')->group(function(){
    Route::get('/add',      [areaController::class, 'add'])->name('area.add');
    Route::get('/edit',     [areaController::class, 'edit'])->name('area.edit');
    Route::get('/list',     [areaController::class, 'list'])->name('area.list');
    Route::get('/remove',   [areaController::class, 'remove'])->name('area.remove');
});

Route::prefix('/grupo')->group(function(){
    Route::get('/add',      [grupoController::class, 'add'])->name('grupo.add');
    Route::get('/edit',     [grupoController::class, 'edit'])->name('grupo.edit');
    Route::get('/list',     [grupoController::class, 'list'])->name('grupo.list');
    Route::get('/remove',   [grupoController::class, 'remove'])->name('grupo.remove');
});

Route::prefix('/treinamento')->group(function(){
    Route::get('/add',      [treinamentoController::class, 'add'])->name('treinamento.add');
    Route::get('/edit',     [treinamentoController::class, 'edit'])->name('treinamento.edit');
    Route::get('/list',     [treinamentoController::class, 'list'])->name('treinamento.list');
    Route::get('/rel',      [treinamentoController::class, 'rel'])->name('treinamento.rel');
    Route::get('/remove',   [treinamentoController::class, 'remove'])->name('treinamento.remove');
    Route::get('/view',     [treinamentoController::class, 'view'])->name('treinamento.view');
});

Route::prefix('/user')->group(function(){
    Route::post('/add',     [userController::class, 'add'])->name('user.add');
    Route::post('/edit',    [userController::class, 'edit'])->name('user.edit');
    Route::post('/list',    [userController::class, 'list'])->name('user.list');
    Route::post('/remove',  [userController::class, 'remove'])->name('user.remove');
    Route::get('/add',      [userController::class, 'add'])->name('user.add');
    Route::get('/edit',     [userController::class, 'edit'])->name('user.edit');
    Route::get('/list',     [userController::class, 'list'])->name('user.list');
    Route::get('/remove',   [userController::class, 'remove'])->name('user.remove');
    Route::get('/view',     [userController::class, 'view'])->name('user.view');
});
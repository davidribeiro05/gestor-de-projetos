<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('manager.main', [
        'title' => 'Bem vindo ao gestor de projetos'
    ]);
});

Route::get('/projeto/criar', 'Project@create')
    ->name('form_project');
Route::post('/projeto', 'Project@store')
    ->name('create_project');
Route::get('/projeto/editar/{id}', 'Project@edit')
    ->name('edit_project');
Route::post('/projeto/editar', 'Project@update')
    ->name('update_project');

Route::get('/processo/criar', 'Process@create')
    ->name('form_process');
Route::post('/processo', 'Process@store')
    ->name('create_process');
Route::get('/processo/editar/{id}', 'Process@edit')
    ->name('edit_process');
Route::post('/processo/editar', 'Process@update')
    ->name('update_process');

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//ROTA DE LOGIN
Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('login/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('login/logout', [LoginController::class, 'logout'])->name('login.logout');

//ROTAS USUARIOS
//INDEX
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

//CRIAR USUÁRIO
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

//DELETAR USUÁRIO
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy'); //deletar registro

//EDITAR USUÁRIO
Route::get('/usuarios/edit/{id}', [UsuarioController::class, 'edit'])->name('usuarios.edit'); //formulário de edição
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update'); //atualizar registro

//EDITAR USUÁRIO LOGADO
Route::get('/usuarios/alterar/{id}', [UsuarioController::class, 'alt'])->name('usuarios.alt'); //formulário de atualização
// Route::get('/usuarios/alterar/{id}/{modal?}', [UsuarioController::class, 'alt'])->name('usuarios.alt'); //formulário de atualização
Route::put('/usuarios/atualizar/{id}', [UsuarioController::class, 'update_alt'])->name('usuarios.update_alt'); //atualizar registro

//TROCAR SENHA USUÁRIO LOGADO
// Route::get('/usuarios/pass/{id}', [UsuarioController::class, 'pass'])->name('usuarios.pass');
Route::put('/usuarios/updatepass/{id}', [UsuarioController::class, 'updatepass'])->name('usuarios.updatepass'); //trocar senha
/* CEMITÉRIO ✞ */
// Route::put('/usuarios/modifypass/{id}', [UsuarioController::class, 'modifypass'])->name('usuarios.modifypass'); //trocar senha
// function ($id) {return 'User '.$id;} , -> TESTE VARIÁVEL
// array_merge(\Illuminate\Support\Facades\Route::current()->parameters(), ['locale' => 'en'])
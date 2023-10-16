<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ContratadoController;
use App\Http\Controllers\AssociadoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\PesquisaAlunosController;


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

//ROTA DE LOGIN
Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('login/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('login/logout', [LoginController::class, 'logout'])->name('login.logout');

//ROTA DO DASHBOARD
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//ROTA DE PESQUISA
Route::get('/pesquisa', [PesquisaAlunosController::class, 'index'])->name('pesquisa.index');

// ROTA DO CADASTRO
Route::get('/cadastro', [DashboardController::class, 'cadastro'])->name('cadastro.index');

// ROTAS RELATORIO
Route::get('/relatorios', function () {
    return view('relatorios.index');
})->name('relatorios.index');

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


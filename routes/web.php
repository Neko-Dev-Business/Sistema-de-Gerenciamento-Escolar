<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
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




//ROTA DE PESSOA
Route::get('/pessoa', [PessoaController::class, 'index'])->name('pessoa.index');
Route::get('/pessoa/create', [PessoaController::class, 'create'])->name('pessoa.create');
Route::post('/pessoa', [PessoaController::class, 'store'])->name('pessoa.store');
Route::delete('/pessoa/{idPessoa}', [PessoaController::class, 'destroy'])->name('pessoa.destroy');
Route::get('/pessoa/edit/{idPessoa}', [PessoaController::class, 'edit'])->name('pessoa.edit');
Route::put('/pessoa/{idPessoa}', [PessoaController::class, 'update'])->name('pessoa.update');

//ROTA DE PROFESSOR
Route::get('/professor', [ProfessorController::class, 'index'])->name('professor.index');
Route::get('/professor/create', [ProfessorController::class, 'create'])->name('professor.create');
Route::post('/professor', [ProfessorController::class, 'store'])->name('professor.store');
Route::delete('/professor/{idProfessor}', [ProfessorController::class, 'destroy'])->name('professor.destroy'); 
Route::get('/professor/edit/{idProfessor}', [ProfessorController::class, 'edit'])->name('professor.edit');
Route::put('/professor/{idProfessor}', [ProfessorController::class, 'update'])->name('professor.update');

//ROTA DE ALUNO
Route::get('/aluno', [AlunoController::class, 'index'])->name('aluno.index');
Route::get('/aluno/create', [AlunoController::class, 'create'])->name('aluno.create');
Route::delete('/aluno/{idAluno}', [AlunoController::class, 'destroy'])->name('aluno.destroy');
Route::get('/aluno/edit/{idAluno}', [AlunoController::class, 'edit'])->name('aluno.edit');
Route::put('/aluno/{idAluno}', [AlunoController::class, 'update'])->name('aluno.update');
Route::post('/aluno', [AlunoController::class, 'store'])->name('aluno.store');


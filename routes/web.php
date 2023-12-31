<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\NotaController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesquisaAlunosController;
use Illuminate\Contracts\Session\Session;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\TurmaDisciplinaController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\AlunoTurmaController;
use App\Http\Controllers\EscolaController;
use App\Http\Controllers\EventController;
// ...


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
Route::get('/', [LoginController::class, 'landing'])->name('login.landing');
Route::post('login/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('login/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('login/landing', [LoginController::class, 'landing'])->name('login.landing');
Route::get('login/index', [LoginController::class, 'index'])->name('login.index');

//ROTA DE LOGOUT
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

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
Route::get('/pessoas', [PessoaController::class, 'index'])->name('pessoas.index');
Route::get('/pessoas/create', [PessoaController::class, 'create'])->name('pessoas.create');
Route::post('/pessoas', [PessoaController::class, 'store'])->name('pessoas.store');
Route::delete('/pessoas/{idPessoa}', [PessoaController::class, 'destroy'])->name('pessoas.destroy');
Route::get('/pessoas/edit/{idPessoa}', [PessoaController::class, 'edit'])->name('pessoas.edit');
Route::put('/pessoas/{idPessoa}', [PessoaController::class, 'update'])->name('pessoas.update');

//ROTA DE PROFESSOR
Route::get('/professores', [ProfessorController::class, 'index'])->name('professores.index');
Route::get('/professores/create', [ProfessorController::class, 'create'])->name('professores.create');
Route::post('/professores', [ProfessorController::class, 'store'])->name('professores.store');
Route::delete('/professores/{idProfessor}', [ProfessorController::class, 'destroy'])->name('professores.destroy');
Route::get('/professores/edit/{idProfessor}', [ProfessorController::class, 'edit'])->name('professores.edit');
Route::put('/professores/{idProfessor}', [ProfessorController::class, 'update'])->name('professores.update');

//ROTA DE ALUNO
Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');
Route::get('/alunos/create', [AlunoController::class, 'create'])->name('alunos.create');
Route::delete('/alunos/{idAluno}', [AlunoController::class, 'destroy'])->name('alunos.destroy');
Route::get('/alunos/edit/{idAluno}', [AlunoController::class, 'edit'])->name('alunos.edit');
Route::put('/alunos/{idAluno}', [AlunoController::class, 'update'])->name('alunos.update');
Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');


//ROTA DE DISCIPLINA
Route::get('/disciplinas', [DisciplinaController::class, 'index'])->name('disciplinas.index');
Route::get('/disciplinas/create', [DisciplinaController::class, 'create'])->name('disciplinas.create');
Route::delete('/disciplinas/{idDisciplina}', [DisciplinaController::class, 'destroy'])->name('disciplinas.destroy');
Route::get('/disciplinas/edit/{idDisciplina}', [DisciplinaController::class, 'edit'])->name('disciplinas.edit');
Route::put('/disciplinas/{idDisciplina}', [DisciplinaController::class, 'update'])->name('disciplinas.update');
Route::post('/disciplinas', [DisciplinaController::class, 'store'])->name('disciplinas.store');

//ROTA DE TURMA
Route::get('/turmas', [TurmaController::class, 'index'])->name('turmas.index');
Route::get('/turmas/create', [TurmaController::class, 'create'])->name('turmas.create');
Route::delete('/turmas/{idTurma}', [TurmaController::class, 'destroy'])->name('turmas.destroy');
Route::get('/turmas/edit/{idTurma}', [TurmaController::class, 'edit'])->name('turmas.edit');
Route::put('/turmas/{idTurma}', [TurmaController::class, 'update'])->name('turmas.update');
Route::post('/turmas', [TurmaController::class, 'store'])->name('turmas.store');


//ROTA ALUNO_TURMA
Route::get('/aluno_turma', [AlunoTurmaController::class, 'index'])->name('aluno_turma.index');
Route::get('/aluno_turma/create/{id}', [AlunoTurmaController::class, 'create'])->name('aluno_turma.create');
Route::post('/aluno_turma', [AlunoTurmaController::class, 'store'])->name('aluno_turma.store');
Route::get('/api/turmas/{anoLetivo}/filter', [TurmaController::class, 'filterByAnoLetivo']);


//ROTA TURMA_DISCIPLINAS


//ROTA DE NOTA
Route::get('/notas', [NotaController::class, 'index'])->name('notas.index');
Route::get('/notas/create', [NotaController::class, 'create'])->name('notas.create');
Route::delete('/notas/{idNota}', [NotaController::class, 'destroy'])->name('notas.destroy');
Route::get('/notas/edit/{idNota}', [NotaController::class, 'edit'])->name('notas.edit');
Route::put('/notas/{idNota}', [NotaController::class, 'update'])->name('notas.update');
Route::post('/notas', [NotaController::class, 'store'])->name('notas.store');
Route::get('/notas/disciplina/{idNota}', [NotaController::class, 'disciplina'])->name('notas.disciplina');
Route::get('/notas/disciplina/{idTurma}', [NotaController::class, 'turma'])->name('notas.turma');
Route::get('notas/turma/{idPessoa}/{idTurma}', [NotaController::class, 'notasPorTurmaEAluno'])->name('notas.turma.aluno');

//ROTA DE RELATORIO
Route::get('/gerar-relatorio-turmas', [RelatorioController::class, 'gerarRelatorioTurmas'])->name('gerarRelatorioTurmas');
Route::get('/gerar-relatorio-disciplinas', [RelatorioController::class, 'gerarRelatorioDisciplinas'])->name('gerarRelatorioDisciplinas');
Route::get('/gerar-relatorio-alunos', [RelatorioController::class, 'gerarRelatorioAlunos'])->name('gerarRelatorioAlunos');
Route::get('/gerar-relatorio-boletim', [RelatorioController::class, 'gerarBoletimAluno'])->name('gerarBoletimAluno');
Route::get('gerar-relatorio-comprovante', [RelatorioController::class, 'gerarComprovanteMatricula'])->name('gerarComprovanteMatricula');


//ROTA DA ESCOLA


Route::get('/escola', [EscolaController::class, 'index'])->name('escola.index');
Route::get('/escola/create', [EscolaController::class, 'create'])->name('escola.create');
Route::post('/escola', [EscolaController::class, 'store'])->name('escola.store');
Route::put('/escola/{id}', [EscolaController::class, 'update'])->name('escola.update');


Route::get('/turmas/{idTurma}/disciplinas', [TurmaController::class, 'showDisciplinas'])->name('turmas.showDisciplinas');
Route::post('turmas/{idTurma}/adicionar-disciplinas', [TurmaController::class,'adicionarDisciplinas'])->name('turmas.adicionarDisciplinas');

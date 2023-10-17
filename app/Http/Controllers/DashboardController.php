<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Pessoa;
use App\Models\Professor;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProfessores = Pessoa::select(DB::raw('(count(tipoUsuario)) as totalProfessores'))->where(DB::raw('tipoUsuario'), '=', DB::raw('4'))->first();

        $totalAlunos = Pessoa::select(DB::raw('(count(tipoUsuario)) as totalAlunos'))->where(DB::raw('tipoUsuario'), '=', DB::raw('1'))->first();

        $totalFuncionarios = Pessoa::select(DB::raw('(count(tipoUsuario)) as totalFuncionarios'))->where(DB::raw('tipoUsuario'), '=', DB::raw('5'))->first();

        return view('dashboard.index', compact('totalProfessores', 'totalAlunos', 'totalFuncionarios'));
    }

    public function cadastro()
    {
        return view('cadastro.index'); // Supondo que o nome da view do cadastro seja 'cadastro.index'
    }
}

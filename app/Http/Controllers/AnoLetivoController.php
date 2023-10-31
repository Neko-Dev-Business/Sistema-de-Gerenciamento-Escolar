<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Disciplina;

class AnoLetivoController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        $disciplinas = Disciplina::all();
        return view('anoletivo.index', compact('turmas', 'disciplinas'));
    }

    public function storeTurma(Request $request)
    {
        $request->validate([
            'anoTurma' => 'required',
            'nomeTurma' => 'required',
            'turnoTurma' => 'required',
            'salaTurma' => 'required',
        ]);

        Turma::create($request->all());

        return back()->with('success', 'Turma cadastrada com sucesso.');
    }

    public function storeDisciplina(Request $request)
    {
        $request->validate([
            'nomeDisciplina' => 'required',
        ]);

        Disciplina::create($request->all());

        return back()->with('success', 'Disciplina cadastrada com sucesso.');
    }
}

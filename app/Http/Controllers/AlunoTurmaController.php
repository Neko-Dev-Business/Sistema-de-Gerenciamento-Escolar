<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Turma;
use App\Models\Aluno_Turma;

class AlunoTurmaController extends Controller
{
    public function index()
    {
        // Busca todas as pessoas que são alunos
        $pessoas = Pessoa::where('tipoUsuario', '1')->get();
        return view('aluno_turma.index', compact('pessoas'));
    }

    public function create()
    {
        $pessoas = Pessoa::where('tipoUsuario', '1')->get();
        $turmas = Turma::all();
        $anosLetivos = Turma::select('anoLetivoTurma')->distinct()->pluck('anoLetivoTurma');
        return view('aluno_turma.create', compact('pessoas', 'turmas', 'anosLetivos'));
    }



    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'idPessoa' => 'required|exists:pessoas,idPessoa',
            'idTurma' => 'required|exists:turmas,idTurma',
        ]);


        $alunoTurma = new Aluno_Turma($validatedData);
        $alunoTurma->save();


        return redirect()->route('aluno_turma.index')->with('success', 'Aluno associado à turma com sucesso!');
    }


}

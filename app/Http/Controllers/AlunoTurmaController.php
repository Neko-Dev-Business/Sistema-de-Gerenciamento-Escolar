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
        $alunos = Pessoa::where('tipoUsuario', '1')->get();
        $turmas = Turma::all();
        return view('aluno_turma.index', compact('alunos', 'turmas'));
    }

    public function create()
    {
        $aluno = Pessoa::where('tipoUsuario', '1')->first(); // ou lógica para obter um aluno específico
        $turmas = Turma::all();
    
        return view('aluno_turma.create', compact('aluno', 'turmas'));
    }
    
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idPessoa' => 'required|exists:pessoas,idPessoa',
            'idTurma' => 'required|exists:turmas,idTurma',
        ]);

        $alunoTurmaExists = Aluno_Turma::where('idPessoa', $validatedData['idPessoa'])
                                        ->where('idTurma', $validatedData['idTurma'])
                                        ->exists();

        if ($alunoTurmaExists) {
            return back()->with('error', 'O aluno já faz ou fez parte dessa turma anteriormente!');
        }

        Aluno_Turma::create($validatedData);

        return redirect()->route('aluno_turma.index')->with('success', 'Aluno associado à turma com sucesso!');
    }

    
}

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

    public function create($idPessoa)
    {
        $aluno = Pessoa::where('idPessoa', $idPessoa)->where('tipoUsuario', '1')->first();

        if (!$aluno) {
            // Lógica para lidar com o caso de não encontrar o aluno
            return redirect()->route('aluno_turma.index')->with('error', 'Aluno não encontrado.');
        }

        // Consulta para obter os anos letivos distintos disponíveis
        $anosLetivos = Turma::distinct('anoLetivoTurma')->pluck('anoLetivoTurma');

        $turmas = Turma::all(); // Recuperar todas as turmas para a view, se necessário

        // Organizando as turmas por ano letivo para utilizar na view
        $turmasPorAno = [];
        foreach ($anosLetivos as $ano) {
            $turmasPorAno[$ano] = Turma::where('anoLetivoTurma', $ano)->get();
        }

        return view('aluno_turma.create', compact('aluno', 'anosLetivos', 'turmasPorAno', 'turmas'));
    }
    
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idPessoa' => 'required|exists:pessoas,idPessoa',
            'idTurma' => 'required|exists:turmas,idTurma',
        ]);
    
        $aluno = Pessoa::find($validatedData['idPessoa']);
        $turma = Turma::find($validatedData['idTurma']);
    
        $alunoTurmaExists = Aluno_Turma::where('idPessoa', $validatedData['idPessoa'])
                                        ->where('idTurma', $validatedData['idTurma'])
                                        ->exists();
    
        if ($alunoTurmaExists) {
            return back()->with('error', 'O aluno já faz ou fez parte dessa turma anteriormente!');
        }
    
        $anoLetivo = $turma->anoLetivoTurma;
    
        $alunoTurmasNoAno = Aluno_Turma::where('idPessoa', $validatedData['idPessoa'])
                                        ->whereHas('turma', function ($query) use ($anoLetivo) {
                                            $query->where('anoLetivoTurma', $anoLetivo);
                                        })
                                        ->exists();
    
        if ($alunoTurmasNoAno) {
            return back()->with('error', 'O aluno já foi cadastrado em uma turma nesse ano!');
        }
    
        Aluno_Turma::create($validatedData);
    
        return redirect()->route('aluno_turma.create', ['id' => $validatedData['idPessoa']])->with('success', 'Aluno associado à turma com sucesso!');
    }
    


    
    
    public function turmasVinculadas($idPessoa) 
    {
        $aluno = Pessoa::find($idPessoa);

        if (!$aluno || $aluno->tipoUsuario !== '1') {
            return redirect()->route('aluno_turma.index')->with('error', 'Aluno não encontrado ou tipo de usuário inválido.');
        }

        // Obtendo todas as turmas vinculadas ao aluno
        $turmasVinculadas = $aluno->turmas; // Isso pressupõe que o relacionamento foi definido corretamente.

        return view('aluno_turma.turmas_vinculadas', compact('aluno', 'turmasVinculadas'));
    }

    

    
}

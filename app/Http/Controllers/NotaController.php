<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Pessoa;
use App\Models\Disciplina;
use App\Models\Turma;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $pessoas = Pessoa::select('*')
        ->join('notas as notas_pessoa', 'notas_pessoa.idPessoa', '=', 'pessoas.idPessoa')
        ->join('disciplinas', 'notas_pessoa.idDisciplina', '=', 'disciplinas.idDisciplina')
        ->join('turmas', 'notas_pessoa.idTurma', '=', 'turmas.idTurma')
        ->where('tipoUsuario', '=', 1)
        ->whereNotNull('nomePessoa')
        ->orderBy('nomePessoa', 'ASC')
        ->take(11)
        ->offset(0)
        ->get();


        $totalAlunos = Pessoa::where('tipoUsuario', 1)->count();
        $turmas = Turma::all(); // Obtém todas as turmas

        if ($turmas->isEmpty()) {
            $turmas = []; // Se não houver turmas, atribui um array vazio para evitar o erro
        }

        return view('notas.index', compact('pessoas', 'totalAlunos', 'turmas'));
    }

    public function edit($idPessoa)
    {
        $pessoa = Pessoa::find($idPessoa);
        $notas = Nota::where('idPessoa', $idPessoa)->first();
        return view('notas.edit', compact('pessoa', 'notas'));
    }

    public function disciplina($idPessoa)
    {
        $pessoa = Pessoa::find($idPessoa);
        $disciplinas = Disciplina::where('idDisciplina', $idPessoa)->first();
        return view('notas.disciplina', compact('pessoa', 'disciplinas'));
    }
    
    public function turma($idPessoa)
    {
        $pessoa = Pessoa::find($idPessoa);
    
        if ($pessoa) {
            $turmas = $pessoa->turmas()->get();
    
            if ($turmas->isNotEmpty()) {
                return view('notas.turma', compact('pessoa', 'turmas'));
            } else {
                // Se não houver turmas associadas à pessoa
                return "Não há turmas associadas a esta pessoa.";
            }
        } else {
            // Se a pessoa não for encontrada
            return "Pessoa não encontrada.";
        }
    } 
    
    public function create()
    {
        $notas = Nota::all();
        return view('notas.create', compact('notas'));
    }

    public function store(Request $request)
    {
        $input = $request->toArray();
        Nota::create($input);

        return redirect()->route('notas.index')->with('Sucesso', 'Nota cadastrada com sucesso!');
    }

    public function destroy($idNota)
    {
        $notas = Nota::find($idNota);
        $notas->delete();

        return redirect()->route('notas.index')->with('Sucesso', 'Nota deletada com sucesso!');
    }

    public function update(Request $request, $idPessoa)
    {
        $request->validate([
            'primeiraNota' => 'required|numeric',
            'segundaNota' => 'required|numeric',
            'terceiraNota' => 'required|numeric',
            'quartaNota' => 'required|numeric',
            'primeiraRecuperacao' => 'required|numeric',
            'segundaRecuperacao' => 'required|numeric',
            'terceiraRecuperacao' => 'required|numeric',
            'quartaRecuperacao' => 'required|numeric',
        ]);

        $notas = Nota::updateOrCreate(
            ['idPessoa' => $idPessoa],
            $request->all()
        );

        if ($notas) {
            return redirect()->route('notas.edit', $idPessoa)->with('success', 'Notas atualizadas com sucesso!');
        } else {
            return redirect()->route('notas.edit', $idPessoa)->with('error', 'Erro ao atualizar as notas!');
        }
    }

    public function notasPorTurmaEAluno($idPessoa, $idTurma)
    {
        $pessoa = Pessoa::with(['notas' => function ($query) use ($idTurma) {
            $query->where('idTurma', $idTurma);
        }, 'notas.disciplina'])->find($idPessoa);

        $turma = Turma::find($idTurma);

        if ($pessoa && $turma) {
            // Carregar as disciplinas vinculadas à turma
            $disciplinas = $turma->disciplinas;

            return view('notas.notas', compact('pessoa', 'turma', 'disciplinas'));
        } else {
            return "Pessoa ou Turma não encontrada.";
        }
    }



}

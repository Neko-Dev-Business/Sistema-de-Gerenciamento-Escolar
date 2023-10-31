<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AlunoController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function index(Request $request)
    {
        $alunos = DB::table('alunos')
        ->join('pessoas', 'pessoas.idPessoa', '=', 'alunos.idPessoa')
        ->where('idAluno', 'like', '%'.$request->buscaAluno.'%')->orderBy('idAluno','asc')->get();

        $totalAlunos= Aluno::all()->count();
        return view('alunos.index', compact('alunos', 'totalAlunos'));
    }

    public function create()
    {
        $pessoas = Pessoa::all();
        $alunos = Aluno::all();
        return view('alunos.create', compact('alunos', 'pessoas'));
    }

    public function store(Request $request)
    {
        $input = $request->toArray();
        Aluno::create($input);

        return redirect()->route('alunos.index')->with('Sucesso', 'Aluno cadastrado com sucesso!');
    }

    public function destroy($idAluno)
    {
        $alunos = Aluno::find($idAluno);
        $alunos->delete();

        return redirect()->route('alunos.index')->with('Sucesso', 'Aluno deletado com sucesso!');
    }

    public function edit($idAluno)
    {
        $alunos = Aluno::find($idAluno);
        return view('alunos.edit', compact('alunos'));
    }

    public function update(Request $request, $idAluno)
    {
        $input = $request->toArray();
        $alunos = Aluno::find($idAluno);

        $alunos->fill($input);
        $alunos->save();

        return redirect()->route('alunos.index')->with('Sucesso', 'Aluno alterado com sucesso!');

    }
}

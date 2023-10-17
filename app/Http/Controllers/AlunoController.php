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
        $aluno = DB::table('aluno')
        ->join('pessoa', 'pessoa.idPessoa', '=', 'aluno.idPessoa')
        ->where('idAluno', 'like', '%'.$request->buscaAluno.'%')->orderBy('idAluno','asc')->get();

        $totalAlunos= Aluno::all()->count();
        return view('aluno.index', compact('aluno', 'totalAlunos'));
    }

    public function create()
    {
        $pessoa = Pessoa::all();
        $aluno = Aluno::all();
        return view('aluno.create', compact('aluno', 'pessoa'));
    }

    public function store(Request $request)
    {
        $input = $request->toArray();
        Aluno::create($input);

        return redirect()->route('aluno.index')->with('Sucesso', 'Aluno cadastrado com sucesso!');
    }

    public function destroy($idAluno)
    {
        $aluno = Aluno::find($idAluno);
        $aluno->delete();

        return redirect()->route('aluno.index')->with('Sucesso', 'Aluno deletado com sucesso!');
    }

    public function edit($idAluno)
    {
        $aluno = Aluno::find($idAluno);
        return view('aluno.edit', compact('aluno'));
    }

    public function update(Request $request, $idAluno)
    {
        $input = $request->toArray();
        $aluno = Aluno::find($idAluno);

        $aluno->fill($input);
        $aluno->save();

        return redirect()->route('aluno.index')->with('Sucesso', 'Aluno alterado com sucesso!');

    }
}

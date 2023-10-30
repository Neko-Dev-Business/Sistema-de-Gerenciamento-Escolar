<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Disciplina;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Endereco;
use Illuminate\Support\Facades\DB;

class DisciplinaController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function index(Request $request)
    {

        $filtro = $request->input('filtro', 'nomeDisciplina');
        $busca = $request->input('busca');

        $disciplinas = Disciplina::where($filtro, 'like', '%' . $busca . '%')
            ->orderBy('nomeDisciplina', 'asc')
            ->simplePaginate(10);

        $totalDisciplinas = Disciplina::count();

        return view('disciplinas.index', compact('disciplinas', 'totalDisciplinas'));
    }


    public function create()
    {
        $disciplinas = Disciplina::all();
        return view('disciplinas.create', compact('disciplinas'));
    }

    public function store(Request $request)
    {
        $input = $request->toArray();
        Disciplina::create($input);

        return redirect()->route('disciplinas.index')->with('Sucesso', 'Disciplina cadastrada com sucesso!');
    }

    public function destroy($idDisciplina)
    {
        $disciplinas = Disciplina::find($idDisciplina);
        $disciplinas->delete();

        return redirect()->route('disciplinas.index')->with('Sucesso', 'Disciplina deletada com sucesso!');
    }

    public function edit($idDisciplina)
    {
        $disciplina = Disciplina::find($idDisciplina);
        return view('disciplinas.edit', compact('disciplina'));
    }

    public function update(Request $request, $idDisciplina)
    {
        $input = $request->toArray();
        $disciplinas = Disciplina::find($idDisciplina);

        $disciplinas->fill($input);
        $disciplinas->save();

        return redirect()->route('disciplinas.index')->with('Sucesso', 'Disciplina alterada com sucesso!');

    }
}

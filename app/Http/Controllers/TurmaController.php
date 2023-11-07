<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function index(Request $request)
    {
        $filtro = $request->input('filtro', 'nomeTurma');
        $busca = $request->input('busca');

        $turmas = Turma::where($filtro, 'like', '%' . $busca . '%')
            ->orderBy('nomeTurma', 'asc')
            ->simplePaginate(10);

        $totalTurmas = Turma::count();

        return view('turmas.index', compact('turmas', 'totalTurmas'));
    }


    public function create()
    {
        $turmas = Turma::all();
        return view('turmas.create', compact('turmas'));
    }

    public function store(Request $request)
    {
        $input = $request->toArray();
        Turma::create($input);

        return redirect()->route('turmas.index')->with('Sucesso', 'Turma cadastrada com sucesso!');
    }

    public function destroy($idTurma)
    {
        $turmas = Turma::find($idTurma);
        $turmas->delete();

        return redirect()->route('turmas.index')->with('Sucesso', 'Turma deletada com sucesso!');
    }

    public function edit($idTurma)
    {
        $turmas = Turma::find($idTurma);
        return view('turmas.edit', compact('turmas'));
    }

    public function update(Request $request, $idTurma)
    {
        $input = $request->toArray();
        $turmas = Turma::find($idTurma);

        $turmas->fill($input);
        $turmas->save();

        return redirect()->route('turmas.index')->with('Sucesso', 'Turma alterada com sucesso!');

    }

    public function filterByAnoLetivo(Request $request, $anoLetivo)
    {
        $turmas = Turma::where('anoLetivoTurma', $anoLetivo)->get();

        return response()->json($turmas);
    }
}

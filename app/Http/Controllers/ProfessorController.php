<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;
class ProfessorController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function index(Request $request)
    {
        $pessoas = Pessoa::all();
        
        $professores = DB::table('professores')
        ->join('pessoas', 'pessoas.idPessoa', '=', 'professores.idPessoa')
        ->where('idProfessor', 'like', '%'.$request->buscaProfessor.'%')->orderBy('idProfessor','asc')->get();
       
        $totalProfessores = Professor::all()->count();
        return view('professores.index', compact('professores', 'totalProfessores'));
    }

    public function create()
    {
        $pessoas = Pessoa::all();
        $professores = Professor::all();
        return view('professores.create', compact('professores', 'pessoas'));
    }

    public function store(Request $request)
    {
        $input = $request->toArray();
        Professor::create($input);

        return redirect()->route('professores.index')->with('Sucesso', 'Professor cadastrado com sucesso!');
    }

    public function destroy($idProfessor)
    {
        $professores = Professor::find($idProfessor);
        $professores->delete();

        return redirect()->route('professores.index')->with('Sucesso', 'Professor deletado com sucesso!');
    }

    public function edit($idProfessor)
    {
        $professores = Professor::find($idProfessor);
        return view('professores.edit', compact('professores'));
    }

    public function update(Request $request, $idProfessor)
    {
        $input = $request->toArray();
        $professores = Professor::find($idProfessor);

        $professores->fill($input);
        $professores->save();

        return redirect()->route('professores.index')->with('Sucesso', 'Professor alterado com sucesso!');

    }
}

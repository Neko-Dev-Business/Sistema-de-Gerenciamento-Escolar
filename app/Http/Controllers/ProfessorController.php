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
        $pessoa = Pessoa::all();
        
        $professor = DB::table('professor')
        ->join('pessoa', 'pessoa.idPessoa', '=', 'professor.idPessoa')
        ->where('idProfessor', 'like', '%'.$request->buscaProfessor.'%')->orderBy('idProfessor','asc')->get();
       
        $totalProfessores = Professor::all()->count();
        return view('professor.index', compact('professor', 'totalProfessores'));
    }

    public function create()
    {
        $pessoa = Pessoa::all();
        $professor = Professor::all();
        return view('professor.create', compact('professor', 'pessoa'));
    }

    public function store(Request $request)
    {
        $input = $request->toArray();
        Professor::create($input);

        return redirect()->route('professor.index')->with('Sucesso', 'Professor cadastrado com sucesso!');
    }

    public function destroy($idProfessor)
    {
        $professor = Professor::find($idProfessor);
        $professor->delete();

        return redirect()->route('professor.index')->with('Sucesso', 'Professor deletado com sucesso!');
    }

    public function edit($idProfessor)
    {
        $professor = Professor::find($idProfessor);
        return view('professor.edit', compact('professor'));
    }

    public function update(Request $request, $idProfessor)
    {
        $input = $request->toArray();
        $professor = Professor::find($idProfessor);

        $professor->fill($input);
        $professor->save();

        return redirect()->route('professor.index')->with('Sucesso', 'Professor alterado com sucesso!');

    }
}

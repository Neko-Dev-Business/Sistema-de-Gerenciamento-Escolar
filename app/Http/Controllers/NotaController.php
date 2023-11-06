<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $pessoas = Pessoa::where('tipoUsuario', 1)
            ->join('notas', 'notas.idPessoa', '=', 'pessoas.idPessoa', 'inner')
            ->where('nomePessoa', 'like', '%'.$request->buscaPessoa.'%')
            ->orderBy('nomePessoa', 'asc')
            ->simplePaginate(10);

        $totalAlunos = Pessoa::where('tipoUsuario', 1)->count();

        return view('notas.index', compact('pessoas', 'totalAlunos'));
    }

    public function edit($idPessoa)
    {
        $pessoa = Pessoa::find($idPessoa);
        $notas = Nota::where('idPessoa', $idPessoa)->first();
        return view('notas.edit', compact('pessoa', 'notas'));
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
}

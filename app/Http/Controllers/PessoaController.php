<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Endereco;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');

    }

    public function index(Request $request)
    {
        // $pessoa = Pessoa::where('nomePessoa', 'like', '%'.$request->buscaPessoa.'%')->orderBy('nomePessoa','asc')->paginate(10);
        $pessoas = DB::table('pessoas')
        ->join('enderecos', 'enderecos.idPessoa', '=', 'pessoas.idPessoa', 'inner')
        ->where('nomePessoa', 'like', '%'.$request->buscaPessoa.'%')->orderBy('nomePessoa','asc')
        ->simplePaginate(10);

        $totalPessoas = Endereco::all()->count();
        return view('pessoas.index', compact('pessoas', 'totalPessoas'));
    }

    public function create()
    {
        $UFs = DB::table('ufs')->get();
        return view('pessoas.create', compact('UFs'));
    }


    public function store(Request $request)
    {
        $input = $request->toArray();

        $input = str_replace(".","", $input);
        $input = str_replace("-","", $input);
        $input = str_replace("/","", $input);

        $idPessoa = Pessoa::create($input);

        $input['idPessoa'] = $idPessoa;
        $input['idPessoa'] = $idPessoa->idPessoa;

        Endereco::create($input);

        return redirect()->route('pessoas.index')->with('Sucesso', 'Pessoa cadastrada com sucesso!');
    }

    public function destroy($idPessoa)
    {   
        $idAluno = DB::table('alunos')->select('idAluno')->where('idPessoa', '=', $idPessoa)->first();
        $idProfessor = DB::table('professores')->select('idProfessor')->where('idPessoa', '=', $idPessoa)->first();

        if (!empty($idAluno) || !empty($idProfessor)) {
            return redirect()->route('pessoas.index')->
            with('Erro', 'Antes de excluir a pessoa, é necessário excluir o seu cadastro de '.(!empty($idAluno)?'aluno':'professor').'.');
        }

        $idEndereco = DB::table('enderecos')->select('idEndereco')->where('idPessoa', '=', $idPessoa)->first();
        $endereco = Endereco::find($idEndereco->idEndereco);
        $endereco->delete();

        $pessoa = Pessoa::find($idPessoa);
        $pessoa->delete();

        return redirect()->route('pessoas.index')->with('Sucesso', 'Pessoa deletada com sucesso!');
    }

    public function edit($idPessoa)
    {
        $pessoas = Pessoa::find($idPessoa);
        $idEndereco = DB::table('enderecos')->select('idEndereco')->where('idPessoa', '=', $idPessoa)->first();
        $enderecos = Endereco::find($idEndereco->idEndereco);
        $UFs = DB::table('ufs')->get();
        return view('pessoas.edit', compact('pessoas', 'enderecos', 'UFs'));
    }

    public function update(Request $request, $idPessoa)
    {
        $input = $request->toArray();
        $pessoas = Pessoa::find($idPessoa);
        $idEndereco = DB::table('enderecos')->select('idEndereco')->where('idPessoa', '=', $idPessoa)->first();
        $enderecos = Endereco::find($idEndereco->idEndereco);

        $pessoas->fill($input);
        $pessoas->save();

        $enderecos->fill($input);
        $enderecos->save();

        return redirect()->route('pessoas.index')->with('Sucesso', 'Pessoa alterada com sucesso!');
    }
}

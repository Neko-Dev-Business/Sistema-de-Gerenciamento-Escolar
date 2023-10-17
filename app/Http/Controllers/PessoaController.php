<?php

namespace App\Http\Controllers;

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
        // $pessoas = Pessoa::where('nomePessoa', 'like', '%'.$request->buscaPessoa.'%')->orderBy('nomePessoa','asc')->paginate(10);
        $pessoa = DB::table('pessoa')
        ->join('endereco', 'endereco.idPessoa', '=', 'pessoa.idPessoa', 'inner')
        ->where('nomePessoa', 'like', '%'.$request->buscaPessoa.'%')->orderBy('nomePessoa','asc')->paginate(30);

        $totalPessoas = Pessoa::all()->count();
        return view('pessoa.index', compact('pessoa', 'totalPessoas'));
    }

    public function create()
    {
        $UFs = DB::table('uf')->get();
        return view('pessoa.create', compact('UFs'));
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

        return redirect()->route('pessoa.index')->with('Sucesso', 'Pessoa cadastrada com sucesso!');
    }

    public function destroy($idPessoa)
    {   
        $idAluno = DB::table('aluno')->select('idProfessor')->where('idPessoa', '=', $idPessoa)->first();
        $idProfessor = DB::table('professor')->select('idAluno')->where('idPessoa', '=', $idPessoa)->first();

        if (!empty($idAluno) || !empty($idProfessor)) {
            return redirect()->route('pessoas.index')->
            with('Erro', 'Antes de excluir a pessoa, é necessário excluir o seu cadastro de '.(!empty($idAluno)?'aluno':'professor').'.');
        }

        $idEndereco = DB::table('endereco')->select('idEndereco')->where('idPessoa', '=', $idPessoa)->first();
        $endereco = Endereco::find($idEndereco->idEndereco);
        $endereco->delete();

        $pessoa = Pessoa::find($idPessoa);
        $pessoa->delete();

        return redirect()->route('pessoa.index')->with('Sucesso', 'Pessoa deletada com sucesso!');
    }

    public function edit($idPessoa)
    {
        $pessoa = Pessoa::find($idPessoa);
        $idEndereco = DB::table('endereco')->select('idEndereco')->where('idPessoa', '=', $idPessoa)->first();
        $endereco = Endereco::find($idEndereco->idEndereco);
        $UFs = DB::table('uf')->get();
        return view('pessoa.edit', compact('pessoa', 'endereco', 'UFs'));
    }

    public function update(Request $request, $idPessoa)
    {
        $input = $request->toArray();
        $pessoa = Pessoa::find($idPessoa);
        $idEndereco = DB::table('endereco')->select('idEndereco')->where('idPessoa', '=', $idPessoa)->first();
        $endereco = Endereco::find($idEndereco->idEndereco);

        $pessoa->fill($input);
        $pessoa->save();

        $endereco->fill($input);
        $endereco->save();

        return redirect()->route('pessoa.index')->with('Sucesso', 'Pessoa alterada com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use Illuminate\Http\Request;

class EscolaController extends Controller
{

    public function index()
    {
        $escola = Escola::first();
        return view('escola.index', compact('escola'));
    }

    public function create()
    {
        return view('escola.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomeEscola' => 'required|string|max:255',
            'secretariaEscola' => 'required|string|max:255',
            'diretoraEscola' => 'required|string|max:255',
            'enderecoEscola' => 'required|string',
            'assinaturaDiretoraEscola' => 'required|string',
            'cnpjEscola' => 'required|string|max:18|unique:escolas',
        ]);

        Escola::create($validatedData);
        return redirect()->route('escola.index')->with('success', 'Escola criada com sucesso!');
    }

    public function edit($id)
    {
        $escola = Escola::findOrFail($id);
        return view('escola.edit', compact('escola'));
    }

    // Atualiza um registro de escola existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomeEscola' => 'required|string|max:255',
            'secretariaEscola' => 'required|string|max:255',
            'diretoraEscola' => 'required|string|max:255',
            'enderecoEscola' => 'required|string',
            'assinaturaDiretoraEscola' => 'required|string',
            'cnpjEscola' => 'required|string|max:18|unique:escolas,cnpjEscola,' . $id,
        ]);

        $escola = Escola::findOrFail($id);
        $escola->update($validatedData);
        return redirect()->route('escola.index')->with('success', 'Escola atualizada com sucesso!');
    }
}

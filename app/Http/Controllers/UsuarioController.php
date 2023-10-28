<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /* LISTA DE USUÁRIOS */
    public function index(Request $request)
    {
        // Autorização de acesso usando Gates
        Gate::authorize('acessar-usuarios');

        // Busca usuários com base no parâmetro de busca (nome)
        $usuarios = User::where('name', 'like', '%' . $request->buscaUsuario . '%')->orderBy('name', 'asc')->get();

        // Contagem total de usuários
        $totalUsuarios = User::all()->count();

        // Retorna a view 'usuarios.index' com os usuários e o total de usuários
        return view('usuarios.index', compact('usuarios', 'totalUsuarios'));
    }
    /* endINDEX DE USUÁRIOS */

    /* CADASTRAR USUÁRIOS */
    public function create()
    {
        // Autorização de acesso usando Gates
        Gate::authorize('acessar-usuarios');

        // Retorna a view de criação de usuário
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        // Autorização de acesso usando Gates
        Gate::authorize('acessar-usuarios');

        // Converte a requisição para um array associativo
        $input = $request->toArray();

        // Verifica se uma foto foi enviada e se é válida
        if (!empty($input['foto'] && $input['foto']->isValid())) {
            // Obtém o nome hash da foto
            $nomeArquivo = $input['foto']->hashName();

            // Faz o upload da foto para a pasta 'public/usuarios'
            $input['foto']->store('public/usuarios');

            // Define o nome do arquivo no campo 'foto'
            $input['foto'] = $nomeArquivo;
        } else {
            $input['foto'] = null;
        }

        // Criptografa a senha usando bcrypt
        $input['password'] = bcrypt($input['password']);

        // Cria um novo usuário no banco de dados
        User::create($input);

        // Redireciona para a rota 'usuarios.index' com uma mensagem de sucesso
        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário cadastrado com sucesso');
    }
    /* endCADASTRAR USUÁRIOS */

    /* DELETAR USUÁRIOS */
    public function destroy($id)
    {
        // Encontra o usuárioa pelo ID
        $usuario = User::find($id);

        // Exclui a foto associada ao usuário da pasta 'public/usuarios'
        Storage::delete('public/usuarios/' . $usuario['foto']);

        // Deleta o usuário
        $usuario->delete();

        // Redireciona para a rota 'usuarios.index' com uma mensagem de sucesso
        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário deletado com sucesso!');
    }
    /* endDELETAR USUÁRIOS */

    /* EDITAR USUÁRIOS */
    public function edit($id)
    {
        // Encontra o usuário pelo ID
        $usuario = User::find($id);

        // Retorna a view de edição de usuário com os dados do usuário
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        // Encontra o usuário pelo ID
        $usuario = User::find($id);

        // Converte a requisição para um array associativo
        $input = $request->toArray();

        // Verifica se uma foto foi enviada e se é válida
        if (!empty($input['foto']) && $input['foto']->isValid()) {
            // Exclui a foto anterior associada ao usuário da pasta 'public/usuarios'
            Storage::delete('public/usuarios/' . $usuario['foto']);

            // Obtém o nome hash da nova foto
            $nomeArquivo = $input['foto']->hashName();

            // Faz o upload da nova foto para a pasta 'public/usuarios'
            $input['foto']->store('public/usuarios');

            // Define o nome do arquivo no campo 'foto'
            $input['foto'] = $nomeArquivo;
        }

        // Verifica se a senha está sendo alterada
        if ($input['password'] != null) {
            // Criptografa a nova senha usando bcrypt
            $input['password'] = bcrypt($input['password']);
        } else {
            // Mantém a senha existente se não for alterada
            $input['password'] = $usuario['password'];
        }

        // Preenche o modelo do usuário com os dados atualizados e salva
        $usuario->fill($input);
        $usuario->save();

        // Redireciona para a rota 'usuarios.index' com uma mensagem de sucesso
        return redirect()->route('usuarios.index')->with('sucesso', 'Usuário alterado com sucesso!');
    }
    /* endEDITAR USUÁRIOS */

    /* ALTERAR DADOS USUÁRIO LOGADO */
    public function alt($id)
    {
        // Encontra o usuário pelo ID
        $usuario = User::find($id);

        // Retorna a view de alteração de dados do usuário logado com os dados do usuário
        return view('usuarios.alt', compact('usuario'));
    }

    public function update_alt(Request $request, $id)
    {
        // Converte a requisição para um array associativo
        $input = $request->toArray();

        // Encontra o usuário pelo ID
        $usuario = User::find($id);

        // Verifica se uma foto foi enviada e se é válida
        if (!empty($input['foto']) && $input['foto']->isValid()) {
            // Exclui a foto anterior associada ao usuário da pasta 'public/usuarios'
            Storage::delete('public/usuarios/' . $usuario['foto']);

            // Obtém o nome hash da nova foto
            $nomeArquivo = $input['foto']->hashName();

            // Faz o upload da nova foto para a pasta 'public/usuarios'
            $input['foto']->store('public/usuarios');

            // Define o nome do arquivo no campo 'foto'
            $input['foto'] = $nomeArquivo;
        }

        // Preenche o modelo do usuário com os dados atualizados e salva
        $usuario->fill($input);
        $usuario->save();

        // Redireciona para a rota 'usuarios.alt' com uma mensagem de sucesso
        return redirect()->route('usuarios.alt', compact('id'))->with('sucesso', 'Cadastro alterado com sucesso!');
    }
    /* endALTERAR DADOS USUÁRIO*/
/* TROCAR SENHA USUÁRIO LOGADO */
public function updatepass(Request $request, $id)
{
    // Encontra o usuário pelo ID
    $usuario = User::find($id);

    // Converte a requisição para um array associativo
    $input = $request->toArray();

    // Verifica se a senha atual digitada está correta
    if (!Hash::check($input['password_old'], Auth::user()->password)) {
        // Senha incorreta: retorna um erro
        return redirect()
            ->route('usuarios.alt', compact('id'))
            ->with('erro', 'Não foi possível modificar sua senha. A senha atual está incorreta.');
    }

    // Valida se a senha nova e a senha de confirmação coincidem
    $validar = Validator::make(
        $request->all(), [
            'password' => ["required"],
            'password_check' => 'required|same:password'
        ]
    );

    // Se a validação falhar, retorna um erro
    if ($validar->fails()) {
        return redirect()
            ->route('usuarios.alt', compact('id'))
            ->with('erro', 'Não foi possível modificar sua senha. Senha informada e senha de confirmação não coincidem.');
    }

    // Criptografa a nova senha usando bcrypt
    $input['password'] = bcrypt($input['password']);

    // Preenche o modelo do usuário com a nova senha e salva
    $usuario->fill($input);
    $usuario->save();

    // Redireciona para a rota 'usuarios.alt' com uma mensagem de sucesso
    return redirect()->route('usuarios.alt', compact('id'))->with('sucesso', 'Senha alterada com sucesso!');
}
/* endTROCAR SENHA USUÁRIO LOGADO */
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function landing()
    {
        return view('login.landing');
    }


    public function auth(Request $request)
    {
        // Validação das credenciais
        $credenciais = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'O campo email é obrigatório.',
                'email.email' => 'O email informado não é válido',
                'password.required' => 'O campo senha é obrigatório.',
            ]
        );

        // Tentativa de autenticação
        if (Auth::attempt($credenciais)) {
            // Regenerar a sessão
            session()->regenerate();

            // Redirecionar para a página de destino ou dashboard
            return redirect()->intended(route('dashboard.index'));
        } else {
            // Redirecionar de volta com mensagem de erro
            return redirect()->back()->with('erro', 'Email ou senha inválidos.');
        }
    }

    public function logout(Request $request)
    {
        // Logout do usuário
        Auth::logout();

        // Invalidar a sessão
        session()->invalidate();

        // Regenerar o token da sessão
        session()->regenerateToken();

        // Redirecionar para a página de login
        return redirect()->route('login.index');
    }
}

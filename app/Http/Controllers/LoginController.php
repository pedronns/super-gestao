<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário ou senha não encontrado';
        }

        if ($request->get('erro') == 2) {
            $erro = 'É necessário realizar login para ter acesso à página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        // autenticação manual, apenas para estudo

        $regras = [
            'usuario' => 'email|required',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'Insira um e-mail válido',
            'usuario.required' => 'Insira um e-mail',
            'senha.required' => 'Insira uma senha'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user  = new User()
        ->where('email', $email)
        ->where('password', $password)
        ->get()
        ->first();

        if (isset($user->name)) {
            session_start();
            $_SESSION['nome'] = $user->name;
            $_SESSION['email'] = $user->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair() {
        session_destroy();

        return redirect()->route('site.index');
    }
}

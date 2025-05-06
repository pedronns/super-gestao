<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request) {
        // autenticação manual, apenas para estudo

        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'Insira um e-mail válido',
            'senha.required' => 'Insira uma senha'
        ];

        $request->validate($regras, $feedback);
    }
}

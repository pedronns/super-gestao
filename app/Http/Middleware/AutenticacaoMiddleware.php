<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil): Response
    {
        // TO DO: implementar a verificação
        echo $metodo_autenticacao.' - '.$perfil;

        if($metodo_autenticacao == 'padrao') {
            echo 'Verificar o usuário e senha no banco de dados'.' - '.$perfil;
        }

        if($metodo_autenticacao == 'ldap') {
            echo 'Verificar o usuário e senha no AD';
        }
        
        if($perfil == 'visitante') {
            echo 'Exibir apenas alguns recursos';
        } else {
            echo 'Carregar o perfil do BD';
        }

        if (true) {
            return $next($request);
        } else {
            return Response('Acesso Negado: Rota exige autenticação.');
        }

    }
}

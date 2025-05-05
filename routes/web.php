<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;

use App\Http\Middleware\AutenticacaoMiddleware;

/*
Route::get('/', function () {
    return 'Olá';
});
 */

Route::get('/',
    [\App\Http\Controllers\PrincipalController::class,
    'principal'
])->name('site.index');

Route::get('/sobre-nos',
    [\App\Http\Controllers\SobreNosController::class,
    'sobreNos'
])->name('site.sobrenos');

Route::get('/contato',
    [\App\Http\Controllers\ContatoController::class,
    'contato'
])->name('site.contato');

Route::post(
    '/contato',
    [\App\Http\Controllers\ContatoController::class,
    'salvar'
])->name('site.contato');

Route::get(
    '/login',
    function () {
        return 'Login';
})->name('site.login');


// rotas privadas

Route::prefix('/app')->group(function () {

    Route::middleware(AutenticacaoMiddleware::class)->get(
        '/clientes',
        function () {
            return 'clientes';
        })->name('app.clientes');

    Route::middleware(AutenticacaoMiddleware::class)->get(
        '/fornecedores',
        [FornecedorController::class, 'index'
        ])->name('app.fornecedores');


    Route::middleware(AutenticacaoMiddleware::class)->get(
        '/produtos',
        function () {
            return 'produtos';
        })->name('app.produtos');
});



Route::get('/teste/{p1}/{p2}',
    [TesteController::class, 'teste'
    ])->name('teste');


// Rota de fallback
Route::fallback(function () {
    echo 'A rota acessada não existe. Clique <a href="'.route('site.index'
    ).'"/>aqui</a> para ir para a página inicial';
});

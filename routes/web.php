<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;
use App\Http\Middleware\AutenticacaoMiddleware;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;

/*
Route::get('/', function () {
    return 'Olá';
});
 */

Route::get(
    '/',
    [\App\Http\Controllers\PrincipalController::class,
    'principal'
]
)->name('site.index');

Route::get(
    '/sobre-nos',
    [\App\Http\Controllers\SobreNosController::class,
    'sobreNos'
]
)->name('site.sobrenos');

Route::get(
    '/contato',
    [\App\Http\Controllers\ContatoController::class,
    'contato'
]
)->name('site.contato');

Route::post(
    '/contato',
    [\App\Http\Controllers\ContatoController::class,
    'salvar'
]
)->name('site.contato');

Route::get(
    '/login/{erro?}',
    [\App\Http\Controllers\LoginController::class,
    'index'
]
)->name('site.login');

Route::post(
    '/login',
    [\App\Http\Controllers\LoginController::class,
    'autenticar'
]
)->name('site.login');


// rotas privadas

Route::middleware('autenticacao:padrao,visitante')->prefix('app')->name('app.')->group(function () {
    Route::get('/home', [
        HomeController::class, 'index'
        ])->name('home');

    Route::get('/sair', [
        LoginController::class, 'sair'
        ])->name('sair');

    Route::get('/cliente', [
        ClienteController::class, 'index'
        ])->name('cliente');


    Route::get('/fornecedor', [
        FornecedorController::class, 'index'
        ])->name('fornecedor');

    Route::post('/fornecedor/listar', [
        FornecedorController::class, 'listar'
        ])->name('fornecedor.listar');

    
    Route::get('/fornecedor/adicionar', [
        FornecedorController::class, 'adicionar'
        ])->name('fornecedor.adicionar');

    Route::post('/fornecedor/adicionar', [
        FornecedorController::class, 'adicionar'
        ])->name('fornecedor.adicionar');


    Route::get('/fornecedor/listar', [
        FornecedorController::class, 'listar'
        ])->name('fornecedor.listar');

    Route::get('/produto', [
        ProdutoController::class, 'index'
        ])->name('produto');

    
});



Route::get(
    '/teste/{p1}/{p2}',
    [TesteController::class, 'teste'
    ]
)->name('teste');


Route::fallback(function () {
    echo 'A rota acessada não existe. Clique <a href="'.route('site.index'
    ).'"/>aqui</a> para ir para a página inicial';
});

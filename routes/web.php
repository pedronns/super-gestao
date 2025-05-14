<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;
use App\Http\Middleware\AutenticacaoMiddleware;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;

// obs: por enquanto, trabalhando apenas com GET e POST

// página inicial
Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');

// página "Sobre Nós"
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

// página de contato (exibição do formulário)
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');

// processar o envio do formulário de contato
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');

// exibir o formulário de login
Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');

// processar a autenticação do usuário
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');

// Rotas protegidas por autenticação
Route::middleware('autenticacao:padrao,visitante')->prefix('app')->name('app.')->group(function () {

    // página inicial do aplicativo
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // logout do sistema
    Route::get('/sair', [LoginController::class, 'sair'])->name('sair');

    // listar clientes
    Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente');

    // index fornecedores
    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('fornecedor');

    // listar fornecedores (POST)
    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('fornecedor.listar');

    // list fornecedores (GET)
    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('fornecedor.listar');

    // adicionar um novo fornecedor
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('fornecedor.adicionar');

    // processar o envio do formulário de adição de fornecedor
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('fornecedor.adicionar');

    // editar fornecedores
    Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])->name('fornecedor.editar');

    // deletar fornecedores
    Route::get('/fornecedor/excluir/{id}', [FornecedorController::class, 'excluir'])->name('fornecedor.excluir');

    // página de produtos
    Route::resource('produto', ProdutoController::class);
});

// Rota de teste com parâmetros dinâmicos
Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');

// Rota de fallback
Route::fallback(function () {
    echo 'A rota acessada não existe. Clique <a href="'.route('site.index').'"/>aqui</a> para ir para a página inicial';
});

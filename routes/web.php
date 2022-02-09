<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return "Olá, seja bem-vindo ao curso!";
// });

//Route::middleware(LogAcessoMiddleware::class)->get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');

Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::Class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::Class, 'autenticar'])->name('site.login');


Route::middleware('autenticacao:ldap')->prefix('/app')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [\App\Http\Controllers\LoginController::Class, 'sair'])->name('app.sair');

    //FORNECEDOR
    Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/fornecedor/editar/{id}/{msg?}', [\App\Http\Controllers\FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/excluir/{id}', [\App\Http\Controllers\FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

    //PRODUTO
    Route::resource('produto', \App\Http\Controllers\ProdutoController::Class);

    //Produto Detalhes
    Route::resource('produto-detalhe', \App\Http\Controllers\ProdutoDetalheController::Class);

    Route::resource('cliente', \App\Http\Controllers\ClienteController::Class);
    Route::resource('pedido', \App\Http\Controllers\PedidoController::Class);
   
    Route::get('pedido-produto/create/{pedido}', [App\Http\Controllers\PedidoProdutoController::class, 'create'])->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', [App\Http\Controllers\PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
    Route::delete('pedido-produto-destroy/{pedidoProduto}/{pedido_id}',  [App\Http\Controllers\PedidoProdutoController::class, 'destroy'])->name('pedido-produto.destroy');
});

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('site.teste');

Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'. route('site.index') .'"> Clique aqui </a> para ir para a página inicial';
});


/* 
    Principais métodos do objeto Route

    get
    post
    prefix
    redirect
    fallback
    put
    patch
    delete
    options
*/

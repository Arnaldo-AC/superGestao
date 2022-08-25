<?php

use Illuminate\Support\Facades\Route;
use App\Http\middleware\logAcessoMiddleware;

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

Route::get('/index', 'principalController@principal')
->name('site.index');

Route::get('/sobre', 'sobreController@sobre')->name('site.sobre');

Route::get('/contacto', 'contactoController@contacto')->name('site.contacto');
Route::post('/contacto', 'contactoController@salvar')->name('site.contacto');

// nome, categoria, assunto, mensagem

// Enviando parametros Forma 1 - parametros obrigatórios
/*Route::get('/contacto/{nome}/{mensagem}', function($n,$m)
{
    echo "Estamos aqui $n, tua mensagem é $m";
});*/

// Enviando parametros opcionais e padrões
/*Route::get('/contacto/{nome}/{mensagem?}', function(string $n, string $m="AC")
{
    echo "Estamos aqui $n, tua mensagem é $m";
});*/

Route::get('/login/{erro?}', 'loginController@index')->name('site.login');
Route::post('/login', 'loginController@autenticar')->name('site.login');

// Definindo prefixo /app
Route::middleware('autenticacao:padrao,vistante')->prefix('/app')->group(function()
{
    Route::get('/home', 'homeController@index')->name('app.home');
    Route::get('/sair', 'loginController@sair')->name('app.sair');
    // Nomeando rotas: são usados apenas para codificação no LARAVEL

    Route::get('/fornecedores', 'fornecedorController@index')->name('app.fornecedores');

    Route::post('/fornecedores/listar', 'fornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedores/listar', 'fornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedores/adicionar', 'fornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedores/adicionar', 'fornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedores/editar/{id}/{msg?}', 'fornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedores/excluir/{id}/{msg?}', 'fornecedorController@excluir')->name('app.fornecedor.excluir');


    // produtos
    Route::resource('produto','produtoController');

    // produtos detalhes
    Route::resource('produto-detalhe','produtoDetalheController');

    Route::resource('cliente','ClienteController');
    
    Route::resource('pedido','PedidoController');
    
  //  Route::resource('pedido-produto','PedidoProdutoController');
  Route::get('pedido-produto/create/{pedido}','PedidoProdutoController@create')->name('pedido-produto.create');
  Route::post('pedido-produto/store/{pedido}','PedidoProdutoController@store')->name('pedido-produto.store');
});

// REDIRECIONAMENTO DE ROTAS(*REDIRECT )
/*Route::get('/rota1', function(){

    echo 'rota1';

})->name('site.rota1'); */

/*Route::get('/rota2', function(){

    return redirect()->route('site.rota1');

})->name('site.rota2'); */

// usando redirect(a rota2 será redirecionada para a rota1)
//Route::redirect('/rota2','/rota1');

// Rota de contigência(FALLBACK)
Route::fallback(function(){
    echo 'A rota acessada não existe, <a href="'.route('site.index').'"> clique aqui </a>  para ir para página inicial';
});

// ENCAMINHANDO PARÂMETROS DA ROTA PARA O CONTROLADOR
Route::get('/teste/{p1}/{p2}', 'testeController@teste')->name('teste'); 


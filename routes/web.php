<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoDetalheController;

Route::get('/', [PrincipalController::class,'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class,'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class,'salvar'])->name('site.contato');
Route::get('/login/{erro?}', [LoginController::class,'index'])->name('site.login');
Route::post('/login', [LoginController::class,'autenticar'])->name('site.login');

Route::middleware('autenticacao:ldap,visitante')->prefix('/app')->group(function () {
    Route::get('/home', [HomeController::class,'index'])->name('app.home');
    Route::get('/sair', [LoginController::class,'sair'])->name('app.sair');
    Route::get('/cliente', [ClienteController::class,'index'])->name('app.cliente');


    Route::get('/fornecedor', [FornecedorController::class,'index'])->name('app.fornecedor');
    Route::post('/fornecedor/listar', [FornecedorController::class,'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar', [FornecedorController::class,'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [FornecedorController::class,'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class,'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class,'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', [FornecedorController::class,'excluir'])->name('app.fornecedor.excluir');


    // Route::get('/produto', [ProdutoController::class,'index'])->name('app.produto');
    Route::resource('produto', ProdutoController::class);

    Route::resource('produto-detalhe', ProdutoDetalheController::class);
});


/* Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para página principal';
});
*/

/* Route::get('/contato/{nome}/{categoria_id?}', function (string $nome, int $categoria_id = 1) {
    echo "Estamos aqui: {$nome} - {$categoria_id}";
})
->where('categoria_id','[0-9]+')
->where('nome','[A-Za-z]+')
;
*/

/* Route::get('rota1',function(){ echo 'rota1'; })->name('site.rota1');
Route::get('rota2',function(){
    #echo 'rota2';
    return redirect()->route('site.rota1');
})->name('site.rota2');
#Route::redirect('/rota2','rota1');
*/



<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\FornecedorController;

Route::get('/', [PrincipalController::class,'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class,'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class,'salvar'])->name('site.contato');
Route::get('/login/{erro?}', [LoginController::class,'index'])->name('site.login');
Route::post('/login', [LoginController::class,'autenticar'])->name('site.login');

Route::middleware('autenticacao:ldap,visitante')->prefix('/app')->group(function () {
    Route::get('/clientes', function(){ return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class,'index'])->name('app.fornecedores');
    Route::get('/produtos', [ContatoController::class,'contato'])->name('app.produtos');
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



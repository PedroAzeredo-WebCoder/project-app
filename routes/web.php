<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/principal', [PrincipalController::class, 'principal'])->name('principal');
Route::get('/contato', [ContatoController::class, 'contato'])->name('contato');
Route::post('/contato/store', [ContatoController::class, 'contato'])->name('contato');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('sobre-nos');

Route::get('/contato/{nome}/{email?}/{telefone?}', function ($nome, $email = null, $telefone = null) {
    return "Olá $nome, seu email é $email e seu telefone é $telefone";
});

Route::get('/principal/{nome}/{categoria_id}', function ($nome, $categoria_id) {
    return "Olá $nome, sua categoria_id é $categoria_id";
})->where(['nome' => '[aA-zZ]+', 'categoria_id' => '[0-9]+']);

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/clientes', function () {
            return "Clientes";
        })->name('clientes');

        Route::get('/produtos', function () {
            return "Produtos";
        })->name('produtos');

        Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('fornecedores');
    });

Route::get('/rota1', function () {
    return Redirect::route('rota2');
})->name('rota1');

Route::get('/rota2', function () {
    return "Rota 2";
})->name('rota2');

Route::fallback(function () {
    return "Página não encontrada";
});

Route::get('/teste/{tipo}/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';

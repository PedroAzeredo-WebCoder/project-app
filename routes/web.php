<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/principal', [PrincipalController::class, 'principal'])->name('principal');
Route::get('/contato', [ContatoController::class, 'contato'])->name('contato');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('sobre-nos');

Route::get('/contato/{nome}/{email?}/{telefone?}', function ($nome, $email = null, $telefone = null) {
    return "Olá $nome, seu email é $email e seu telefone é $telefone";
});

Route::get('/principal/{nome}/{categoria_id}', function ($nome, $categoria_id) {
    return "Olá $nome, sua categoria_id é $categoria_id";
})->where(['nome' => '[aA-zZ]+', 'categoria_id' => '[0-9]+']);

Route::get('/clientes', function () {
    return "Clientes";
})->name('clientes');

Route::get('/produtos', function () {
    return "Produtos";
})->name('produtos');

Route::get('/fornecedores', function () {
    return "Fornecedores";
})->name('fornecedores');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';

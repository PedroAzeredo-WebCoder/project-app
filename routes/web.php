<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/principal', [PrincipalController::class, 'principal']);
Route::get('/contato', [ContatoController::class, 'contato']);
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos']);

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';

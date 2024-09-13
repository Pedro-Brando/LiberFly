<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\AuthController;

Route::post('auth/login', [AuthController::class, 'login']);

// Rotas protegidas com JWT
Route::middleware(['auth:api'])->group(function () {
    Route::get('produtos', [ProdutoController::class, 'index']);
    Route::get('produtos/{id}', [ProdutoController::class, 'show']);
});

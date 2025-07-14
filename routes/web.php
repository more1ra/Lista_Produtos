<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

Route::get('/', function () {
    return view('layouts.main');
});

Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/create', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/{id}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::delete('/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
});

Route::prefix('categorias')->group(function () {
    Route::get('/', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
    Route::put('/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
    Route::delete('/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
});
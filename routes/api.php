<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy']);

    Route::post('/produk', [ProdukController::class, 'store']);
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy']);
});
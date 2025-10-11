<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{slug}', [ProdukController::class, 'show']);
Route::get('/kategori', [KategoriController::class, 'index']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy']);

    Route::post('/produk', [ProdukController::class, 'store']);
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy']);
    Route::put('/produk/{produk}', [ProdukController::class, 'update']);
});
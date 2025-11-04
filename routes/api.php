<?php

use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PrintPDFController;
use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{slug}', [ProdukController::class, 'show']);
Route::get('/kategori', [KategoriController::class, 'index']);

Route::post('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/kategori/all', [KategoriController::class, 'getAll']);
Route::post('/bukti-order', [PrintPDFController::class, 'exportPdfOrder']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy']);
    Route::post('/kategori/{kategori}', [KategoriController::class, 'update']);

    Route::post('/produk', [ProdukController::class, 'store']);
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy']);
    Route::put('/produk/{produk}', [ProdukController::class, 'update']);

    Route::get('/pesanan', [PesananController::class, 'index']);
    Route::put('/pesanan/{pesanan}', [PesananController::class, 'update']);
    Route::get('/pesanan/{pesanan}', [PesananController::class, 'show']);

    Route::get('/analisis', [AnalisisController::class, 'analisis']);

    Route::post('/invoice/{id}', [PrintPDFController::class, 'exportPdfInvoice']);
});

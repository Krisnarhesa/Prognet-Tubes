<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangApiController;
use App\Http\Controllers\SatuanBarangApiController;
use App\Http\Controllers\PenjualanApiController;
use App\Http\Controllers\DetailPenjualanApiController;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\AuthApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Barang Resource
Route::apiResource('barang', BarangApiController::class);

// Penjualan Resource
Route::apiResource('penjualan', PenjualanApiController::class);

// User Resource
Route::apiResource('user', UserApiController::class);

// SatuanBarang Resource
Route::apiResource('satuanbarang', SatuanBarangApiController::class);

// DetailPenjualan Resource
Route::apiResource('detailpenjualan', DetailPenjualanApiController::class);

Route::post('register', [AuthApiController::class, 'register']) -> name('user.register');
Route::post('login', [AuthApiController::class, 'login']) -> name('user.login');
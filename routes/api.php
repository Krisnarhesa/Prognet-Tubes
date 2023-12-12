<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangApiController;
use App\Http\Controllers\PenjualanApiController;
use App\Http\Controllers\UserApiController;

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

Route::get('/Barang', [BarangApiController::class, 'create'])->name('Create Barang');
Route::post('/AddBarang', [BarangApiController::class, 'store'])->name('Store Barang');
Route::get('/ListBarang', [BarangApiController::class, 'index'])->name('List Barang');
Route::get('/DetailBarang/{id}', [BarangApiController::class, 'show'])->name('Show Barang');
Route::get('/Barang/{id}/edit', [BarangApiController::class, 'edit'])->name('Edit Barang');
Route::put('/UpdateBarang/{id}', [BarangApiController::class, 'update'])->name('Update Barang');
Route::delete('/DeleteBarang/{id}', [BarangApiController::class, 'destroy'])->name('Delete Barang');

Route::get('/Penjualan', [PenjualanApiController::class, 'create'])->name('Create Penjualan');
Route::post('/AddPenjualan', [PenjualanApiController::class, 'store'])->name('Store Penjualan');
Route::get('/ListPenjualan', [PenjualanApiController::class, 'index'])->name('List Penjualan');
Route::get('/DetailPenjualan/{id}', [PenjualanApiController::class, 'show'])->name('Show Penjualan');
Route::get('/Penjualan/{id}/edit', [PenjualanApiController::class, 'edit'])->name('Edit Penjualan');
Route::put('/UpdatePenjualan/{id}', [PenjualanApiController::class, 'update'])->name('Update Penjualan');
Route::delete('/DeletePenjualan/{id}', [PenjualanApiController::class, 'destroy'])->name('Delete Penjualan');

Route::get('/User', [UserApiController::class, 'create'])->name('Create User');
Route::post('/AddUser', [UserApiController::class, 'store'])->name('Store User');
Route::get('/ListUser', [UserApiController::class, 'index'])->name('List User');
Route::get('/DetailUser/{id}', [UserApiController::class, 'show'])->name('Show User');
Route::get('/User/{id}/edit', [UserApiController::class, 'edit'])->name('Edit User');
Route::put('/UpdateUser/{id}', [UserApiController::class, 'update'])->name('Update User');
Route::delete('/DeleteUser/{id}', [UserApiController::class, 'destroy'])->name('Delete User');

Route::get('/SatuanBarang', [BarangApiController::class, 'create'])->name('Create SatuanBarang');
Route::post('/AddSatuanBarang', [BarangApiController::class, 'store'])->name('Store SatuanBarang');
Route::get('/ListSatuanBarang', [BarangApiController::class, 'index'])->name('List SatuanBarang');
Route::get('/DetailSatuanBarang/{id}', [BarangApiController::class, 'show'])->name('Show SatuanBarang');
Route::get('/SatuanBarang/{id}/edit', [BarangApiController::class, 'edit'])->name('Edit SatuanBarang');
Route::put('/UpdateSatuanBarang/{id}', [BarangApiController::class, 'update'])->name('Update SatuanBarang');
Route::delete('/DeleteSatuanBarang/{id}', [BarangApiController::class, 'destroy'])->name('Delete SatuanBarang');

Route::get('/DetailPenjualan', [PenjualanApiController::class, 'create'])->name('Create DetailPenjualan');
Route::post('/AddDetailPenjualan', [PenjualanApiController::class, 'store'])->name('Store DetailPenjualan');
Route::get('/ListDetailPenjualan', [PenjualanApiController::class, 'index'])->name('List DetailPenjualan');
Route::get('/DetailDetailPenjualan/{id}', [PenjualanApiController::class, 'show'])->name('Show DetailPenjualan');
Route::get('/DetailPenjualan/{id}/edit', [PenjualanApiController::class, 'edit'])->name('Edit DetailPenjualan');
Route::put('/UpdateDetailPenjualan/{id}', [PenjualanApiController::class, 'update'])->name('Update DetailPenjualan');
Route::delete('/DeleteDetailPenjualan/{id}', [PenjualanApiController::class, 'destroy'])->name('Delete DetailPenjualan');

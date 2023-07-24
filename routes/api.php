<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\PenawaranController;
use App\Http\Controllers\Api\ProductPenawaranController;
use App\Http\Controllers\Api\SignatureUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Company
Route::get('/data-company', [CompanyController::class, 'index']);
Route::post('/data-company', [CompanyController::class, 'create']);
Route::patch('/data-company/{id}', [CompanyController::class, 'edit']);
Route::post('/data-company/{id}', [CompanyController::class, 'update']); //Edit data company

// Signature User
Route::get('/user-signature', [SignatureUserController::class, 'index']);
Route::get('/user-signature/{id}', [SignatureUserController::class, 'indexById']);
Route::post('/user-signature', [SignatureUserController::class, 'create']);

// Penawaran
Route::post('/penawaran', [PenawaranController::class, 'create']);
Route::get('/penawaran', [PenawaranController::class, 'index']);
Route::get('/penawaran/{id}', [PenawaranController::class, 'indexById']);
Route::post('/edit-penawaran/{id}', [PenawaranController::class, 'update']);
Route::get('/filter/penawaran', [PenawaranController::class, 'filterDate']);

// Product Penawaran
Route::post('/product-penawaran', [ProductPenawaranController::class, 'create']);
Route::get('/product-penawaran/{id}', [ProductPenawaranController::class, 'index']);
Route::post('/edit-product-penawaran/{id}', [ProductPenawaranController::class, 'update']);
Route::delete('/delete-product-penawaran/{id}', [ProductPenawaranController::class, 'destroy']);
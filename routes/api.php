<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/transactions", [TransactionController::class, 'index']);
Route::post("/transactions", [TransactionController::class, 'store']);
Route::get("/transactions/{id}", [TransactionController::class, 'show']);
Route::delete("/transactions/{id}", [TransactionController::class, 'destroy']);


Route::get("/categories", [CategoryController::class, 'index']);
Route::post("/categories", [CategoryController::class, 'store']);
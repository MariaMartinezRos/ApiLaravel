<?php

use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); //middleware de autenticacion sanctum


Route::get('lists/categories', [CategoryController::class, 'list']);

Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('categories', CategoryController::class);
    Route::get('products', [ProductController::class, 'index']);
});
//cualquier ruta de la api que necesite autenticacion, solo hay que meterla dentro del grupo de las rutas














//Route::get('categories', [CategoryController::class, 'index']);
//Route::get('categories/{category}', [CategoryController::class, 'show']);
//Route::post('categories', [CategoryController::class,'store']);
//Route::put('categories/{category}', [CategoryController::class, 'update']);
//Route::delete('categories/{category}', [CategoryController::class, 'destroy']);

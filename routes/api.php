<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Essa rota pode utilizar todos os verbos HTTP
//Rotas públicas
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/products/:id',[ProductController::class,'show']);
Route::get('/products/search/{name}',[ProductController::class,'search']);
Route::get('/products',[ProductController::class,'index']);

//Protegendo as rotas
Route::group(['middleware'=>['auth:sanctum']],function(){
 Route::post('/products',[ProductController::class,'store']);
 Route::put('/products/{id}',[ProductController::class,'update']);
 Route::delete('/products/{id}',[ProductController::class,'delete']);
 Route::post('/logout',[AuthController::class,'logout']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

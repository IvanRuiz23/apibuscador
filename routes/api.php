<?php

use App\Http\Controllers\CvaController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('marcas', MarcaController::class);
Route::apiResource('detalles', LinkController::class);
Route::apiResource('user',UserController::class);
Route::put('off/{id}',[LinkController::class,'off']);
Route::put('on/{id}',[LinkController::class,'on']);
Route::get('cva',[LinkController::class, 'cva']);
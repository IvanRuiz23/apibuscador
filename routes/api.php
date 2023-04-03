<?php

use App\Http\Controllers\ComparativoController;
use App\Http\Controllers\ImpresoraController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\PantallaController;
use App\Http\Controllers\PcController;
use App\Http\Controllers\ProyectorController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('marcas', MarcaController::class);
Route::apiResource('detalles', LinkController::class);
Route::apiResource('user',UserController::class);
Route::put('off/{id}',[LinkController::class,'off']);
Route::put('on/{id}',[LinkController::class,'on']);
Route::get('cva',[LinkController::class, 'cva']);
Route::get('allUser',[UserController::class, 'getUser']);
Route::apiResource('comparativos',[ComparativoController::class]);
Route::apiResource('impresora',[ImpresoraController::class]);
Route::apiResource('laptop',[LaptopController::class]);
Route::apiResource('monitor',[MonitorController::class]);
Route::apiResource('pantalla',[PantallaController::class]);
Route::apiResource('pc',[PcController::class]);
Route::apiResource('proyector',[ProyectorController::class]);
Route::apiResource('scanner',[ScannerController::class]);
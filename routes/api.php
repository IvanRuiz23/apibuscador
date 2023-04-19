<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComparativoController;
use App\Http\Controllers\PcController;
use App\Http\Controllers\ImpresoraController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\PantallaController;
use App\Http\Controllers\ProyectorController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\PaginaWebController;
use App\Http\Controllers\CtController;


// api de links
Route::apiResource('marcas', MarcaController::class);
Route::apiResource('detalles', LinkController::class);
Route::apiResource('user',UserController::class);
Route::put('off/{id}',[LinkController::class,'off']);
Route::put('on/{id}',[LinkController::class,'on']);
Route::get('cva',[LinkController::class, 'cva']);
Route::get('allUser',[UserController::class, 'getUser']);
Route::post('actMarca/{id}',[MarcaController::class, 'update']);

// api de comparativas
Route::post('gimpresora',[ComparativoController::class,'guardarImpresora']);
Route::post('glaptop',[ComparativoController::class,'guardarLaptop']);
Route::post('gmonitor',[ComparativoController::class,'guardarMonitor']);
Route::post('gpantalla',[ComparativoController::class,'guardarPantalla']);
Route::post('gpc',[ComparativoController::class,'guardarPc']);
Route::post('gproyector',[ComparativoController::class,'guardarProyector']);
Route::post('gscanner',[ComparativoController::class,'guardarScanner']);
Route::get('compscanners',[ComparativoController::class,'busqscanners']);
Route::get('compimpresoras',[ComparativoController::class,'busqimpresoras']);
Route::get('complaptops',[ComparativoController::class,'busqlaptops']);
Route::get('compmonitores',[ComparativoController::class,'busqmonitores']);
Route::get('comppantallas',[ComparativoController::class,'busqpantallas']);
Route::get('comppcs',[ComparativoController::class,'busqpcs']);
Route::get('compproyectores',[ComparativoController::class,'busqproyectores']);
Route::get('limpresora',[ImpresoraController::class,'index']);
Route::get('llaptop',[LaptopController::class,'index']);
Route::get('lmonitor',[MonitorController::class,'index']);
Route::get('lpantalla',[PantallaController::class,'index']);
Route::get('lpcs',[PcController::class,'index']);
Route::get('lproyector',[ProyectorController::class,'index']);
Route::get('lscanner',[ScannerController::class,'index']);
Route::get('viewcomparativos',[ComparativoController::class,'index']);

// api de páginas
Route::post('gweb',[PaginaWebController::class,'guardar']);
Route::post('lweb',[PaginaWebController::class,'links']);

//CT
Route::get('ctonline',[CtController::class, 'index']);

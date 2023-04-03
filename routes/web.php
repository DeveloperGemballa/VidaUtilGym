<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\MensalidadeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource("/",ProdutosController::class);
Route::resource("admin",ClientesController::class);
Route::get('admin/buscar',[ClienteController::class,'buscar']);

Route::resource("produto",ProdutosController::class);
Route::get('/academia',[ProdutosController::class,'academia']);

Route::resource("mensalidade",MensalidadeController::class);
Route::put('mensalidade/{mensalidade}/pagar',[MensalidadeController::class,'pagar'])->name('mensalidade.pagar');


Auth::routes();

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

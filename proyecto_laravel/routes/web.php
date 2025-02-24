<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupermercadoController;
use App\Http\Controllers\ProductoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Solo los admin pueden acceder a Supermercados
    Route::resource('supermercados', SupermercadoController::class)->middleware('admin');
    Route::resource('productos', ProductoController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

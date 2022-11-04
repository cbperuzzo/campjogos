<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TimesController;
use App\Http\Controllers\CampeonatosController;
use App\Http\Controllers\HomeController;

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

Route::resource('campeonatos',CampeonatosController::class);
Route::get('campeonatos/buscar/ns', [CampeonatosController::class, 'buscar']);

Route::resource('times',TimesController::class);
Route::get('times/buscar/ns', [TimesController::class, 'buscar']);


Auth::routes();

Route::get('', [HomeController::class, 'index'])->name('home');
Route::get('home', [HomeController::class, 'index'])->name('home');

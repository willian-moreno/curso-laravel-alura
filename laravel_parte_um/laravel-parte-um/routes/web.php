<?php

use Illuminate\Support\Facades\Route;

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
#use App\Http\Controllers\HelloWorldController;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\SeriesController;

#Route::get('/', [HelloWorldController::class, 'helloWorld']);

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/series', [SeriesController::class, 'index'])->name('listar_series');
Route::get('/series/create', [SeriesController::class, 'create'])->name('criar_serie_get');
Route::post('/series/create', [SeriesController::class, 'store'])->name('criar_serie_post');
Route::post('/series/update/{id}', [SeriesController::class, 'update'])->name('atualizar_serie_post');
Route::put('/series/update/{id}', [SeriesController::class, 'updated'])->name('atualizar_serie_put');
Route::delete('/series/{id}', [SeriesController::class, 'delete'])->name('deletar_serie');

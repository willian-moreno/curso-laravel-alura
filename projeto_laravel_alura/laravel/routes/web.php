<?php

use App\Http\Controllers\EpisodiosController;
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
use App\Http\Controllers\TemporadasController;

#Route::get('/', [HelloWorldController::class, 'helloWorld']);

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/series', [SeriesController::class, 'index'])->name('listar_series');

Route::get('/series/create', [SeriesController::class, 'create'])->name('criar_serie_get');
Route::post('/series/create', [SeriesController::class, 'store'])->name('criar_serie_post');

Route::post('/series/update/{id}', [SeriesController::class, 'update'])->name('atualizar_serie_post');
Route::put('/series/update/{id}', [SeriesController::class, 'updated'])->name('atualizar_serie_put');

Route::delete('/series/{id}', [SeriesController::class, 'delete'])->name('deletar_serie');

Route::get('/series/{id}/temporadas', [TemporadasController::class, 'index'])->name('temporadas_get');

Route::get('/series/{id_serie}/temporadas/{id_temporada}/episodios', [EpisodiosController::class, 'index'])->name('episodios_get');

Route::post('/series/{id_serie}/temporadas/{id_temporada}/episodios/update/status', [EpisodiosController::class, 'updateStatus'])->name('episodios_status_put');

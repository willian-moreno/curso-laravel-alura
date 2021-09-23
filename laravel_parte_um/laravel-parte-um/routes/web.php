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

Route::get('/', [IndexController::class, 'index']);
Route::get('/series', [SeriesController::class, 'index']);
Route::get('/series/create', [SeriesController::class, 'create']);

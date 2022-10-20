<?php

use App\Http\Controllers\DrawingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
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

//Route::get('/', [WelcomeController::class, 'show']);

//Route::get('/home', [HomeController::class, 'show']);

Auth::routes();
//
//Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
//
//Route::get('/drawings', [App\Http\Controllers\HomeController::class, 'drawings'])->name('drawings');

//Route::get('/drawings', [App\Http\Controllers\DrawingsController::class, 'show'])->name('drawings');
//
//Route::get('/drawing/{id}', [App\Http\Controllers\DrawingController::class, 'show'])->name('drawing');
//
//Route::get('/index', [App\Http\Controllers\IndexController::class, 'show'])->name('index');
//
//Route::get('/account', [\App\Http\Controllers\UserController::class, 'show'])->name('account');

Route::resource('user', UserController::class)->middleware('auth');

Route::resource('drawing', DrawingController::class)->middleware('auth');

Route::post('drawing/search', [DrawingController::class, 'search'])->name('drawing.search');
Route::post('drawing/filter', [DrawingController::class, 'filter'])->name('drawing.filter');
Route::post('drawing/counter', [DrawingController::class, 'counter'])->name('drawing.counter');
Route::post('drawing/{drawing}/active', [DrawingController::class, 'active'])->name('drawing.active');
Route::get('/', [DrawingController::class, 'home'])->name('drawing.home');



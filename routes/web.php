<?php

use App\Http\Controllers\DrawingController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::resource('user', UserController::class)->middleware('auth');

Route::resource('drawing', DrawingController::class)->middleware('auth');

Route::post('drawing/search', [DrawingController::class, 'search'])->name('drawing.search');
Route::post('drawing/filter', [DrawingController::class, 'filter'])->name('drawing.filter');
Route::post('drawing/counter', [DrawingController::class, 'counter'])->name('drawing.counter');
Route::post('drawing/{drawing}/active', [DrawingController::class, 'active'])->name('drawing.active');
Route::get('drawing/{drawing}/createCategory', [DrawingController::class, 'createCategory'])->name('drawing.createCategory');
Route::post('drawing/storeCategory', [DrawingController::class, 'storeCategory'])->name('drawing.storeCategory');
Route::get('/', [DrawingController::class, 'home'])->name('drawing.home');



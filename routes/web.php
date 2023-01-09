<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;

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

Route::GET('/', [IndexController::class, 'index']);

Route::GET('/hello', [IndexController::class, 'show']);

// Route::GET('/listing', [IndexController::class, 'index']);

// Route::GET('/listing/{$listing}', [IndexController::class, 'show']);

// Route::POST('/listing/create', [IndexController::class, 'create']);

// Route::POST('/listing', [IndexController::class, 'store']);

Route::resource('listing', ListingController::class )->only(['index', 'show', 'create', 'store']);

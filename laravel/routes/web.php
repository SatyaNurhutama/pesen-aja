<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CartController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/detail/{id}', [HomeController::class, 'detail']);

Route::get('/search', [HomeController::class, 'search']);

Route::post('/addcart/{id}', [DetailController::class, 'addcart']);

Route::get('/cart', [CartController::class, 'cart']);

Route::get('/deletecart/{id}', [CartController::class, 'deletecart']);

Route::post('/order', [CartController::class, 'confirmorder']);

//admin

Route::post('/uploadmenu', [AdminController::class, 'uploadmenu']);

Route::get('/menu', [AdminController::class, 'showmenu']);

Route::get('/deletemenu/{id}', [AdminController::class, 'deletemenu']);

Route::post('/editmenu/{id}', [AdminController::class, 'editmenu']);

Route::get('/search-menu', [AdminController::class, 'search']);

Route::get('/deleteorder/{id}', [AdminController::class, 'deleteorder']);

Route::get('/pesanan', [AdminController::class, 'pesanan']);

Route::get('/updatestatus/{id}', [AdminController::class, 'updatestatus']);

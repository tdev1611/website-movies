<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\WelcomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/xem-phim', [WatchController::class, 'index'])->name('home');
Route::get('/danh-muc', [CategoryController::class, 'index'])->name('home');
Route::get('/chi-tiet', [DetailController::class, 'index'])->name('home');
Route::get('/xem-phim', [WatchController::class, 'index'])->name('home');


Auth::routes();

// admin
Route::group(['prefix' => 'admin','middleware' => ['auth',]], function () {
         include 'admin.php';
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
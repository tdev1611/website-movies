<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\WelcomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/




Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/danh-muc/{slug}', [MenuController::class, 'category'])->name('category');
Route::get('/quoc-gia/{slug}', [MenuController::class, 'country'])->name('country');
Route::get('/the-loai/{slug}', [MenuController::class, 'genre'])->name('genre');




Route::get('/xem-phim/{slug}', [WatchController::class, 'watch'])->name('watch');
Route::get('/chi-tiet/{slug}', [DetailController::class, 'detail'])->name('detail');



Auth::routes();

// admin
Route::group(['prefix' => 'admin','middleware' => ['auth',]], function () {
         include 'admin.php';
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
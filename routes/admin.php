<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\CountryController;


// users-profile 
Route::group(['namespace' => 'Admin'], function () {
    Route::get('profile',[ProfileController::class,'index'])->name('admin.profile');
});

//dashboard controller
Route::group(['namespace' => 'Admin'], function () {
    Route::get('/',[DashboardController::class,'Dashboard'])->name('admin.home');
});


Route::group([''],function () {
    Route::resource('categories', CategoryController::class,['as'=>'admin']);
    Route::resource('episodes', EpisodeController::class,['as'=>'admin']);
    Route::resource('genres', GenreController::class,['as'=>'admin']);
    Route::resource('movies', MovieController::class,['as'=>'admin']);
    Route::resource('countries', CountryController::class,['as'=>'admin']);

});



?>
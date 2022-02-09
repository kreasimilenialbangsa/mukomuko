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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/view/home', function () {
    return view('pages.home');
});


Auth::routes();

/** Admin Area Start*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Service
    Route::resource('programs', App\Http\Controllers\Admin\ProgramController::class, ["as" => 'admin']);
    Route::resource('ziswafs', App\Http\Controllers\Admin\ZiswafController::class, ["as" => 'admin']);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class, ["as" => 'admin']);

    // Content
    Route::resource('banners', App\Http\Controllers\Admin\BannerController::class, ["as" => 'admin']);
    Route::resource('news', App\Http\Controllers\Admin\NewsController::class, ["as" => 'admin']);
    Route::resource('abouts', App\Http\Controllers\Admin\AboutController::class, ["as" => 'admin']);
    Route::resource('galleries', App\Http\Controllers\Admin\GalleryController::class, ["as" => 'admin']);
    
    // Master Data
    Route::group(['prefix' => 'category'], function () {
        Route::resource('news', App\Http\Controllers\Admin\NewsCategoryController::class, ["as" => 'admin.category']);
        Route::resource('program', App\Http\Controllers\Admin\ProgramCategoryController::class, ["as" => 'admin.category']);
        Route::resource('ziswaf', App\Http\Controllers\Admin\ZiswafCategoryController::class, ["as" => 'admin.category']);
    });

    Route::resource('users', App\Http\Controllers\Admin\UserController::class, ["as" => 'admin']);
});
/** Admin Area End*/

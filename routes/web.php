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

// Home
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ziswaf
Route::get('/ziswaf', [\App\Http\Controllers\ZiswafContoller::class, 'index'])->name('ziswaf.index');

// Program
Route::get('/program', [\App\Http\Controllers\ProgramContoller::class, 'index'])->name('program.index');
Route::get('/program/{slug}', [\App\Http\Controllers\ProgramContoller::class, 'detail'])->name('program.detail');

// News
Route::get('/berita', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [\App\Http\Controllers\NewsController::class, 'detail'])->name('news.detail');

// Donatur
Route::get('/donatur', [\App\Http\Controllers\DonaturController::class, 'index'])->name('donatur.index');

// Gallery
Route::get('/galeri', [\App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');

// Service
Route::get('/layanan/{slug}', [\App\Http\Controllers\ServiceContoller::class, 'index'])->name('service.index');

// About
Route::get('/tentang/{slug}', [\App\Http\Controllers\AboutContoller::class, 'index'])->name('about.index');

// Galery
Route::get('/galeri', [\App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

/** Admin Area Start*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:SuperAdmin|Kabupaten']], function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Service
    Route::resource('programs', App\Http\Controllers\Admin\ProgramController::class, ["as" => 'admin']);
    Route::resource('ziswafs', App\Http\Controllers\Admin\ZiswafController::class, ["as" => 'admin']);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class, ["as" => 'admin']);
    Route::group(['prefix' => 'donatur'], function () {
        // Route::resource('program', App\Http\Controllers\Admin\ProgramDonateController::class, ["as" => 'admin.donatur']);
        Route::get('program', [App\Http\Controllers\Admin\ProgramDonateController::class, 'index'])->name('admin.donatur.program.index');
        Route::get('program/{id}/create', [App\Http\Controllers\Admin\ProgramDonateController::class, 'create'])->name('admin.donatur.program.create');
        Route::post('program/{id}/create', [App\Http\Controllers\Admin\ProgramDonateController::class, 'store'])->name('admin.donatur.program.store');
        Route::delete('program/{id}', [App\Http\Controllers\Admin\ProgramDonateController::class, 'destroy'])->name('admin.donatur.program.destroy');
        Route::get('program/{id}/list', [App\Http\Controllers\Admin\ProgramDonateController::class, 'show'])->name('admin.donatur.program.list');

        // Route::resource('ziswaf', App\Http\Controllers\Admin\ZiswafDonateController::class, ["as" => 'admin.donatur']);
        Route::get('ziswaf', [App\Http\Controllers\Admin\ZiswafDonateController::class, 'index'])->name('admin.donatur.ziswaf.index');
        Route::get('ziswaf/{id}/create', [App\Http\Controllers\Admin\ZiswafDonateController::class, 'create'])->name('admin.donatur.ziswaf.create');
        Route::post('ziswaf/{id}/create', [App\Http\Controllers\Admin\ZiswafDonateController::class, 'storage'])->name('admin.donatur.ziswaf.storage');
        Route::get('ziswaf/{id}/list', [App\Http\Controllers\Admin\ZiswafDonateController::class, 'show'])->name('admin.donatur.ziswaf.list');
    });

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
    
    // Location
    Route::group(['prefix' => 'location'], function () {
        Route::resource('kecamatan', App\Http\Controllers\Admin\KecamatanController::class, ["as" => 'admin.location']);
        Route::resource('desa', App\Http\Controllers\Admin\DesaController::class, ["as" => 'admin.location']);
    });    

    // User
    Route::resource('users', App\Http\Controllers\UserController::class, ["as" => 'admin']);
});
/** Admin Area End*/


Route::group(['prefix' => 'admin'], function () {
    Route::resource('donates', App\Http\Controllers\Admin\DonateController::class, ["as" => 'admin']);
});

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

Route::get('/view/ziswaf', function () {
    return view('pages.ziswaf');
});

Route::get('/view/tentang/sekilas-nu', function () {
    return view('pages.about');
});

Route::get('/view/tentang/visi-misi', function () {
    return view('pages.visi-misi');
});

Route::get('/view/tentang/pengurus', function () {
    return view('pages.management');
});

Route::get('/view/layanan/daftar-rekening', function () {
    return view('pages.list-rek');
});

Route::get('/view/donatur', function () {
    return view('pages.donatur');
});

Route::get('/view/layanan/go-ziswaf', function () {
    return view('pages.go-ziswaf');
});

Route::get('/view/berita', function () {
    return view('pages.news');
});

Route::get('/view/program', function () {
    return view('pages.program');
});

Auth::routes();

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

    Route::resource('users', App\Http\Controllers\UserController::class, ["as" => 'admin']);
});
/** Admin Area End*/

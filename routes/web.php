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

// Login
Route::post('/login-user', [\App\Http\Controllers\LoginController::class, 'login'])->name('login-user');
Route::post('/register-user', [\App\Http\Controllers\LoginController::class, 'register'])->name('register-user');

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

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    // Profile
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('user.profile');
    Route::post('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('user.update');
    Route::get('/profile/history-transaction', [\App\Http\Controllers\ProfileController::class, 'history'])->name('user.history');
    Route::get('/profile/inbox', [\App\Http\Controllers\ProfileController::class, 'inbox'])->name('user.inbox');
    Route::get('/profile/notification', [\App\Http\Controllers\ProfileController::class, 'notification'])->name('user.notification');
});

// Payment
Route::get('/payment', [\App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
Route::get('/payment/detail', [\App\Http\Controllers\PaymentController::class, 'detail'])->name('payment.detail');

// Galery
Route::get('/galeri', [\App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

/** Admin Area Start*/
Route::group(['prefix' => 'admin', 'middleware' => ['is_member']], function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Role Kabupaten
    Route::group(['middleware' => ['role:SuperAdmin|Kabupaten']], function() {
        // Service
        Route::resource('programs', App\Http\Controllers\Admin\ProgramController::class, ["as" => 'admin']);
        Route::resource('ziswafs', App\Http\Controllers\Admin\ZiswafController::class, ["as" => 'admin']);
        Route::group(['prefix' => 'report'], function () {
            Route::get('laporan-keuangan', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('admin.report.keuangan.index');
            Route::resource('incomes', App\Http\Controllers\Admin\IncomeController::class, ["as" => 'admin.report']);
        });

        // Content
        Route::resource('banners', App\Http\Controllers\Admin\BannerController::class, ["as" => 'admin']);
        Route::resource('news', App\Http\Controllers\Admin\NewsController::class, ["as" => 'admin']);
        Route::resource('abouts', App\Http\Controllers\Admin\AboutController::class, ["as" => 'admin']);
        Route::resource('galleries', App\Http\Controllers\Admin\GalleryController::class, ["as" => 'admin']);
        Route::resource('services', App\Http\Controllers\Admin\ServiceController::class, ["as" => 'admin']);
    });

    // Role Kecamatan
    Route::group(['middleware' => ['role:SuperAdmin|Kecamatan']], function() {
        // Approval
        Route::group(['prefix' => 'approval'], function () {
            Route::get('program', [App\Http\Controllers\Admin\ApprovalController::class, 'program_index'])->name('admin.approval.program.index');
            Route::get('ziswaf', [App\Http\Controllers\Admin\ApprovalController::class, 'ziswaf_index'])->name('admin.approval.ziswaf.index');
            Route::patch('update/{id}', [App\Http\Controllers\Admin\ApprovalController::class, 'approve'])->name('admin.approval.update');
        });
    });

    // Role Desa
    Route::group(['middleware' => ['role:SuperAdmin|Desa']], function() {
        Route::group(['prefix' => 'donatur'], function () {
            Route::get('program', [App\Http\Controllers\Admin\ProgramDonateController::class, 'index'])->name('admin.donatur.program.index');
            Route::get('program/{id}/create', [App\Http\Controllers\Admin\ProgramDonateController::class, 'create'])->name('admin.donatur.program.create');
            Route::post('program/{id}/create', [App\Http\Controllers\Admin\ProgramDonateController::class, 'store'])->name('admin.donatur.program.store');
            Route::delete('program/{type}/list/{id}', [App\Http\Controllers\Admin\ProgramDonateController::class, 'destroy'])->name('admin.donatur.program.destroy');
            Route::get('program/{id}/list', [App\Http\Controllers\Admin\ProgramDonateController::class, 'show'])->name('admin.donatur.program.list');
            
            Route::get('ziswaf', [App\Http\Controllers\Admin\ZiswafDonateController::class, 'index'])->name('admin.donatur.ziswaf.index');
            Route::get('ziswaf/{id}/create', [App\Http\Controllers\Admin\ZiswafDonateController::class, 'create'])->name('admin.donatur.ziswaf.create');
            Route::post('ziswaf/{id}/create', [App\Http\Controllers\Admin\ZiswafDonateController::class, 'store'])->name('admin.donatur.ziswaf.store');
            Route::delete('ziswaf/{type}/list/{id}', [App\Http\Controllers\Admin\ZiswafDonateController::class, 'destroy'])->name('admin.donatur.ziswaf.destroy');
            Route::get('ziswaf/{id}/list', [App\Http\Controllers\Admin\ZiswafDonateController::class, 'show'])->name('admin.donatur.ziswaf.list');
        });
    });
    
    // Role SuperAdmin
    Route::group(['middleware' => ['role:SuperAdmin']], function() {
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

        // Toggle Update
        Route::post('program/toggle/active', [App\Http\Controllers\Admin\ProgramController::class, 'toggleActive'])->name('admin.program.toggle_active');
        Route::post('program/toggle/urgent', [App\Http\Controllers\Admin\ProgramController::class, 'toggleUrgent'])->name('admin.program.toggle_urgent');
        Route::post('banner/toggle/urgent', [App\Http\Controllers\Admin\BannerController::class, 'toggleActive'])->name('admin.banner.toggle_active');
        Route::post('news/toggle/active', [App\Http\Controllers\Admin\NewsController::class, 'toggleActive'])->name('admin.news.toggle_active');
        Route::post('news/toggle/hightlight', [App\Http\Controllers\Admin\NewsController::class, 'toggleHighlight'])->name('admin.news.toggle_highlight');
        Route::post('gallery/toggle/active', [App\Http\Controllers\Admin\GalleryController::class, 'toggleActive'])->name('admin.gallery.toggle_active');
        Route::post('service/toggle/active', [App\Http\Controllers\Admin\ServiceController::class, 'toggleActive'])->name('admin.service.toggle_active');
        Route::post('about/toggle/active', [App\Http\Controllers\Admin\AboutController::class, 'toggleActive'])->name('admin.about.toggle_active');
        Route::post('user/toggle/active', [App\Http\Controllers\UserController::class, 'toggleActive'])->name('admin.user.toggle_active');
        Route::post('kecamatan/toggle/active', [App\Http\Controllers\Admin\KecamatanController::class, 'toggleActive'])->name('admin.kecamatan.toggle_active');
        Route::post('desa/toggle/active', [App\Http\Controllers\Admin\DesaController::class, 'toggleActive'])->name('admin.desa.toggle_active');
    });

});
/** Admin Area End*/

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

Route::get('/forgot-password', [\App\Http\Controllers\LoginController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [\App\Http\Controllers\LoginController::class, 'postForgotPassword'])->name('forgot-password.send');

// Reset Password
Route::get('/reset-password/{token}', [\App\Http\Controllers\LoginController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password/{token}', [\App\Http\Controllers\LoginController::class, 'postResetPassword'])->name('reset-password.update');

// Register
Route::get('/daftar/{type}', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register.index');
Route::post('/daftar/store', [\App\Http\Controllers\RegisterController::class, 'store'])->name('register.store');

// Home
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ziswaf
Route::get('/ziswaf', [\App\Http\Controllers\ZiswafContoller::class, 'index'])->name('ziswaf.index');
Route::post('/ziswaf/payment', [\App\Http\Controllers\ZiswafContoller::class, 'payment'])->name('ziswaf.payment');

// Program
Route::get('/program', [\App\Http\Controllers\ProgramContoller::class, 'index'])->name('program.index');
Route::get('/program/{slug}', [\App\Http\Controllers\ProgramContoller::class, 'detail'])->name('program.detail');
Route::post('/program/payment', [\App\Http\Controllers\ProgramContoller::class, 'payment'])->name('program.payment');

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
Route::get('/privacy-policy', [\App\Http\Controllers\AboutContoller::class, 'privacyPolicy'])->name('privacy-policy.index');

// Member info
Route::get('/anggota/{id}', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');


Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    // Profile
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('user.profile');
    Route::post('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('user.update');
    Route::get('/change-password', [\App\Http\Controllers\ProfileController::class, 'changePassword'])->name('user.changePassword');
    Route::post('/change-password', [\App\Http\Controllers\ProfileController::class, 'processChangePassword'])->name('user.changePassword.process');
    Route::get('/profile/history-transaction', [\App\Http\Controllers\ProfileController::class, 'history'])->name('user.history');
    Route::get('/profile/inbox', [\App\Http\Controllers\ProfileController::class, 'inbox'])->name('user.inbox');
    Route::get('/profile/notification', [\App\Http\Controllers\ProfileController::class, 'notification'])->name('user.notification');
});

// Payment
Route::get('/payment', [\App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
Route::post('/payment', [\App\Http\Controllers\PaymentController::class, 'process_payment'])->name('payment.process');
Route::get('/payment/callback', [\App\Http\Controllers\PaymentController::class, 'callback_payment'])->name('payment.callback');
Route::get('/payment/{order_id}', [\App\Http\Controllers\PaymentController::class, 'detail'])->name('payment.detail');

// Galery
Route::get('/galeri', [\App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

/** Admin Area Start*/
Route::group(['prefix' => 'admin', 'middleware' => ['is_member', 'auth']], function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    // Profile
    Route::get('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profile');
    Route::post('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profile.update');
    
    // Role Kabupaten
    Route::group(['middleware' => ['role:SuperAdmin|Kabupaten']], function() {
        // Service
        Route::resource('programs', App\Http\Controllers\Admin\ProgramController::class, ["as" => 'admin']);
        Route::resource('ziswafs', App\Http\Controllers\Admin\ZiswafController::class, ["as" => 'admin']);
        Route::group(['prefix' => 'report'], function () {
            Route::get('perolehan-kaleng-nu', [App\Http\Controllers\Admin\ReportController::class, 'financialReport'])->name('admin.report.keuangan.index');
            Route::get('laporan-tahunan', [App\Http\Controllers\Admin\ReportController::class, 'annualReport'])->name('admin.report.annual.index');
            Route::get('laporan-tahunan/{date}', [App\Http\Controllers\Admin\ReportController::class, 'annualReportShow'])->name('admin.report.annual.show');
            Route::resource('incomes', App\Http\Controllers\Admin\IncomeController::class, ["as" => 'admin.report']);
            
            Route::group(['prefix' => 'export'], function () {
                Route::get('kaleng-nu', [App\Http\Controllers\Admin\ReportController::class, 'exportKalengNu'])->name('admin.report.keuangan.export');
                Route::get('laporan-tahunan', [App\Http\Controllers\Admin\ReportController::class, 'exportLaporanTahunan'])->name('admin.report.annual.export');
            });
        });
        
        // Outcome
        Route::resource('outcomes', App\Http\Controllers\Admin\OutcomeController::class, ["as" => 'admin']);
        
        // Content
        Route::resource('banners', App\Http\Controllers\Admin\BannerController::class, ["as" => 'admin']);
        Route::resource('news', App\Http\Controllers\Admin\NewsController::class, ["as" => 'admin']);
        Route::resource('abouts', App\Http\Controllers\Admin\AboutController::class, ["as" => 'admin']);
        Route::resource('galleries', App\Http\Controllers\Admin\GalleryController::class, ["as" => 'admin']);
        Route::resource('services', App\Http\Controllers\Admin\ServiceController::class, ["as" => 'admin']);
        Route::get('informations', [App\Http\Controllers\Admin\InformationController::class, 'index'])->name('admin.informations.index');
        Route::post('informations', [App\Http\Controllers\Admin\InformationController::class, 'store'])->name('admin.informations.store');
    });

    // Role Kecamatan
    Route::group(['middleware' => ['role:SuperAdmin|Kecamatan|Kabupaten']], function() {
        // Approval
        Route::group(['prefix' => 'approval'], function () {
            Route::group(['middleware' => ['role:SuperAdmin|Kecamatan']], function() {
                Route::get('program', [App\Http\Controllers\Admin\ApprovalController::class, 'program_index'])->name('admin.approval.program.index');
                Route::get('ziswaf', [App\Http\Controllers\Admin\ApprovalController::class, 'ziswaf_index'])->name('admin.approval.ziswaf.index');
                Route::patch('update/{type}/{id}', [App\Http\Controllers\Admin\ApprovalController::class, 'update'])->name('admin.approval.update');
                Route::delete('delete/{type}/{id}', [App\Http\Controllers\Admin\ApprovalController::class, 'destroy'])->name('admin.approval.destroy');
            });
            Route::group(['middleware' => ['role:SuperAdmin|Kabupaten']], function() {
                Route::get('ambulan', [App\Http\Controllers\Admin\ApprovalController::class, 'ambulan_index'])->name('admin.approval.ambulan.index');
                Route::patch('ambulan/{id}', [App\Http\Controllers\Admin\ApprovalController::class, 'approve_ambulan'])->name('admin.approval.ambulan.update');
                Route::get('dana', [App\Http\Controllers\Admin\ApprovalController::class, 'dana_index'])->name('admin.approval.dana.index');
                Route::get('dana/{id}/edit', [App\Http\Controllers\Admin\ApprovalController::class, 'dana_edit'])->name('admin.approval.dana.edit');
                Route::patch('dana/{id}', [App\Http\Controllers\Admin\ApprovalController::class, 'approve_dana'])->name('admin.approval.dana.update');
            });
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
    Route::group(['middleware' => ['role:SuperAdmin|Kecamatan|Desa']], function() {
        Route::group(['prefix' => 'permohonan'], function () {
            Route::resource('ambulan', App\Http\Controllers\Admin\SupportAmbulanceController::class, ["as" => 'admin.service']);
            Route::resource('dana', App\Http\Controllers\Admin\SupportServiceController::class, ["as" => 'admin.service']);
        });
    });
    
    // Role SuperAdmin
    Route::group(['middleware' => ['role:SuperAdmin']], function() {
        // Master Data
        Route::group(['prefix' => 'category'], function () {
            Route::resource('news', App\Http\Controllers\Admin\NewsCategoryController::class, ["as" => 'admin.category']);
            Route::resource('program', App\Http\Controllers\Admin\ProgramCategoryController::class, ["as" => 'admin.category']);
            Route::resource('ziswaf', App\Http\Controllers\Admin\ZiswafCategoryController::class, ["as" => 'admin.category']);
            Route::resource('bantuan', App\Http\Controllers\Admin\SupportServiceCategoryController::class, ["as" => 'admin.category']);
            Route::resource('outcome', App\Http\Controllers\Admin\OutcomeCategoryController::class, ["as" => 'admin.category']);
        });
        
        // Location
        Route::group(['prefix' => 'location'], function () {
            Route::resource('kecamatan', App\Http\Controllers\Admin\KecamatanController::class, ["as" => 'admin.location']);
            Route::resource('desa', App\Http\Controllers\Admin\DesaController::class, ["as" => 'admin.location']);
        });    

        // User
        Route::group(['prefix' => 'account'], function () {
            Route::resource('members', App\Http\Controllers\UserController::class, ["as" => 'admin.account']);
            Route::resource('users', App\Http\Controllers\UserController::class, ["as" => 'admin.account']);
            Route::post('qrcode', [App\Http\Controllers\UserController::class, 'qrCode'])->name('admin.account.qrcode');
        });

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

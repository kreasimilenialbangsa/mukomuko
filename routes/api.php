<?php

use App\Http\Controllers\API\V1\CallbackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {

    // Callback
    Route::group(['prefix' => 'callback'], function () {
        Route::post('midtrans', [CallbackController::class, 'midtransCallback']);

        Route::post('xenditVA', [CallbackController::class, 'xenditVA']);
        Route::get('xenditFVA', [CallbackController::class, 'xenditFVA']);
        Route::post('xenditCallback', [CallbackController::class, 'xenditCallback']);
    });

    // Auth
    Route::post('login', [App\Http\Controllers\API\V1\AuthController::class, 'login']);
    Route::post('register', [App\Http\Controllers\API\V1\AuthController::class, 'register']);
    Route::post('forgot-password', [App\Http\Controllers\API\V1\AuthController::class, 'forgotPassword']);

    // Information
    Route::get('info/total', [App\Http\Controllers\API\V1\InformationController::class, 'total']);
    Route::get('info/goziswaf', [App\Http\Controllers\API\V1\InformationController::class, 'totalGoZiswaf'])->middleware('auth:sanctum');
    Route::get('info/scanqr/{user_id}', [App\Http\Controllers\API\V1\InformationController::class, 'scanQR'])->middleware('auth:sanctum');


    // News
    Route::get('news', [App\Http\Controllers\API\V1\NewsController::class, 'all']);
    Route::get('news/detail/{id}', [App\Http\Controllers\API\V1\NewsController::class, 'detail']);
    Route::get('news/category', [App\Http\Controllers\API\V1\NewsController::class, 'category']);

    // Program
    Route::get('programs', [App\Http\Controllers\API\V1\ProgramController::class, 'all']);
    Route::get('programs/detail/{id}', [App\Http\Controllers\API\V1\ProgramController::class, 'detail']);

    Route::get('programs/category', [App\Http\Controllers\API\V1\ProgramController::class, 'category']);
    Route::get('programs/news/{program_id}', [App\Http\Controllers\API\V1\ProgramController::class, 'latestNews']);

    // Ziswaf
    Route::get('ziswaf', [App\Http\Controllers\API\V1\ZiswafController::class, 'all']);
    Route::get('ziswaf/detail/{id}', [App\Http\Controllers\API\V1\ZiswafController::class, 'detail']);

    // Donate
    Route::get('donates', [App\Http\Controllers\API\V1\DonateController::class, 'all']);
    Route::get('donates/detail/{id}', [App\Http\Controllers\API\V1\DonateController::class, 'detailById']);
    Route::get('donates/order/{order_id}', [App\Http\Controllers\API\V1\DonateController::class, 'getDonateDetail']);

    Route::get('donates/programs', [App\Http\Controllers\API\V1\DonateController::class, 'allPrograms']);
    Route::get('donates/programs/{id}', [App\Http\Controllers\API\V1\DonateController::class, 'detailByProgram']);

    Route::get('donates/ziswaf', [App\Http\Controllers\API\V1\DonateController::class, 'allZiswaf']);
    Route::get('donates/ziswaf/{id}', [App\Http\Controllers\API\V1\DonateController::class, 'detailByZiswaf']);
    Route::get('donates/ziswaf/{id}', [App\Http\Controllers\API\V1\DonateController::class, 'detailByZiswaf']);

    // Private Api
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('profile', [App\Http\Controllers\API\V1\ProfileController::class, 'profile']);
        Route::put('profile/update', [App\Http\Controllers\API\V1\ProfileController::class, 'update']);
        Route::post('change-password', [App\Http\Controllers\API\V1\AuthController::class, 'changePassword']);
        Route::post('logout', [App\Http\Controllers\API\V1\AuthController::class, 'logout']);
        
        Route::get('donates/bylogin/admin ', [App\Http\Controllers\API\V1\DonateController::class, 'getDonateByAdmin']);
        Route::get('donates/bylogin/user', [App\Http\Controllers\API\V1\DonateController::class, 'getDonateByUser']);
        Route::post('donates/jipzisnu', [App\Http\Controllers\API\V1\DonateController::class, 'donateJipzisnu']);
        Route::delete('donates/{id}', [App\Http\Controllers\API\V1\DonateController::class, 'destroy']);

        // Payment
        Route::post('payment-process', [App\Http\Controllers\API\V1\PaymentController::class, 'paymentProcess']);
    });
});

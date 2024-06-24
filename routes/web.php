<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CleansingDataController,
    KoperasiController,
    NaiveBayesRulesController,
    ResultDataController,
    TrainingDataController,
    UmkmController,
    UserControllers,
    NBCalculationController,
    UserController,
    LoginController,
    DashboardController
};
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

// Testing
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::post('ajax-request-umkm', [DashboardController::class, 'requestDataUmkmByYear'])->name('ajax.ts-umkm-byyear');
    Route::post('ajax-request-koperasi', [DashboardController::class, 'requestDataKoperasiByYear'])->name('ajax.ts-koperasi-byyear');

    Route::resource('cleansing_data', CleansingDataController::class);
    Route::resource('koperasi', KoperasiController::class);
    Route::resource('naive_bayes_rules', NaiveBayesRulesController::class);
    Route::resource('result_data', ResultDataController::class);
    Route::resource('training_data', TrainingDataController::class);
    Route::resource('umkm', UmkmController::class);
    Route::resource('users', UserController::class);

    Route::GET('/form_cleansing_data',[CleansingDataController::class,'formCleansingData']);
    Route::POST('/cleansing_the_data',[CleansingDataController::class,'createCleansingData']);
    Route::GET('/cleansing_result',[CleansingDataController::class,'cleansingResult']);
    Route::GET('/form_nb_calculation',[NBCalculationController::class,'formNBCalculation']);
    Route::POST('/nb_calculation',[NBCalculationController::class,'calculateNaiveBayes']);
    Route::GET('/convert_umkm_td',[TrainingDataController::class,'convertFromUMKMToTraining']);

});


Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login', [LoginController::class, 'post'])->name('login.post');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');
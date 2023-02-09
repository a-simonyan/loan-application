<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdviserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;

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
    return view('login');
})->name('login');

Route::post('/login',[AdviserController::class,'login'])->name('login.attempt');

Route::group(['middleware' => 'auth'],function () {

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/logout',[AdviserController::class,'logout'])->name('logout');
    Route::get('/report',[ReportController::class,'index'])->name('report');
    Route::get('/download',[ReportController::class,'download'])->name('download');

    Route::prefix('client')->name('client.')->group(function () {
        Route::get('/',[ClientController::class,'index'])->name('index');
        Route::get('/create',[ClientController::class,'create'])->name('create');
        Route::post('/store',[ClientController::class,'store'])->name('store');
        Route::get('/edit/{client}',[ClientController::class,'edit'])->name('edit');
        Route::put('/update/{client}',[ClientController::class,'update'])->name('update');
        Route::delete('/destroy/{client}',[ClientController::class,'destroy'])->name('destroy');

    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Pharmacist\StockController;

Route::get('/home', [HomeController::class, 'home']);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');


Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'edit'])->middleware('password.confirm')->name('account.edit');
    Route::post('/account', [AccountController::class, 'update'])->name('account.update');
});

Route::group(['prefix' => 'pharmacist', 'middleware' => 'role:pharmacist'], function () {
    Route::get('/', [StockController::class, 'index'])->name('pharmacist.index');
});


require __DIR__ . '/auth.php';

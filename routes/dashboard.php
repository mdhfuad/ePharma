<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\CartController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\SalesController;
use App\Http\Controllers\Dashboard\StockController;
use App\Http\Controllers\Dashboard\BranchController;
use App\Http\Controllers\Dashboard\DosageController;
use App\Http\Controllers\Dashboard\CompanyController;
use App\Http\Controllers\Dashboard\GenericController;
use App\Http\Controllers\Dashboard\MedicineController;

Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/medicine/search', [MedicineController::class, 'search'])->name('search');
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
Route::get('cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::resource('users', UserController::class);
Route::resource('branches', BranchController::class);
Route::resource('company', CompanyController::class);
Route::resource('generic', GenericController::class);
Route::resource('dosage', DosageController::class);
Route::resource('medicine', MedicineController::class);
Route::resource('stock', StockController::class);
Route::resource('sales', SalesController::class);

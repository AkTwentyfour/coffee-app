<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ComoditiesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// cashier
Route::get('/cashier', [CashierController::class, 'index'])->name('cashier')->middleware('auth');
Route::post('/cashier', [CashierController::class,'store'])->name('store');


// admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::post('/addItem', [AdminController::class, 'add']);
Route::post('/editItem', [AdminController::class, 'edit']);
Route::post('/deleteItem', [AdminController::class, 'delete']);
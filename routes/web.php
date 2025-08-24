<?php

use App\Models\Comodities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\CashierController;

use App\Http\Controllers\ComoditiesController;
use function PHPUnit\Framework\returnCallback;

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
Route::get('/cashier2', function() {
    $comodities = Comodities::all();
    
    return view("cashier/index2", [
        'comodities' => $comodities
    ]);
});
Route::get('/cashier', [CashierController::class, 'index'])->name('cashier')->middleware('auth');
Route::post('/cashier', [CashierController::class,'store'])->name('store');


// Manage Comodity
Route::get('/comodity', [ComoditiesController::class, 'index'])->name('comodity')->middleware('admin');
Route::post('/addItem', [ComoditiesController::class, 'add']);
Route::post('/editItem', [ComoditiesController::class, 'edit']);
Route::post('/deleteItem', [ComoditiesController::class, 'delete']);


// Manage Sales
Route::get('/sales', [SalesController::class, 'index'] )->name('sales')->middleware('admin');
Route::get('/sales-detail/{id}', [SalesController::class, 'detail'] )->name('sales-detail')->middleware('admin');


// test feature
// Route::get('/test', [SalesController::class, 'test']);
Route::post('/sales ', [SalesController::class, 'testFeature'])->name('testFeature');
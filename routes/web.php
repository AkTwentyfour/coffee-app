<?php

use App\Models\Comodities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\CashierController;

use App\Http\Controllers\ComoditiesController;
use App\Http\Controllers\ComodityCategoryController;

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

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// cashier
Route::middleware('auth', 'admin')->group(function () {
    // cashier
    Route::get('/cashier', [CashierController::class, 'index'])->name('cashier');
    Route::post('/cashier', [CashierController::class, 'store'])->name('store');

    // Manage Comodity
    Route::get('/comodity', [ComoditiesController::class, 'index'])->name('comodity');
    Route::post('/addItem', [ComoditiesController::class, 'add']);
    Route::post('/editItem', [ComoditiesController::class, 'edit']);
    Route::post('/deleteItem', [ComoditiesController::class, 'delete']);
    
    // manage comodity category
    Route::get('/manage-category', [ComodityCategoryController::class, 'index'])->name('category.index');
    Route::post('/add-comodity-category', [ComodityCategoryController::class, 'add'])->name('category.add');
    Route::post('/edit-comodity-category', [ComodityCategoryController::class, 'edit'])->name('category.edit');
    Route::post('/delete-comodity-category', [ComodityCategoryController::class, 'delete'])->name('category.delete');

    // Manage Sales
    Route::get('/sales', [SalesController::class, 'index'])->name('sales');
    Route::get('/sales-detail/{id}', [SalesController::class, 'detail'])->name('sales-detail');
    // print transaction
    Route::get('/sales/print/{id}', [SalesController::class, 'print'])->name('sales.print');


    // test feature
    Route::post('/sales/filter', function() {return('hello');})->name('filter');
});

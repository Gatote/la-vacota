<?php

use Illuminate\Support\Facades\Route;

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
    return view('Menu');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/Menu', function () {
    return view('Menu');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ClientController;
Route::resource('/Clients', ClientController::class);
Route::get('/Client/Create', [ClientController::class, 'Create']);
Route::delete('/Client/Delete/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('/Client/Show/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/Clients/Edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/Clients/{client}', [ClientController::class, 'update'])->name('clients.update');

use App\Http\Controllers\ProductController;
Route::resource('/Products', ProductController::class);
Route::get('/Product/Create', [ProductController::class, 'Create']);
Route::delete('/Product/Delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/Product/Show/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/Product/Edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/Product/{product}', [ProductController::class, 'update'])->name('products.update');

use App\Http\Controllers\SaleController;
Route::resource('/Sales', SaleController::class);
Route::get('/Sale/Create', [SaleController::class, 'Create']);

use App\Http\Controllers\Sale_ProductController;
Route::resource('/SaleProducts', Sale_ProductController::class);
Route::get('/SaleProduct/Create', [Sale_ProductController::class, 'Create']);
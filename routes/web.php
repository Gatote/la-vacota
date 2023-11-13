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
Route::resource('/clients', ClientController::class);
Route::get('/Client/Create', [ClientController::class, 'Create']);
Route::delete('/Client/Delete/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('/Client/Show/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/Clients/Edit/{id}', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/Clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::get('DownloadClients', [ClientController::class, 'pdf'])->name('Clients.pdf');

use App\Http\Controllers\ProductController;
Route::resource('/Products', ProductController::class);
Route::resource('products', ProductController::class);
Route::get('/Product/Create', [ProductController::class, 'Create']);
Route::delete('/Product/Delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/Product/Show/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/Product/Edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/Product/{product}', [ProductController::class, 'update'])->name('products.update');
Route::get('DownloadProducts', [ProductController::class, 'pdf'])->name('Products.pdf');

use App\Http\Controllers\SaleController;
Route::resource('/Sales', SaleController::class);
Route::resource('sales', SaleController::class);
Route::get('/Sale/Create', [SaleController::class, 'Create']);
Route::delete('/Sale/Delete/{sale}', [SaleController::class, 'destroy'])->name('sales.destroy');
Route::get('/Sale/Show/{sale}', [SaleController::class, 'show'])->name('sales.show');
Route::get('/Sale/Edit/{id}', [SaleController::class, 'edit'])->name('sales.edit');
Route::put('/Sale/{sale}', [SaleController::class, 'update'])->name('sales.update');
Route::get('DownloadSales', [SaleController::class, 'pdf'])->name('Sales.pdf');

use App\Http\Controllers\Sale_ProductController;
Route::resource('sale_products', Sale_ProductController::class);
Route::resource('/SaleProducts', Sale_ProductController::class);
Route::get('/SaleProduct/Create', [Sale_ProductController::class, 'Create']);
Route::get('/SaleProduct/Create', [Sale_ProductController::class, 'Create'])->name('sale_product.create');
Route::post('/SaleProducts', [Sale_ProductController::class, 'store'])->name('sale_products.store');
Route::get('/SaleProduct/Show/{saleproduct}', [Sale_ProductController::class, 'show'])->name('sale_products.show');
Route::get('/SaleProduct/Edit/{id}', [Sale_ProductController::class, 'edit'])->name('sale_products.edit');
Route::put('/SaleProduct/{sale}', [Sale_ProductController::class, 'update'])->name('sale_products.update');
Route::delete('/SaleProduct/Delete/{saleId}/{saleProductId}', [Sale_ProductController::class, 'destroy'])->name('sale_products.destroy');

use App\Http\Controllers\SearchController;
Route::get('search/clients', [SearchController::class, 'searchClients'])->name('search.clients');
Route::get('search/products', [SearchController::class, 'searchProducts'])->name('search.products');
Route::get('search/sales', [SearchController::class, 'searchSales'])->name('search.sales');


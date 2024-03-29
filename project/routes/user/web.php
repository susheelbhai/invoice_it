<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\InvoiceController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\BusinessController;
use App\Http\Controllers\User\CustomerController;

Route::get('/', function () {
    return view('user.pages.home.index');
})->name('home');


Route::middleware('auth_user')->group(function () {
    Route::get('/qr_scanner', [HomeController::class, 'qr_scanner'])->name('qr_scanner');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('/business', BusinessController::class)->except(['delete']);
    Route::resource('/customer', CustomerController::class)->except(['delete']);
    Route::resource('/product', ProductController::class)->except(['delete']);
    Route::get('/invoice/generate/{id}/{copy}', [InvoiceController::class, 'generate'])->name('invoice.generate');
    Route::resource('/invoice', InvoiceController::class)->except(['delete']);
    Route::get('/invoice_product/{id}/edit', [InvoiceController::class,'edit_invoice_product'])->name('invoice_product.edit');
    Route::patch('/invoice_product/{id}/update', [InvoiceController::class,'update_invoice_product'])->name('invoice_product.update');
});

require __DIR__ . '/auth.php';

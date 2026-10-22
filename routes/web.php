<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create');

Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store');

Route::get('/invoice/demo', [InvoiceController::class, 'download'])
    ->name('invoice.demo');

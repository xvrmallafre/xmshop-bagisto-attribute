<?php

use Illuminate\Support\Facades\Route;
use XMShop\Attribute\Http\Controllers\ProductController;

Route::get('admin/catalog/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.catalog.products.edit');
Route::put('admin/catalog/products/{id}', [ProductController::class, 'update'])->name('admin.catalog.products.update');
<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::controller(AdminController::class)
        ->group(function () {
            Route::get('/', 'index')->name('admin.index');
        });

    Route::prefix('product')
        ->controller(ProductController::class)
        ->group(function () {
            Route::get('/', 'index')->name('admin.product.index');
            Route::get('create/', 'create')->name('admin.product.create');
            Route::get('edit/{product}', 'edit')->name('admin.product.edit');
            Route::post('store/', 'store')->name('admin.product.store');
            Route::put('update/{product}', 'update')->name('admin.product.update');

        });

    Route::prefix('category')
        ->controller(CategoryController::class)
        ->group(function () {
            Route::get('/', 'index')->name('admin.category.index');
            Route::post('/store', 'store')->name('admin.category.store');
            Route::get('/delete/{category}', 'delete')->name('admin.category.delete');
        });

    Route::prefix('subcategory')
        ->controller(SubcategoryController::class)
        ->group(function () {
            Route::get('/', 'index')->name('admin.subcategory.index');
            Route::post('/store', 'store')->name('admin.subcategory.store');
            Route::get('/delete/{subcategory}', 'delete')->name('admin.subcategory.delete');
        });

    Route::prefix('color')
        ->controller(ColorController::class)
        ->group(function () {
            Route::get('/', 'index')->name('admin.color.index');
            Route::get('/create', 'create')->name('admin.color.create');
            Route::post('/store', 'store')->name('admin.color.store');
            Route::get('/delete/{color}', 'delete')->name('admin.color.delete');
        });
});

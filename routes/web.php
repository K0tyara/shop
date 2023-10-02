<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\ProductController as AdminProductController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\SubcategoryController as AdminSubcategoryController;
use \App\Http\Controllers\Admin\ColorController as AdminColorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index']);

Route::prefix('product')->controller(ProductController::class)
    ->group(function () {
        Route::get('/', 'index')->name('product.index');
        Route::get('/{product:slug}', 'show')->name('product.show');
    });

Route::prefix('admin')->group(function () {
    Route::controller(AdminController::class)
        ->group(function () {
            Route::get('/', 'index')->name('admin.index');
        });

    Route::prefix('product')
        ->controller(AdminProductController::class)
        ->group(function () {
            Route::get('/', 'index')->name('admin.product.index');
            Route::get('create/', 'create')->name('admin.product.create');
        });

    Route::prefix('category')
        ->controller(AdminCategoryController::class)
        ->group(function () {
            Route::get('/', 'index')->name('admin.category.index');
            Route::post('/store', 'store')->name('admin.category.store');
            Route::get('/delete/{category}', 'delete')->name('admin.category.delete');
        });

    Route::prefix('subcategory')
        ->controller(AdminSubcategoryController::class)
        ->group(function () {
            Route::get('/', 'index')->name('admin.subcategory.index');
            Route::post('/store', 'store')->name('admin.subcategory.store');
            Route::get('/delete/{subcategory}', 'delete')->name('admin.subcategory.delete');
        });
});

Route::prefix('color')
    ->controller(AdminColorController::class)
    ->group(function () {
        Route::get('/', 'index')->name('admin.color.index');
        Route::get('/create', 'create')->name('admin.color.create');
        Route::post('/store', 'store')->name('admin.color.store');
        Route::get('/delete/{color}', 'delete')->name('admin.color.delete');
    });


//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

//require __DIR__.'/auth.php';

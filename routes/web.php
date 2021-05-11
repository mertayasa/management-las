<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix'=>'dashboard','as'=>'dashboard.'], function(){
        // Admin
        Route::get('/', [DashboardController::class, 'index'])->name('admin');

        // Owner
    });

    Route::group(['prefix'=>'suppliers','as'=>'suppliers.'], function(){
        // Admin
        Route::get('/', [SupplierController::class, 'index'])->name('admin.index');
        Route::get('/create', [SupplierController::class, 'create'])->name('admin.create');
        Route::post('/store', [SupplierController::class, 'store'])->name('admin.store');
        Route::get('/edit/{supplier}', [SupplierController::class, 'edit'])->name('admin.edit');
        Route::patch('/update/{supplier}', [SupplierController::class, 'update'])->name('admin.update');

        // Owner
    });

    Route::group(['prefix'=>'projects','as'=>'projects.'], function(){
        // Admin
        Route::get('/', [ProjectController::class, 'index'])->name('admin.index');

        // Owner
    });

    Route::group(['prefix'=>'products','as'=>'products.'], function(){
        // Admin
        Route::get('/', [ProductController::class, 'index'])->name('admin.index');

        // Owner
    });

});

Route::get('/', function () {
    return redirect()->route('login');
});

require __DIR__.'/auth.php';

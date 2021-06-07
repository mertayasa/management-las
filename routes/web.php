<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
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
    Route::group(['prefix'=>'export','as'=>'export.'], function(){
        Route::get('print/pdf/{project}', [ProjectController::class, 'exportPdf'])->name('project.pdf');
    });

    Route::group(['prefix'=>'dashboard','as'=>'dashboard.'], function(){
        // Owner
        Route::middleware(['isAdmin'])->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('admin');
        });

        // Admin
        Route::get('/owner', [DashboardController::class, 'index'])->name('owner');
        
    });

    Route::group(['prefix'=>'suppliers','as'=>'suppliers.'], function(){
        // Admin
        Route::middleware(['isAdmin'])->group(function () {
            Route::get('/create', [SupplierController::class, 'create'])->name('admin.create');
            Route::post('/store', [SupplierController::class, 'store'])->name('admin.store');
            Route::get('/edit/{supplier}', [SupplierController::class, 'edit'])->name('admin.edit');
            Route::patch('/update/{supplier}', [SupplierController::class, 'update'])->name('admin.update');
            Route::get('/delete/{supplier}', [SupplierController::class, 'destroy'])->name('admin.delete');
        });
        
        
        // Owner & Admin
        Route::get('/', [SupplierController::class, 'index'])->name('admin.index');
        Route::get('/datatable', [SupplierController::class, 'dataTable'])->name('admin.datatable');
    });

    Route::group(['prefix'=>'projects','as'=>'projects.'], function(){
        // Admin
        Route::middleware(['isAdmin'])->group(function () {
            Route::get('/create', [ProjectController::class, 'create'])->name('admin.create');
            Route::post('/store', [ProjectController::class, 'store'])->name('admin.store');
            Route::get('/edit/{project}', [ProjectController::class, 'edit'])->name('admin.edit');
            Route::patch('/update/{project}', [ProjectController::class, 'update'])->name('admin.update');
            Route::get('/delete/{project}', [ProjectController::class, 'destroy'])->name('admin.delete');
            Route::patch('/update-progress/{project}', [ProjectController::class, 'updateProgress'])->name('admin.update_progress');
        });
        
        Route::get('/', [ProjectController::class, 'index'])->name('admin.index');
        Route::get('/datatable', [ProjectController::class, 'dataTable'])->name('admin.datatable');
        Route::get('/rab/{project}', [ProjectController::class, 'show'])->name('admin.show_rab');
        
        // Owner
        // dd(Auth::user());
        // if(Auth::user()->level == 1){
            Route::patch('/update-approved/{project}', [ProjectController::class, 'updateApproved'])->name('owner.update_approved');
        // }
    });

    Route::group(['prefix'=>'products','as'=>'products.'], function(){
        // Admin
        Route::middleware(['isAdmin'])->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.index');
            Route::get('/datatable', [ProductController::class, 'dataTable'])->name('admin.datatable');
            Route::get('/create', [ProductController::class, 'create'])->name('admin.create');
            Route::post('/store', [ProductController::class, 'store'])->name('admin.store');
            Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin.edit');
            Route::patch('/update/{product}', [ProductController::class, 'update'])->name('admin.update');
            Route::get('/delete/{product}', [ProductController::class, 'destroy'])->name('admin.delete');
            Route::get('/price/{product}', [ProductController::class, 'productPrice'])->name('admin.product_price');
        });

        // Owner
    });

});

Route::get('/', function () {
    return redirect()->route('login');
});

require __DIR__.'/auth.php';

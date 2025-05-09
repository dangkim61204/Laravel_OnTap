<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//backend route
//admin
Route::prefix('admin')->name('admin.')->group(function () {
    
    //department
    Route::prefix('department')->name('department.')->group(function () {
        Route::get('/',[DepartmentController::class,'index'])->name('index');
        Route::get('/create',[DepartmentController::class,'create'])->name('create');
        Route::post('/',[DepartmentController::class,'store'])->name('store');
        Route::get('/edit/{department}',[DepartmentController::class,'edit'])->name('edit');
        Route::put('/{department}',[DepartmentController::class,'update'])->name('update');
        Route::delete('/{department}',[DepartmentController::class,'delete'])->name('delete');
    });

    //employee
});
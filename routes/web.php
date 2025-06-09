<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//backend route
//admin
Route::prefix('admin')->name('admin.')->group(function () {

    // //department
    // Route::prefix('department')->name('department.')->group(function () {
    //     Route::get('/',[DepartmentController::class,'index'])->name('index');
    //     Route::get('/create',[DepartmentController::class,'create'])->name('create');
    //     Route::post('/',[DepartmentController::class,'store'])->name('store');
    //     Route::get('/edit/{department}',[DepartmentController::class,'edit'])->name('edit');
    //     Route::put('/{department}',[DepartmentController::class,'update'])->name('update');
    //     Route::delete('/{department}',[DepartmentController::class,'delete'])->name('delete');
    // });

    //employee
});

// login admin
// Hiển thị form đăng nhập/đăng ký
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin'])->name('postlogin');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postregister'])->name('postregister');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    

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
    Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class,'login']);
    route::get('/register', [AuthController::class,'showRegisterForm'])->name('register');
    route::post('/register', [AuthController::class,'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    // dashboard
Route::get('/dashboard', function () {
    return view('backend.dashboard.index');
})->middleware(['auth', 'is_admin'])->name('dashboard.index');


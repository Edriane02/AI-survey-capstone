<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\SetAccountController;

Route::get('/', function () {
    return redirect()->route('login');
});


// Account Setup page
Route::get('/set-account/{user}', [SetAccountController::class, 'showSetAccountForm'])->name('auth.set-account')->middleware('signed');

// Acccount Setup page: save password
Route::post('/set-account/save/{email}', [SetAccountController::class, 'savePassword'])->name('auth.save-password');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
    Route::post('/login', [AuthenticateController::class, 'loginRequest'])->name('login.request');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {

    //Admin dashboard
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    //User Management
    Route::get('management/users', [UserController::class, 'userManagement'])->name('management.users');
    Route::post('management/users/store', [UserController::class, 'storeUser'])->name('management.add.users');
    Route::delete('management/users/delete/{id}', [UserController::class, 'destroy'])->name('management.delete.user');
});


Route::middleware(['auth', 'isFaculty'])->group(function () {
    
});


Route::middleware(['auth', 'limit.access'])->group(function () {

    //user dashboard
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    //logout
    Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');
    
});
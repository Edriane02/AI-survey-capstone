<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
    Route::post('/login', [AuthenticateController::class, 'loginRequest'])->name('login.request');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
   Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});


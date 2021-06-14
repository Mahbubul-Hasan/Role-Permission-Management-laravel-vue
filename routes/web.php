<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

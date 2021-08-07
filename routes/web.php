<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('users/hasPermission/{permission}', [UserController::class, 'has_permission'])->name('users.has_permission');

Auth::routes();

Route::get('/{any}', [DashboardController::class, 'index'])->where("any", ".*")->middleware('auth');

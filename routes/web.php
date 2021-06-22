<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Auth::routes();

Route::get('/{any}', [DashboardController::class, 'index'])->where("any", ".*");

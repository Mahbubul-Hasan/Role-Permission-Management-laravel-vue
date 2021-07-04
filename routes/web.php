<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Auth::routes();

Route::get('/{any}', [DashboardController::class, 'index'])->where("any", ".*")->middleware('auth');

<?php

use App\Http\Controllers\App\DashBoardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('dashboard', DashboardController::class)->name('dashboard');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TagController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('tags', TagController::class);
Route::resource('members', MemberController::class);
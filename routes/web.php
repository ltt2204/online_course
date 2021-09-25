<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Login/Logout Routes
|--------------------------------------------------------------------------
|*/
Route::get('/', [LoginController::class, 'getLogin'])->name('login');
Route::get('login', [LoginController::class, 'getLogin'])->name('login');
Route::post('sign-in', [LoginController::class, 'postLogin'])->name('sign-in');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

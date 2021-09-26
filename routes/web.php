<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Login/Logout Routes
|--------------------------------------------------------------------------
|*/
Route::get('/', [LoginController::class, 'getLogin'])->name('login');
Route::get('login', [LoginController::class, 'getLogin'])->name('login');
Route::post('sign-in', [LoginController::class, 'postLogin'])->name('sign-in');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('admin/home', [LoginController::class, 'viewAdminHomePage'])->name('admin-home');
Route::get('teacher/home', [LoginController::class, 'viewTeacherHomePage'])->name('teacher-home');
Route::get('student/home', [LoginController::class, 'viewStudentHomePage'])->name('student-home');

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
|*/
// Route::resource('/users', UserController::class);
Route::get('user/index', [UserController::class, 'index'])->name('user.index');
// Route::get('user/create', [UserController::class, 'create'])->name('user.create');
Route::post('user/store', [UserController::class, 'store'])->name('user.store');
Route::get('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('user/info', [UserController::class, 'info'])->name('user.info');
Route::post('user/store-info', [UserController::class, 'storeInfo'])->name('user.store-info');
Route::post('user/store-avatar', [UserController::class, 'storeAvatar'])->name('user.store-avatar');
Route::post('user/store-password', [UserController::class, 'storePassword'])->name('user.store-password');
Route::get('user/change/{id}', [UserController::class, 'changeStatus'])->name('user.change');

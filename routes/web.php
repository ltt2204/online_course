<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ModuleController;


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
Route::get('user/index', [UserController::class, 'index'])->name('user.index');
Route::post('user/store', [UserController::class, 'store'])->name('user.store');
Route::get('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('user/info', [UserController::class, 'info'])->name('user.info');
Route::post('user/store-info', [UserController::class, 'storeInfo'])->name('user.store-info');
Route::post('user/store-avatar', [UserController::class, 'storeAvatar'])->name('user.store-avatar');
Route::post('user/store-password', [UserController::class, 'storePassword'])->name('user.store-password');
Route::get('user/change/{id}', [UserController::class, 'changeStatus'])->name('user.change');

/*
|--------------------------------------------------------------------------
| Subjects Routes
|--------------------------------------------------------------------------
|*/
Route::get('subject/index', [SubjectController::class, 'index'])->name('subject.index');
Route::get('subject/create', [SubjectController::class, 'create'])->name('subject.create');
Route::post('subject/store', [SubjectController::class, 'store'])->name('subject.store');
Route::get('subject/destroy/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');
Route::get('subject/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit');
Route::post('subject/update/{id}', [SubjectController::class, 'update'])->name('subject.update');
Route::get('subject/change/{id}', [SubjectController::class, 'changeStatus'])->name('subject.change');

/*
|--------------------------------------------------------------------------
| Modules Routes
|--------------------------------------------------------------------------
|*/
Route::get('module/index', [ModuleController::class, 'index'])->name('module.index');
Route::get('module/create', [ModuleController::class, 'create'])->name('module.create');
Route::post('module/store', [ModuleController::class, 'store'])->name('module.store');
Route::get('module/destroy/{id}', [ModuleController::class, 'destroy'])->name('module.destroy');
Route::get('module/edit/{id}', [ModuleController::class, 'edit'])->name('module.edit');
Route::post('module/update/{id}', [ModuleController::class, 'update'])->name('module.update');
Route::get('module/change/{id}', [ModuleController::class, 'changeStatus'])->name('module.change');

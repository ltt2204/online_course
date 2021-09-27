<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Login/Logout Routes
|--------------------------------------------------------------------------
|*/
Route::get('/', [LoginController::class, 'getLogin'])->name('login');
Route::get('login', [LoginController::class, 'getLogin'])->name('login');
Route::post('sign-in', [LoginController::class, 'postLogin'])->name('sign-in');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('admin/home', [LoginController::class, 'viewAdminHomePage'])->name('admin-home')->middleware('login_a');
Route::get('teacher/home', [LoginController::class, 'viewTeacherHomePage'])->name('teacher-home')->middleware('login_t');
Route::get('student/home', [LoginController::class, 'viewStudentHomePage'])->name('student-home')->middleware('login_s');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|*/
Route::middleware('login_a')->group(function () {
    Route::prefix('user')->name('user.')->group(function(){
        Route::get('index', [UserController::class, 'index'])->name('index');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('info', [UserController::class, 'info'])->name('info');
        Route::post('store-info', [UserController::class, 'storeInfo'])->name('store-info');
        Route::post('store-avatar', [UserController::class, 'storeAvatar'])->name('store-avatar');
        Route::post('store-password', [UserController::class, 'storePassword'])->name('store-password');
        Route::get('change/{id}', [UserController::class, 'changeStatus'])->name('change');
    });
});

/*
|--------------------------------------------------------------------------
| Subjects Routes
|--------------------------------------------------------------------------
|*/
Route::middleware('login_a')->group(function () {
    Route::prefix('subject')->name('subject.')->group(function(){
        Route::get('index', [SubjectController::class, 'index'])->name('index');
        Route::get('create', [SubjectController::class, 'create'])->name('create');
        Route::post('store', [SubjectController::class, 'store'])->name('store');
        Route::get('destroy/{id}', [SubjectController::class, 'destroy'])->name('destroy');
        Route::get('edit/{id}', [SubjectController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [SubjectController::class, 'update'])->name('update');
        Route::get('change/{id}', [SubjectController::class, 'changeStatus'])->name('change');
    });
});

/*
|--------------------------------------------------------------------------
| Modules Routes
|--------------------------------------------------------------------------
|*/
Route::middleware('login_a')->group(function () {
    Route::prefix('module')->name('module.')->group(function(){
        Route::get('index', [ModuleController::class, 'index'])->name('index');
        Route::get('create', [ModuleController::class, 'create'])->name('create');
        Route::post('store', [ModuleController::class, 'store'])->name('store');
        Route::get('destroy/{id}', [ModuleController::class, 'destroy'])->name('destroy');
        Route::get('edit/{id}', [ModuleController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ModuleController::class, 'update'])->name('update');
        Route::get('change/{id}', [ModuleController::class, 'changeStatus'])->name('change');
    });
});

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
|*/
Route::middleware('login_t')->group(function () {
    Route::prefix('teacher')->name('teacher.')->group(function(){
        Route::get('info', [TeacherController::class, 'info'])->name('info');
        Route::post('store-info', [TeacherController::class, 'storeInfo'])->name('store-info');
        Route::post('store-avatar', [TeacherController::class, 'storeAvatar'])->name('store-avatar');
        Route::post('store-password', [TeacherController::class, 'storePassword'])->name('store-password');
    });
});

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|*/
Route::middleware('login_s')->group(function () {
    Route::prefix('student')->name('student.')->group(function(){
        Route::get('info', [StudentController::class, 'info'])->name('info');
        Route::post('store-info', [StudentController::class, 'storeInfo'])->name('store-info');
        Route::post('store-avatar', [StudentController::class, 'storeAvatar'])->name('store-avatar');
        Route::post('store-password', [StudentController::class, 'storePassword'])->name('store-password');
    });
});


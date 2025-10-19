<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('users', UserController::class)->middleware('auth');
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::resource(name: 'projects', controller: ProjectController::class)->middleware(middleware: 'auth');
Route::resource(name: 'tasks', controller: TaskController::class)->middleware(middleware: 'auth');





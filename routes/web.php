<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/signup', [SignupController::class, 'signup'])->name('signup');

Route::post('/register', [SignupController::class, 'register'])->name('register');

Route::get('/get-users', [UsersController::class, 'getUsers'])->name('getUsers');

Route::get('/edituser/{id}', [UsersController::class, 'editUser'])->name('edituser');

Route::get('/deleteUser/{id}', [UsersController::class, 'deleteUser'])->name('deleteUser');


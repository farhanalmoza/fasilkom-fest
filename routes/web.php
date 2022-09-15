<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Data\InformationController;
use App\Http\Controllers\Data\PanitiaController;
use App\Http\Controllers\Data\RoleController;
use App\Http\Controllers\Data\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('front/index');
});

// view admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/informasi', [AdminController::class, 'infromasi']);
    Route::get('/divisi', [AdminController::class, 'divisi']);
    Route::get('/daftar-panitia', [AdminController::class, 'daftarPanitia']);
    Route::get('/pengaturan-akun', [AdminController::class, 'pengaturanAkun']);
    Route::get('/ganti-password', [AdminController::class, 'gantiPassword']);
});

// data
Route::group(['prefix' => 'data'], function() {
    // get All
    Route::get('/divisi', [RoleController::class, 'getAll']);
    Route::get('/panitia', [PanitiaController::class, 'index']);

    // get detail
    Route::get('/divisi/{id}', [RoleController::class, 'show']);
    Route::get('/informasi/{id}', [InformationController::class, 'show']);

    // update
    Route::group(['prefix' => 'update'], function() {
        Route::put('/divisi/{id}', [RoleController::class, 'update']);
        Route::put('/informasi/{id}', [InformationController::class, 'update']);
    });

    // delete
    Route::group(['prefix' => 'delete'], function() {
        Route::delete('/divisi/{id}', [RoleController::class, 'destroy']);
        Route::delete('/panitia/{id}', [PanitiaController::class, 'destroy']);
    });

    // add
    Route::group(['prefix' => 'add'], function() {
        Route::post('/divisi', [RoleController::class, 'store']);
    });

    // pengaturan
    Route::group(['prefix' => 'pengaturan'], function() {
        Route::put('/ganti-password', [UserController::class, 'gantiPassword']);
    });
});

// Auth::routes();
// list auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('/password/confirm', [ConfirmPasswordController::class, 'confirm']);
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// register panitia
Route::post('/register-panitia', [PanitiaController::class, 'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

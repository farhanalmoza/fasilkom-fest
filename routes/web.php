<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Data\CategoryController;
use App\Http\Controllers\Data\CompetitionController;
use App\Http\Controllers\Data\CsoController;
use App\Http\Controllers\Data\InformationController;
use App\Http\Controllers\Data\PanitiaController;
use App\Http\Controllers\Participant\PesertaController;
use App\Http\Controllers\Data\RoleController;
use App\Http\Controllers\Data\SpeakerController;
use App\Http\Controllers\Data\SponsorController;
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

    Route::get('/bidang-lomba', [AdminController::class, 'bidangLomba']);
    Route::get('/mata-lomba', [AdminController::class, 'mataLomba']);
    Route::get('/tambah-lomba', [AdminController::class, 'tambahLomba']);
    Route::get('/edit-lomba/{id}', [AdminController::class, 'editLomba']);

    Route::get('/tambah-pembicara', [AdminController::class, 'tambahPembicara']);
    Route::get('/daftar-pembicara', [AdminController::class, 'daftarPembicara']);
    Route::get('/edit-pembicara/{id}', [AdminController::class, 'editPembicara']);

    Route::get('/tambah-sponsor', [AdminController::class, 'tambahSponsor']);
    Route::get('/daftar-sponsor', [AdminController::class, 'daftarSponsor']);
    Route::get('/edit-sponsor/{id}', [AdminController::class, 'editSponsor']);

    Route::get('/pengaturan-akun', [AdminController::class, 'pengaturanAkun']);
    Route::get('/ganti-password', [AdminController::class, 'gantiPassword']);
});

// peserta cso
Route::group(['prefix' => 'peserta-cso', 'middleware' => ['auth']], function() {
    Route::get('/', [PesertaController::class, 'dashboardCso']);
    Route::get('/tim', [PesertaController::class, 'detailTimCso']);

    Route::get('/pengaturan-akun', [PesertaController::class, 'pengaturanAkun']);
    Route::get('/ganti-password', [PesertaController::class, 'gantiPassword']);
});

// data
Route::group(['prefix' => 'data'], function() {
    // get All
    Route::get('/divisi', [RoleController::class, 'getAll']);
    Route::get('/divisi-panitia', [RoleController::class, 'getDivPanitia']);
    Route::get('/target-peserta', [RoleController::class, 'getTargetPeserta']);
    Route::get('/panitia', [PanitiaController::class, 'index']);
    Route::get('/bidang-lomba', [CategoryController::class, 'getAll']);
    Route::get('/lomba', [CompetitionController::class, 'getAll']);
    Route::get('/pembicara', [SpeakerController::class, 'getAll']);
    Route::get('/sponsor', [SponsorController::class, 'getAll']);

    // get detail
    Route::get('/divisi/{id}', [RoleController::class, 'show']);
    Route::get('/informasi/{id}', [InformationController::class, 'show']);
    Route::get('/lomba/{id}', [CompetitionController::class, 'show']);
    Route::get('/pembicara/{id}', [SpeakerController::class, 'show']);
    Route::get('/sponsor/{id}', [SponsorController::class, 'show']);
    Route::get('/role-peserta/{slug}', [RoleController::class, 'getBySlug']);
    Route::get('/tim-cso/{id}', [CsoController::class, 'show']);

    // update
    Route::group(['prefix' => 'update'], function() {
        Route::put('/divisi/{id}', [RoleController::class, 'update']);
        Route::put('/informasi/{id}', [InformationController::class, 'update']);
        Route::post('/lomba/{id}', [CompetitionController::class, 'update']);
        Route::post('/pembicara/{id}', [SpeakerController::class, 'update']);
        Route::post('/sponsor/{id}', [SponsorController::class, 'update']);
        Route::post('/detail-tim/{id}', [CsoController::class, 'updateDetailTim']);
    });

    // delete
    Route::group(['prefix' => 'delete'], function() {
        Route::delete('/divisi/{id}', [RoleController::class, 'destroy']);
        Route::delete('/panitia/{id}', [PanitiaController::class, 'destroy']);
        Route::delete('/bidang-lomba/{id}', [CategoryController::class, 'destroy']);
        Route::delete('/lomba/{id}', [CompetitionController::class, 'destroy']);
        Route::delete('/pembicara/{id}', [SpeakerController::class, 'destroy']);
        Route::delete('/sponsor/{id}', [SponsorController::class, 'destroy']);
    });

    // add
    Route::group(['prefix' => 'add'], function() {
        Route::post('/divisi', [RoleController::class, 'store']);
        Route::post('/bidang-lomba', [CategoryController::class, 'store']);
        Route::post('/mata-lomba', [CompetitionController::class, 'store']);
        Route::post('/pembicara', [SpeakerController::class, 'store']);
        Route::post('/sponsor', [SponsorController::class, 'store']);
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

Route::get('/daftar-akun/{slug}', [PesertaController::class, 'showRegistrationForm']);
Route::post('/register/peserta', [PesertaController::class, 'register']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

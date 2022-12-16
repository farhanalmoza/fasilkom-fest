<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Data\BpcController;
use App\Http\Controllers\Data\CategoryController;
use App\Http\Controllers\Data\CompetitionController;
use App\Http\Controllers\Data\CsoController;
use App\Http\Controllers\Data\InformationController;
use App\Http\Controllers\Data\KaryaUiuxController;
use App\Http\Controllers\Data\MlController;
use App\Http\Controllers\Data\PanitiaController;
use App\Http\Controllers\Data\PesController;
use App\Http\Controllers\Data\PhotographyController;
use App\Http\Controllers\Data\PubgController;
use App\Http\Controllers\Participant\PesertaController;
use App\Http\Controllers\Data\RoleController;
use App\Http\Controllers\Data\SoloCoverController;
use App\Http\Controllers\Data\SpeakerController;
use App\Http\Controllers\Data\SponsorController;
use App\Http\Controllers\Data\SportController;
use App\Http\Controllers\Data\UiuxController;
use App\Http\Controllers\Data\UserController;
use App\Http\Controllers\Data\VideographyController;
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

// view panitia cso
Route::group(['prefix' => 'panitia-cso', 'middleware' => ['auth']], function() {
    Route::get('/', [CsoController::class, 'index'])->name('cso.dashboard');
    Route::get('/pendaftar', [CsoController::class, 'pendaftar']);
    Route::get('/detail-pendaftar/{id}', [CsoController::class, 'detailPendaftar']);
    Route::get('/tahap-2', [CsoController::class, 'tahap2']);
    Route::get('/final', [CsoController::class, 'final']);

    Route::get('/ganti-password', [BpcController::class, 'gantiPassword']);
});

// view panitia bpc
Route::group(['prefix' => 'panitia-bpc', 'middleware' => ['auth']], function() {
    Route::get('/', [BpcController::class, 'index'])->name('bpc.dashboard');
    Route::get('/pendaftar', [BpcController::class, 'pendaftar']);
    Route::get('/detail-pendaftar/{id}', [BpcController::class, 'detailPendaftar']);
    Route::get('/tahap-2', [BpcController::class, 'tahap2']);
    Route::get('/final', [BpcController::class, 'final']);

    Route::get('/ganti-password', [BpcController::class, 'gantiPassword']);
});
// view panitia uiux
Route::group(['prefix' => 'panitia-uiux', 'middleware' => ['auth']], function() {
    Route::get('/', [UiuxController::class, 'index'])->name('uiux.dashboard');
    Route::get('/pendaftar', [UiuxController::class, 'pendaftar']);
    Route::get('/detail-pendaftar/{id}', [UiuxController::class, 'detailPendaftar']);
    Route::get('/tahap-2', [UiuxController::class, 'tahap2']);
    Route::get('/final', [UiuxController::class, 'final']);

    Route::get('/ganti-password', [UiuxController::class, 'gantiPassword']);
});

// view panitia sport
Route::group(['prefix' => 'panitia-sport', 'middleware' => ['auth']], function() {
    Route::get('/', [SportController::class, 'index'])->name('sport.dashboard');
    Route::get('/futsal', [SportController::class, 'pesertaFutsal']);
    Route::get('/basket-putra', [SportController::class, 'pesertaBasketPutra']);
    Route::get('/basket-putri', [SportController::class, 'pesertaBasketPutri']);
    Route::get('/detail/{id}', [SportController::class, 'detail']);

    Route::get('/ganti-password', [SportController::class, 'gantiPassword']);
});

// view panitia esport
Route::group(['prefix' => 'panitia-esport', 'middleware' => ['auth']], function() {
    Route::get('/', [MlController::class, 'index'])->name('esport.dashboard');
    Route::get('/mobile-legend', [MlController::class, 'pesertaMobileLegend']);
    Route::get('/pubg', [PubgController::class, 'pesertaPubg']);
    Route::get('/pes', [PesController::class, 'pesertaPes']);

    Route::get('/mobile-legend/{id}', [MlController::class, 'detailMobileLegend']);
    Route::get('/pubg-mobile/{id}', [PubgController::class, 'detailPubg']);
    
    Route::get('/ganti-password', [MlController::class, 'gantiPassword']);
});

// view panitia art
Route::group(['prefix' => 'panitia-art', 'middleware' => ['auth']], function() {
    Route::get('/', [PhotographyController::class, 'index'])->name('art.dashboard');
    Route::get('/photography', [PhotographyController::class, 'peserta']);
    Route::get('/videography', [VideographyController::class, 'peserta']);
    Route::get('/solo-cover', [SoloCoverController::class, 'peserta']);
    
    Route::get('/ganti-password', [SoloCoverController::class, 'gantiPassword']);
});

// peserta cso
Route::group(['prefix' => 'peserta-cso', 'middleware' => ['auth']], function() {
    Route::get('/', [PesertaController::class, 'dashboardCso']);
    Route::get('/tim', [PesertaController::class, 'detailTimCso']);

    Route::get('/ganti-password', [PesertaController::class, 'gantiPasswordCso']);
});

// peserta UI/UX
Route::group(['prefix' => 'peserta-uiux', 'middleware' => ['auth']], function() {
    Route::get('/', [PesertaController::class, 'dashboardUiux']);
    Route::get('/tim', [PesertaController::class, 'detailTimUiux']);
    Route::get('/penyisihan', [PesertaController::class, 'penyisihanUiux']);
    Route::get('/final', [PesertaController::class, 'finalUiux']);

    Route::get('/ganti-password', [PesertaController::class, 'gantiPasswordUiux']);
});

// peserta BPC
Route::group(['prefix' => 'peserta-bpc', 'middleware' => ['auth']], function() {
    Route::get('/', [PesertaController::class, 'dashboardBpc']);
    Route::get('/tim', [PesertaController::class, 'detailTimBpc']);
    Route::get('/tahap-2', [PesertaController::class, 'tahap2Bpc']);
    Route::get('/final', [PesertaController::class, 'finalBpc']);

    Route::get('/ganti-password', [PesertaController::class, 'gantiPasswordBpc']);
});

// view pendaftaran peserta selain akademik
Route::group(['prefix' => 'daftar', 'middleware' => ['guest']], function() {
    Route::get('/peserta-mobile-legend', [PesertaController::class, 'pendaftaranMl']);
    Route::get('/peserta-pes', [PesertaController::class, 'closeReg']);
    Route::get('/peserta-pubg-mobile', [PesertaController::class, 'pendaftaranPubg']);

    Route::get('/peserta-futsal', [PesertaController::class, 'pendaftaranFutsal']);
    Route::get('/peserta-basket-putri', [PesertaController::class, 'pendaftaranBasketPutri']);
    Route::get('/peserta-basket-putra', [PesertaController::class, 'pendaftaranBasketPutra']);

    Route::get('/peserta-fotografi', [PesertaController::class, 'pendaftaranFotografi']);
    Route::get('/peserta-videografi', [PesertaController::class, 'pendaftaranVideografi']);
    Route::get('/peserta-solo-cover', [PesertaController::class, 'pendaftaranSoloCover']);
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
    Route::get('/sport/{category_id}', [SportController::class, 'getAll']);
    Route::get('/mobile-legend', [MlController::class, 'getAll']);
    Route::get('/pubg-mobile', [PubgController::class, 'getAll']);
    Route::get('/pes', [PesController::class, 'getAll']);
    Route::get('/photography', [PhotographyController::class, 'getAll']);
    Route::get('/videography', [VideographyController::class, 'getAll']);
    Route::get('/solo-cover', [SoloCoverController::class, 'getAll']);
    Route::get('/pendaftar-bpc', [BpcController::class, 'getAll']);
    Route::get('/pendaftar-uiux', [UiuxController::class, 'getAll']);
    Route::get('/pendaftar-cso', [CsoController::class, 'getAll']);

    // get detail
    Route::get('/divisi/{id}', [RoleController::class, 'show']);
    Route::get('/informasi/{id}', [InformationController::class, 'show']);
    Route::get('/lomba/{id}', [CompetitionController::class, 'show']);
    Route::get('/pembicara/{id}', [SpeakerController::class, 'show']);
    Route::get('/sponsor/{id}', [SponsorController::class, 'show']);
    Route::get('/role-peserta/{slug}', [RoleController::class, 'getBySlug']);
    Route::get('/tim-cso/{id}', [CsoController::class, 'show']);
    Route::get('/tim-uiux/{id}', [UiuxController::class, 'show']);
    Route::get('/penyisihan/{team_id}', [KaryaUiuxController::class, 'show']);
    Route::get('/tim-bpc/{id}', [BpcController::class, 'show']);
    Route::get('/detail-sport/{id}', [SportController::class, 'show']);
    Route::get('/detail-ml/{id}', [MlController::class, 'show']);
    Route::get('/detail-pubg/{id}', [PubgController::class, 'show']);
    Route::get('/detail-pes/{id}', [PesController::class, 'show']);
    Route::get('/detail-bpc/{id}', [BpcController::class, 'show']);
    Route::get('/detail-uiux/{id}', [UiuxController::class, 'show']);
    Route::get('/detail-cso/{id}', [CsoController::class, 'show']);

    // update
    Route::group(['prefix' => 'update'], function() {
        Route::put('/divisi/{id}', [RoleController::class, 'update']);
        Route::put('/informasi/{id}', [InformationController::class, 'update']);
        Route::post('/lomba/{id}', [CompetitionController::class, 'update']);
        Route::post('/pembicara/{id}', [SpeakerController::class, 'update']);
        Route::post('/sponsor/{id}', [SponsorController::class, 'update']);
        Route::post('/detail-tim-cso/{id}', [CsoController::class, 'updateDetailTim']);
        Route::post('/detail-tim-uiux/{id}', [UiuxController::class, 'updateDetailTim']);
        Route::put('/karya-uiux/{team_id}', [KaryaUiuxController::class, 'update']);
        Route::post('/detail-tim-bpc/{id}', [BpcController::class, 'updateDetailTim']);
        Route::post('/tahap-2-bpc/{team_id}', [BpcController::class, 'updateTahap2']);
        Route::post('/final-bpc/{team_id}', [BpcController::class, 'updateFinal']);
        Route::put('/lolos-bpc/{team_id}', [BpcController::class, 'lolosFinal']);
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
        Route::post('/penyisihan-uiux', [KaryaUiuxController::class, 'store']);
        Route::post('/ml', [MlController::class, 'store']);
        Route::post('/pes', [PesController::class, 'store']);
        Route::post('/pubg', [PubgController::class, 'store']);
        Route::post('/sport', [SportController::class, 'store']);
        Route::post('/fotografi', [PhotographyController::class, 'store']);
        Route::post('/videografi', [VideographyController::class, 'store']);
        Route::post('/solo-cover', [SoloCoverController::class, 'store']);
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

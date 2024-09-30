<?php

use App\Models\Pendaftran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserData;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\LembagaController;
use App\Http\Controllers\Backend\RencanaController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Frontend\PesertaController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Backend\PendaftaranController;
use App\Http\Controllers\Frontend\DetialPelatihanController;

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

Route::get('/', [HomeController::class, 'page_index'])->name('index');
Route::get('/detail/pelatihan/{id}', [DetialPelatihanController::class, 'show_page'])->name('detail.page.pelatihan');
Route::get('/get-data/desa/{kecamatan_id}', [DashboardController::class, 'getDesasByKecamatan'])->name('api.data.desas_by_kecamatan');
Route::get('pendaftaran/pelatihan/user/daftar/{id}', [PesertaController::class, 'page_pesert'])->name('page_pesert.pendaftaran');

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified')->middleware('checkUserData');


Route::group(['middleware' => 'verified'], function () {
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/admin-dashboard', [AdminController::class, 'page_dashboard'])->name('admin.dashboard');
        Route::get('/api/data/grafik', [AdminController::class, 'chartPelatihan'])->name('chart.pelatihan');
        Route::get('/api/data/top-kategori', [AdminController::class, 'topKategoriPelatihan'])->name('top.kategori');
        Route::get('/silder', [SliderController::class, 'page_index'])->name('admin.silder');
        Route::post('/silder/store', [SliderController::class, 'store'])->name('admin.silder.store');
        ROute::get('/silder/create', [SliderController::class, 'create'])->name('admin.silder.create');
        Route::put('/slider/toggle-status/{id}', [SliderController::class, 'toggleStatus'])->name('slider.toggleStatus');
        Route::get('/kategori/page_index', [KategoriController::class, 'page_index'])->name('admin.kategori');
        Route::post('/kategori/store', [KategoriController::class, 'store'])->name('admin.kategori.store');
        Route::get('/rencana_pelatihan',[RencanaController::class, 'page_index'])->name('rencana.page_index');
        Route::get('/rencana_pelatihan/create',[RencanaController::class, 'create_page'])->name('rencana.page_create');
        Route::post('rencana_pelatihan/store', [RencanaController::class, 'store_page'])->name('rencana.page_store');
        Route::get('/rencana_pelatihan/edit/{id}', [RencanaController::class, 'edit_page'])->name('rencana.page_edit');
        Route::delete('/rencana_pelatihan/delete/{id}', [RencanaController::class, 'destroy_page'])->name('rencana.page_delete');
        Route::post('/rencana_pelatihan/update/{id}', [RencanaController::class, 'update_page'])->name('rencana.page_update');

        Route::get('pendaftaran/pelatihan', [PendaftaranController::class, 'page_pendaftaran'])->name('pendaftaran.page_pendaftaran');
        Route::get('pendaftaran/pelatihan/create', [PendaftaranController::class, 'page_create'])->name('pendaftaran.page_create');
        Route::post('pendafaran/pelatihan/store', [PendaftaranController::class, 'page_store'])->name('pendaftaran.page_store');
        Route::get('/api/pelatihan/{id}', [PendaftaranController::class, 'getPelatihan']);
        Route::get('/pendaftaran/pelatihan/edit/{id}', [PendaftaranController::class, 'page_edit'])->name('pendaftaran.page_edit');
        Route::get('/pendaftaran/pelatihan/show/{id}', [PendaftaranController::class, 'show_page'])->name('pendaftaran.page_show');


    });

    Route::middleware(['auth', 'role:lembaga'])->group(function () {
        Route::get('/lembaga-dashboard', [LembagaController::class, 'page_dashboard'])->name('lembaga.dashboard')->middleware('check.lembaga_id');
        Route::get('/fill-lembaga', [LembagaController::class, 'showFillForm'])->name('lembaga.fill');
        Route::post('/fill-lembaga', [LembagaController::class, 'storeLembagaId'])->name('lembaga.store');
        Route::get('/rencana_pelatihan',[RencanaController::class, 'page_index'])->name('rencana.page_index');
        Route::get('/rencana_pelatihan/create',[RencanaController::class, 'create_page'])->name('rencana.page_create');
        Route::post('rencana_pelatihan/store', [RencanaController::class, 'store_page'])->name('rencana.page_store');
        Route::get('/rencana_pelatihan/edit/{id}', [RencanaController::class, 'edit_page'])->name('rencana.page_edit');
        Route::delete('/rencana_pelatihan/delete/{id}', [RencanaController::class, 'destroy_page'])->name('rencana.page_delete');
        Route::post('/rencana_pelatihan/update/{id}', [RencanaController::class, 'update_page'])->name('rencana.page_update');

        Route::get('pendaftaran/pelatihan', [PendaftaranController::class, 'page_pendaftaran'])->name('pendaftaran.page_pendaftaran');
        Route::get('pendaftaran/pelatihan/create', [PendaftaranController::class, 'page_create'])->name('pendaftaran.page_create');
        Route::post('pendafaran/pelatihan/store', [PendaftaranController::class, 'page_store'])->name('pendaftaran.page_store');
        Route::get('/api/pelatihan/{id}', [PendaftaranController::class, 'getPelatihan']);
        Route::get('/pendaftaran/pelatihan/edit/{id}', [PendaftaranController::class, 'page_edit'])->name('pendaftaran.page_edit');
        Route::get('/pendaftaran/pelatihan/show/{id}', [PendaftaranController::class, 'show_page'])->name('pendaftaran.page_show');


    });

// Route::middleware(['auth','role:admin,lembaga'])->group(function () {
//     Route::get('/rencana_pelatihan',[RencanaController::class, 'page_index'])->name('rencana.page_index');
//     Route::get('/rencana_pelatihan/create',[RencanaController::class, 'create_page'])->name('rencana.page_create');
//     Route::post('rencana_pelatihan/store', [RencanaController::class, 'store_page'])->name('rencana.page_store');
//     Route::get('/rencana_pelatihan/edit/{id}', [RencanaController::class, 'edit_page'])->name('rencana.page_edit');
//     Route::delete('/rencana_pelatihan/delete/{id}', [RencanaController::class, 'destroy_page'])->name('rencana.page_delete');
//     Route::post('/rencana_pelatihan/update/{id}', [RencanaController::class, 'update_page'])->name('rencana.page_update');

//     Route::get('pendaftaran/pelatihan', [PendaftaranController::class, 'page_pendaftaran'])->name('pendaftaran.page_pendaftaran');
//     Route::get('pendaftaran/pelatihan/create', [PendaftaranController::class, 'page_create'])->name('pendaftaran.page_create');
//     Route::post('pendafaran/pelatihan/store', [PendaftaranController::class, 'page_store'])->name('pendaftaran.page_store');
//     Route::get('/api/pelatihan/{id}', [PendaftaranController::class, 'getPelatihan']);
//     Route::get('/pendaftaran/pelatihan/edit/{id}', [PendaftaranController::class, 'page_edit'])->name('pendaftaran.page_edit');
//     Route::get('/pendaftaran/pelatihan/show/{id}', [PendaftaranController::class, 'show_page'])->name('pendaftaran.page_show');

//     });


});
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-dashboard', [DashboardController::class, 'page_dashboard'])->name('user.dashboard')->middleware(CheckUserData::class);
    Route::get('user-profile', [DashboardController::class, 'page_profile'])->name('user.profile');
    Route::post('user-profile/update', [DashboardController::class, 'update_profile'])->name('user.profile.update');
    Route::get('/pendaftaran/pelatihan/user/daftar/{id}', [PesertaController::class, 'page_pesert'])->name('page_pesert.pendaftaran');
    Route::post('/pendaftaran/pelatihan/user/store/{id}', [PesertaController::class, 'page_store'])->name('page_pesert.store');
    ROute::get('/bukti-pendaftaran/user/daftar/{id}', [PesertaController::class, 'page_bukti'])->name('page_bukti.pendaftaran');


});


<?php

use App\Http\Controllers\Admin\AdmBerandaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdmCategoryController;
use App\Http\Controllers\Admin\AdmLembagaController;
use App\Http\Controllers\Admin\AdmDistributionController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\Admin\AdmGalleryController;
use App\Http\Controllers\Admin\AdmProgramController;
use App\Http\Controllers\Admin\AdmPostController;
use App\Http\Controllers\Admin\AdmMessageController;
use App\Http\Controllers\Admin\AdmPaymentController;
use App\Http\Controllers\Admin\AdmRequestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TestController;

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

/*
! ===============
! | Client Side |
! ===============
*/

Route::controller(BerandaController::class)->group(function () {
    Route::get('/', 'index');

    /*==============
    | Tentang Kami |
    ==============*/
    Route::get('/legalitas', 'legalitas');
    Route::get('/visi-misi', 'visiMisi');
    Route::get('/struktur-organisasi', 'strukturOrganisasi');
    Route::get('/organisasi', 'organisasi');
    Route::get('/sejarah-organisasi', 'sejarahOrganisasi');

    /*=========
    | Layanan |
    =========*/
    Route::get('/rekening', 'rekening');
    Route::get('/layanan-pembayaran', 'layananPembayaran');
    Route::get('/permohonan-bantuan', 'permohonanBantuan');
    Route::get('/cek-permohonan-bantuan', 'cekPermohonanBantuan');

    /*==============
    | Hubungi Kami |
    ==============*/
    Route::get('/hubungi-kami', 'hubungiKami');

    /*=============
    | Bayar Zakat |
    =============*/
    Route::get('/bayarzakat', 'zakat');

    Route::get('/404', 'notFound');
});

/*
================
| Program Page |
================
Digunakan untuk mendapatkan rute menuju halaman program
*/
Route::controller(ProgramController::class)->group(function () {
    Route::get('/program-kemanusiaan', 'programKemanusiaan');
    Route::get('/program-pendidikan', 'programPendidikan');
    Route::get('/program-kesehatan', 'programKesehatan');
    Route::get('/program-advokasi-dakwah', 'programAdvokasiDakwah');
    Route::get('/program-ekonomi-produktif', 'programEkonomiProduktif');
});

/*
=============
| Postingan |
=============
Digunakan di untuk mendapatkan data post berdsarkan kategori dan id (detail postingan)
*/
Route::get('/category/{slug}', [PostController::class, 'Post']);
Route::get('/post/{id}', [PostController::class, 'detailPost']);

/*
====================
| Kalkulator Zakat |
====================
Digunakan di index.blade.php untuk mendapatkan respon hasil perhitungan kalkulasi zakat
*/
Route::controller(KalkulatorController::class)->group(function () {
    Route::post('/index-fitrah', 'calcFitrah');
    Route::post('/index-maal', 'calcMaal');
    Route::post('/index-fidyah', 'calcFidyah');
    Route::post('/index-qurban', 'calcQurban');
    Route::post('/index-infaq', 'calcInfaq');
    Route::post('/index-penghasilan', 'calcPenghasilan');
});

/*
=====================
| Client Post Route |
=====================
Digunakan untuk mengirimkan data bayar zakat dan pesan pada fitur di Navigasi Bar
*/
Route::post('/bayar-zakat', [PaymentController::class, 'paymentStore']);
Route::post('/hubungi-kami', [MessageController::class, 'sendMessage']);
Route::post('/datajax', [AjaxController::class, 'getDataRekening']);

/*
============
| Testing |
===========
Digunakan untuk testing function region
*/
Route::get('/province', [TestController::class, 'indexRegion']);
Route::get('/json', [TestController::class, 'getJSON']);
Route::post('/get-district', [AjaxController::class, 'getDistrict']);
Route::post('/get-regency', [AjaxController::class, 'getRegency']);
Route::post('/get-village', [AjaxController::class, 'getVillage']);

Route::post('/program/update-state', [AdmProgramController::class, 'updateProgramState']);

/*
! ==============
! | Admin Side |
! ==============
*/
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'storeLogin']);
Route::middleware('auth')->group(function () {
    Route::middleware('is.admin')->group(function () {
        Route::post('data-zis-ajax/', [AjaxController::class, 'getDataZisCategory']);
        Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {
            Route::get('logout', [AuthController::class, 'logout'])->name('logout');
            Route::get('/', [HomeController::class, 'index']);
            Route::get('/statistik', [HomeController::class, 'statistik']);


            Route::get('/category', [AdmCategoryController::class, 'listCategoryPost']);
            Route::post('/category/store', [AdmCategoryController::class, 'storeCategoryPost'])->name('store.category');
            Route::post('/category/update', [AdmCategoryController::class, 'updateCategoryPost'])->name('update.category');
            Route::get('/category/delete/{id}', [AdmCategoryController::class, 'destroyCategoryPost'])->name('destroy.category');

            /*
            ===========
            | Program |
            ===========
            ? Akan di tambah
            */
            Route::get('/program', [AdmProgramController::class, 'listProgram']);
            Route::post('/program/store', [AdmProgramController::class, 'storeProgram'])->name('store.program');
            Route::post('/program/update', [AdmProgramController::class, 'updateProgram'])->name('update.program');
            Route::get('/program/delete/{id}', [AdmProgramController::class, 'destroyProgram'])->name('destroy.program');

            Route::get('/post/add', [AdmPostController::class, 'createPost'])->name('add.post');
            Route::post('/post/store', [AdmPostController::class, 'storePost'])->name('store.post');
            Route::get('/post/{slug}', [AdmPostController::class, 'listPost']);
            Route::get('/post/edit/{id}', [AdmPostController::class, 'editPost']);
            Route::post('/post/update/{id}', [AdmPostController::class, 'updatedPost']);
            Route::get('/post/delete/{id}', [AdmPostController::class, 'destroyPost']);
            Route::get('/post/status/{id}', [AdmPostController::class, 'statusPost']);

            Route::get('/galeri', [AdmGalleryController::class, 'indexGaleri'])->name('index.galeri');
            Route::get('/galeri/add', [AdmGalleryController::class, 'createGaleri'])->name('add.galeri');
            Route::post('/galeri/store', [AdmGalleryController::class, 'storeGaleri'])->name('store.galeri');
            Route::get('/galeri/edit/{galeriID}', [AdmGalleryController::class, 'editGaleri']);
            Route::post('/galeri/update/{galeriID}', [AdmGalleryController::class, 'updateGaleri']);
            Route::get('/galeri/delete/{galeriID}', [AdmGalleryController::class, 'destroyGaleri']);

            Route::get('/layanan/rekening', [LayananController::class, 'indexLayananRekening']);
            Route::get('/layanan/rekening/add', [LayananController::class, 'addRekening']);
            Route::post('/layanan/rekening', [LayananController::class, 'storeRekening']);
            Route::get('/layanan/rekening/{rekID}/edit', [LayananController::class, 'editRekening']);
            Route::post('/layanan/rekening/{rekID}/edit', [LayananController::class, 'updateRekening']);
            Route::get('/layanan/rekening/{rekID}/delete', [LayananController::class, 'deleteRekening']);

            Route::get('/layanan/pembayaran', [LayananController::class, 'indexBayarZakat']);
            Route::get('/layanan/pembayaran/{transID}/status', [LayananController::class, 'updateStatusBayar']);

            Route::get('/pesan', [AdmMessageController::class, 'indexMessage']);

            /**
             * Lembaga Management
             */
            Route::get('/lembaga', [AdmLembagaController::class, 'listLembaga']);
            Route::post('/lembaga/store', [AdmLembagaController::class, 'storeLembaga'])->name('store.lembaga');
            Route::post('/lembaga/update', [AdmLembagaController::class, 'updateLembaga'])->name('update.lembaga');
            Route::get('/lembaga/delete/{id}', [AdmLembagaController::class, 'destroyLembaga'])->name('destroy.lembaga');
            /*
            ! Transactional Feature
            Need to fix
            Main Route is 
            ==============
            get All -> Table
            get {id} -> Detail Can Edit
            get add -> Add
            post store -> Store new data
            post update {id} -> Update row data
            */
            Route::get('/pembayaran', [AdmPaymentController::class, 'pembayaran']);
            Route::get('/pembayaran/add', [AdmPaymentController::class, 'createPembayaran'])->name('add.pembayaran');
            Route::post('/pembayaran/store', [AdmPaymentController::class, 'paymentStore'])->name('store.pembayaran');
            Route::get('/pembayaran/{id}', [AdmPaymentController::class, 'detailPembayaran']);

            Route::get('/permohonan', [AdmRequestController::class, 'permohonan']);
            Route::get('/permohonan/add', [AdmRequestController::class, 'createPermohonan'])->name('add.permohonan-bantuan');
            Route::get('/permohonan/{slug}', [AdmRequestController::class, 'detailPermohonan']);
            Route::post('/permohonan/store', [AdmRequestController::class, 'requestStore'])->name('store.request');

            Route::get('/penyaluran', [AdmDistributionController::class, 'penyaluran']);
            Route::get('/penyaluran/add', [AdmDistributionController::class, 'createPenyaluran'])->name('add.penyaluran');
            Route::get('/penyaluran/{id}', [AdmDistributionController::class, 'detailPenyaluran']);

            // export laporan
            Route::get('export/tahun/{id}', [AdmBerandaController::class, 'exportLaporanTahun'])->name('export.laporan.tahun');
            Route::get('export/bulan/{id}', [AdmBerandaController::class, 'exportLaporanBulan'])->name('export.laporan.bulan');
        });
    });
});
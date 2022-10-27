<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdmCategoryController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\KabarController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\Admin\AdmKabarController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdmMessageController;

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

//Front End

Route::controller(BerandaController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/legalitas', 'legalitas');
    Route::get('/visi-misi', 'visiMisi');
    Route::get('/struktur-organisasi', 'strukturOrganisasi');
    Route::get('/organisasi', 'organisasi');
    Route::get('/sejarah-organisasi', 'sejarahOrganisasi');
    Route::get('/bayarzakat', 'zakat');
    Route::get('/inspirasi', 'inspirasi');
    Route::get('/article', 'article');
    Route::get('/pendistribusian', 'pendistribusian');
    Route::get('/video-kegiatan', 'videoKegiatan');
    Route::get('/hubungi-kami', 'hubungiKami');
    Route::get('/404', 'notFound');
    Route::get('/rekening', 'rekening');
    Route::get('/layanan-pembayaran', 'layananPembayaran');
    /*
    ! Tidak dipakai
    Route::get('/index-fitrah', 'indexFitrah');
    Route::get('/index-maal', 'indexMaal');
    Route::get('/index-fidyah', 'indexFidyah');
    Route::get('/index-qurban', 'indexQurban');
    Route::get('/index-infaq', 'indexInfaq');
    */
    Route::get('/program-kemanusiaan', 'programKemanusiaan');
    Route::get('/program-pendidikan', 'programPendidikan');
    Route::get('/program-kesehatan', 'programKesehatan');
    Route::get('/program-advokasi-dakwah', 'programAdvokasiDakwah');
    Route::get('/program-ekonomi-produktif', 'programEkonomiProduktif');
    Route::get('/program-kkn', 'programKKN');
    Route::get('/program-beasiswa', 'programBeasiswa');
    Route::get('/program-distribusi', 'programDistribusi');
    Route::get('/program-pemberdayaan', 'programPemberdayaan');
    Route::get('/program-santunan', 'programSantunan');
    Route::get('/program-subsidi', 'programSubsidi');
});

Route::post('datajax/', [AjaxController::class, 'getDataRekening']);

/*
====================
| Kalkulator Zakat |
====================
Digunakan di index.blade.php untuk mendapatkan respon hasil perhitungan kalkulasi zakat
*/
Route::post('/index-fitrah', [KalkulatorController::class, 'calcFitrah']);
Route::post('/index-maal', [KalkulatorController::class, 'calcMaal']);
Route::post('/index-fidyah', [KalkulatorController::class, 'calcFidyah']);
Route::post('/index-qurban', [KalkulatorController::class, 'calcQurban']);
Route::post('/index-infaq', [KalkulatorController::class, 'calcInfaq']);
Route::post('/index-penghasilan', [KalkulatorController::class, 'calcPenghasilan']);

/*
====================
| Postingan |
====================
Digunakan di untuk mendapatkan data post berdsarkan kategori dan id (detail postingan)
*/
Route::get('category/{slug}', [PostController::class, 'Post']);
Route::get('post/{id}', [PostController::class, 'detailPost']);

Route::get('kabar-zakat-detail/{id}', [KabarController::class, 'DetailKabarZakat']);
Route::get('kabar-zakat', [KabarController::class, 'KabarZakat']);
Route::get('kabar-zakat-detail/{id}', [KabarController::class, 'DetailKabarZakat']);
Route::get('artikel', [KabarController::class, 'Artikel']);
Route::get('article-detail/{id}', [KabarController::class, 'detailArtikel']);
Route::get('inspirasi', [KabarController::class, 'Inspirasi']);
Route::get('inspirasi-detail/{id}', [KabarController::class, 'detailInspirasi']);


/*
====================
| Client Post Route |
====================
Digunakan untuk mengirimkan data bayar zakat dan pesan pada fitur di Navigasi Bar
*/
Route::post('/bayar-zakat', [BerandaController::class, 'terimaBayarZakat']);
Route::post('/hubungi-kami', [MessageController::class, 'sendMessage']);

// Backend
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'storeLogin']);
Route::middleware('auth')->group(function () {
    Route::middleware('is.admin')->group(function () {
        Route::post('data-zis-ajax/', [AjaxController::class, 'getDataZisCategory']);
        Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {
            Route::get('logout', [AuthController::class, 'logout'])->name('logout');
            Route::get('/', [HomeController::class, 'index']);

            Route::get('category/', [AdmCategoryController::class, 'listCategoryPost']);
            Route::post('category/store', [AdmCategoryController::class, 'storeCategoryPost'])->name('store.category');
            Route::post('category/update', [AdmCategoryController::class, 'updateCategoryPost'])->name('update.category');
            Route::get('category/delete/{id}', [AdmCategoryController::class, 'destroyCategoryPost'])->name('destroy.category');

            Route::get('post/add', [AdminPostController::class, 'createPost'])->name('add.post');
            Route::post('post/store', [AdminPostController::class, 'storePost'])->name('store.post');
            Route::get('post/{slug}', [AdminPostController::class, 'listPost']);
            Route::get('post/edit/{id}', [AdminPostController::class, 'editPost']);
            Route::post('post/update/{id}', [AdminPostController::class, 'updatedPost']);
            Route::get('post/delete/{id}', [AdminPostController::class, 'destroyPost']);
            Route::get('post/status/{id}', [AdminPostController::class, 'statusPost']);

            Route::get('galeri', [AdmKabarController::class, 'indexGaleri'])->name('index.galeri');
            Route::get('galeri/add', [AdmKabarController::class, 'createGaleri'])->name('add.galeri');
            Route::post('galeri/store', [AdmKabarController::class, 'storeGaleri'])->name('store.galeri');
            Route::get('galeri/edit/{galeriID}', [AdmKabarController::class, 'editGaleri']);
            Route::post('galeri/update/{galeriID}', [AdmKabarController::class, 'updateGaleri']);
            Route::get('galeri/delete/{galeriID}', [AdmKabarController::class, 'destroyGaleri']);

            Route::get('dana-tersalurkan/', [BerandaController::class, 'editDanaTersalurkan']);
            Route::post('dana-tersalurkan/', [BerandaController::class, 'storeDanaTersalurkan']);

            Route::get('laporan-zis/', [BerandaController::class, 'indexLaporanZis']);
            Route::get('data-zis/edit/{id}', [BerandaController::class, 'editLaporanZis']);
            Route::post('data-zis/edit/{id}', [BerandaController::class, 'updateLaporanZis']);
            Route::get('data-zis/delete/{id}', [BerandaController::class, 'deleteLaporanZis']);

            Route::get('/layanan/rekening', [LayananController::class, 'indexLayananRekening']);
            Route::get('/layanan/rekening/add', [LayananController::class, 'addRekening']);
            Route::post('/layanan/rekening', [LayananController::class, 'storeRekening']);
            Route::get('/layanan/rekening/{rekID}/edit', [LayananController::class, 'editRekening']);
            Route::post('/layanan/rekening/{rekID}/edit', [LayananController::class, 'updateRekening']);
            Route::get('/layanan/rekening/{rekID}/delete', [LayananController::class, 'deleteRekening']);

            Route::get('/layanan/pembayaran', [LayananController::class, 'indexBayarZakat']);
            Route::get('/layanan/pembayaran/{transID}/status', [LayananController::class, 'updateStatusBayar']);

            Route::get('/pesan', [AdmMessageController::class, 'indexMessage']);
        });
    });
});
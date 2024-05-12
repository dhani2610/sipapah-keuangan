<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CatatanKeuanganController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DataSampahController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Models\Berita;
use App\Models\CatatanKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
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


Route::group(['middleware' => 'auth'], function () {

	Route::get('/', function () {
		if (Auth::user()) {
			return redirect('/login');
		}
	
	})->name('dashboard');

	Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');


	Route::get('/catatan-keuangan', [CatatanKeuanganController::class, 'index'])->name('catatan-keuangan');
	Route::post('/tambah-catatan-keuangan', [CatatanKeuanganController::class, 'store'])->name('tambah-catatan-keuangan');
	Route::post('/update-catatan-keuangan/{id}', [CatatanKeuanganController::class, 'update'])->name('update-catatan-keuangan');
	Route::get('/delete-catatan-keuangan/{id}', [CatatanKeuanganController::class, 'destroy'])->name('delete-catatan-keuangan');
	
	Route::get('/laporan-keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan-keuangan');
	Route::get('/download-excel', [LaporanKeuanganController::class, 'downloadExcel'])->name('download-excel');
	Route::get('/cetak', [LaporanKeuanganController::class, 'cetak'])->name('cetak');


    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-management', [InfoUserController::class, 'userManagement'])->name('user-management');
	Route::post('/tambah-user', [InfoUserController::class, 'tambahUser'])->name('tambah-user');
	Route::post('/update-user/{id}', [InfoUserController::class, 'updateUser'])->name('update-user');
	Route::get('/delete-user/{id}', [InfoUserController::class, 'deleteUser'])->name('delete-user');
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/login-post', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');
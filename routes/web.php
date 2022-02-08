<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home',[\App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['admin'])->group(function(){
        Route::get('admin', [AdminController::class, 'index']);
        Route::get('admin', [AdminController::class, 'admin']);
        Route::get('admin/inputdata', [AdminController::class, 'inputdata']);
        Route::get('admin/caridata', [AdminController::class, 'caridata']);
        Route::post('admin/simpandata', [AdminController::class, 'simpandata']);
        Route::get('admin/edit/{id}', [AdminController::class, 'editdata']);
        Route::post('admin/updatedata', [AdminController::class, 'updatedata']);
        Route::get('admin/hapus/{id}',[AdminController::class,'hapus']);
        Route::get('admin/datauser',[AdminController::class,'datauser']);
        Route::get('admin/hapususer/{id}',[AdminController::class,'hapususer']);
        Route::get('admin/inputfile',[AdminController::class,'inputfile']);
        Route::get('admin/datasertifikat',[AdminController::class,'tampilgambar']);
        Route::post('admin/simpangambar', [AdminController::class, 'store']);
        Route::get('admin/editfile/{id}', [AdminController::class, 'editfile']);
        Route::post('admin/updategambar/{id}', [AdminController::class, 'update']);
        Route::get('admin/hapusfile/{id}', [AdminController::class, 'destroy']);
        Route::get('admin/cetakdatakaryawan', [AdminController::class, 'cetakdatakaryawan']);
        Route::get('admin/cetakdatauser', [AdminController::class, 'cetakdatauser']);
        Route::get('admin/laporan', [AdminController::class, 'laporanabsensi']);
        Route::get('admin/cetaklaporanabsensi', [AdminController::class, 'cetaklaporanabsensi']);
    });

    Route::middleware(['user'])->group(function(){
        Route::get('user', [UserController::class, 'index']);
        Route::get('user/absenmasuk', [UserController::class, 'absenmasuk']);
        Route::post('user/simpanabsenmasuk', [UserController::class, 'dataabsenmasuk']);
        Route::get('user/absenkeluar', [UserController::class, 'absenkeluar']);
        Route::post('user/simpanabsenkeluar', [UserController::class, 'dataabsenkeluar']);
        Route::get('user/inputfile', [UserController::class, 'inputfile']);
        Route::post('user/simpanfile', [UserController::class, 'store']);
    });

    Route::get('/logout',function(){
        Auth::logout();
        redirect('/');
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RefUnitController;
use App\Http\Controllers\RefJabatanController;
use App\Http\Controllers\UraianPekerjaanController;
use App\Http\Controllers\UraianPekerjaanJabatanController;
use App\Http\Controllers\SkpTargetController;
use App\Http\Controllers\SkpRealisasiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeriodeController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function(){

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('pegawai', PegawaiController::class);
    Route::resource('ref_unit', RefUnitController::class);
    Route::resource('ref_jabatan', RefJabatanController::class);
    Route::resource('uraian_pekerjaan', UraianPekerjaanController::class);
    Route::resource('uraian_pekerjaan_jabatan', UraianPekerjaanJabatanController::class);
    Route::resource('skp_target', SkpTargetController::class);
    Route::resource('skp_realisasi', SkpRealisasiController::class);
    Route::resource('periode', PeriodeController::class);

});
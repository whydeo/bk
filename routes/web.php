<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\gurucontroller;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;


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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('guru', 'guruController')->middleware('ceklevel:bk');
Route::resource('Siswa', 'SiswaController')->middleware('ceklevel:bk');
Route::resource('Pembina', 'PembinaController')->middleware('ceklevel:bk');
Route::get('guru/show/{id}',[App\Http\Controllers\guruController::class, 'show'])->name('show');
Route::post('siswa/index',[App\Http\Controllers\SiswaController::class, 'import'])->name('import');
Route::post('Nilai/index',[App\Http\Controllers\NilaiController::class, 'import'])->name('imports');
Route::Post('Nilai/create',[App\Http\Controllers\NilaiController::class, 'nilairata'])->name('nilairata');
Route::get('siswa/index',[App\Http\Controllers\SiswaController::class, 'cari'])->name('cari');
Route::resource('Nilai', 'NilaiController')->middleware('ceklevel:guru,paspa,paspi');

Route::resource('admin', 'AdminController')->middleware('ceklevel:bk');
Route::get('carijurusan', [AdminController::class, 'carijurusan'])->name('carijurusan');
Route::get('carikelas', [AdminController::class, 'carikelas'])->name('carikelas');
Route::get('caribulan', [AdminController::class, 'caribulan'])->name('caribulan');
Route::get('carijk', [AdminController::class, 'carijk'])->name('carijk');
Route::get('nilairatas', [AdminController::class, 'nilairatas'])->name('nilairatas');

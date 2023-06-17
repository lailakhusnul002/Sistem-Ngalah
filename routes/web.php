<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AsramaController;
use App\Http\Controllers\ViolationaController;
use App\Models\Student;

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
    $jumlahsantri = Student::count();
    $jumlahsantrilelaki = Student::where('jeniskelamin','lelaki')->count();
    $jumlahsantriperempuan = Student::where('jeniskelamin','perempuan')->count();
    

    return view('welcome',compact('jumlahsantri','jumlahsantrilelaki','jumlahsantriperempuan'));
})->middleware('auth');

//Route Hak Akses Super Admin
Route::group(['middleware'=>['auth','hakakses:superadmin']], function(){
    Route::get('/santri',[StudentController::class, 'index'])->name('santri');
    Route::get('/dataasrama',[AsramaController::class, 'index'])->name('dataasrama');
});


//Route Data Santri
Route::get('/tambahsantri',[StudentController::class, 'tambahsantri'])->name('tambahsantri');
Route::post('/insertdata',[StudentController::class, 'insertdata'])->name('insertdata');
Route::get('/tampilkandata/{id}',[StudentController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}',[StudentController::class, 'updatedata'])->name('updatedata');
Route::get('/delete/{id}',[StudentController::class, 'delete'])->name('delete');

//export PDF
Route::get('/exportpdf',[StudentController::class, 'exportpdf'])->name('exportpdf');

//export PDF
Route::get('/exportexcel',[StudentController::class, 'exportexcel'])->name('exportexcel');


Route::post('/importexcel',[StudentController::class, 'importexcel'])->name('importexcel');


//Route Auth
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');


Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::post('/registeruser',[LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');




//Route Data Asrama
Route::get('/tambahasrama',[AsramaController::class, 'create'])->name('tambahasrama');
Route::post('/insertdataasrama',[AsramaController::class, 'store'])->name('insertdataasrama');


//Route Pelanggaran Asrama A
Route::get('/pelanggarana',[ViolationaController::class, 'index'])->name('pelanggarana')->middleware('auth');
Route::get('/tambahpelanggarana',[ViolationaController::class, 'tambahpelanggarana'])->name('tambahpelanggarana');
Route::post('/insertdatapelanggarana',[ViolationaController::class, 'insertdatapelanggarana'])->name('insertdatapelanggarana');
Route::get('/tampilkandatapelanggarana/{id}',[ViolationaController::class, 'tampilkandatapelanggarana'])->name('tampilkandatapelanggarana');
Route::post('/updatedatapelanggarana/{id}',[ViolationaController::class, 'updatedatapelanggarana'])->name('updatedatapelanggarana');

Route::get('/deletepelanggarana/{id}',[ViolationaController::class, 'delete'])->name('delete');
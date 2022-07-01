<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\loginController;
use GuzzleHttp\Middleware;

// login register
Route::get('/login',[loginController::class,'login'])->name('login');
Route::post('/loginUser',[loginController::class,'loginUser']);
Route::get('/register',[loginController::class,'register']);
Route::post('/registerUser',[loginController::class,'registerUser']);
Route::get('/logout',[loginController::class,'logout']);


// membuat hak akses terhadap admin
Route::group(['middleware'=>['auth','hakAkses:admin']],function(){
    // tampilan dashbord & data karyawan
Route::get('/pegawai',[EmployeeController::class,'index']);
Route::get('/tampildata/{id}',[EmployeeController::class,'tampildata']);
Route::post('/updatedata/{id}',[EmployeeController::class,'updatedata']);
Route::get('/dashbord', [EmployeeController::class,'dashbord']);
Route::get('/hapusdata/{id}',[EmployeeController::class,'hapusdata']);
});
// Route::group(['middleware'=>['auth','hakAkses:user']],function(){
// });
Route::get('/tambahData',[EmployeeController::class,'tambahData']);
Route::post('/insertData',[EmployeeController::class,'insertData']);
Route::get('/karyawan',[EmployeeController::class,'karyawan']);
// cetak pdf
Route::get('/cetakPDF',[EmployeeController::class,'cetakPDF']);








<?php

use App\Http\Controllers\ApkUserController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\pesanController;
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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/about', function () {
//     $nama = 'Edrico';
//     return view('about', ['nama' => $nama] );
// });





Route::get('/', [PageController::class, 'index']);



Route::get('/signup', [AuthController::class, 'registrasi']);
Route::get('/signupagen', [AuthController::class, 'registrasiagen']);
Route::post('/postregis', [AuthController::class, 'postregistrasi']);
Route::post('/postregisagen', [AuthController::class, 'postregistrasiagen']);

Route::get('/signin', [AuthController::class, 'login'])->name('signin');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/signout', [AuthController::class, 'logout']);
Route::get('/about', [PageController::class, 'about']);
//user edit profile
Route::get('/editprofile', [ApkUserController::class, 'indexprofile']);
Route::get('/editprofile/{id}/edit', [ApkUserController::class, 'editprofile']);
Route::get('/editprofile/{id}/editpass', [ApkUserController::class, 'editpassprofile']);
Route::patch('/editprofile/{id}/goedit', [ApkUserController::class, 'updateprofile']);
Route::patch('/editprofile/{id}/gopass', [ApkUserController::class, 'updatepassprofile']);





Route::group(['middleware' => ['auth','CheckRole:Admin']] , function(){
    
    //Route::get('/home', [PageController::class, 'home']);
    Route::get('/recommendation', [PageController::class, 'rekomendasi']);
    Route::post('/recommendation/result', [KriteriaController::class, 'recommendation']);
    

    //user manajemen
    Route::get('/user_management', [ApkUserController::class, 'index']);
    Route::post('/user_management/create', [ApkUserController::class, 'create'])->name('user_create');
    Route::delete('/user_management/{id}', [ApkUserController::class, 'destroy']);
    Route::get('/user_management/{id}/edit', [ApkUserController::class, 'edit']);
    Route::patch('/user_management/{id}', [ApkUserController::class, 'update']);

    //fasilitas
    Route::get('/fasilitas', [FasilitasController::class, 'index']);
    Route::get('/fasilitas/create', [FasilitasController::class, 'create']);
    Route::get('/fasilitas/{id}', [FasilitasController::class, 'show']);
    Route::post('/fasilitas', [FasilitasController::class, 'store']);
    Route::delete('/fasilitas/{id}', [FasilitasController::class, 'destroy']);
    Route::get('/fasilitas/{id}/edit', [FasilitasController::class, 'edit']);
    Route::patch('/fasilitas/{id}', [FasilitasController::class, 'update']);
});

Route::group(['middleware' => ['auth','CheckRole:Agen']] , function(){
    Route::get('/cari-listing', [PageController::class, 'cari_listing']);
    Route::get('/detail/{id}', [PageController::class, 'detail']);

    Route::get('/agen-recommendation', [PageController::class, 'rekomendasi']);
    Route::post('/agen-recommendation/result', [KriteriaController::class, 'recommendation']);

    //Pesan
    Route::get('/pesan', [pesanController::class, 'index']);
    Route::get('/pesan/{id}/view', [pesanController::class, 'view']);
    Route::delete('/pesan/{id}', [pesanController::class, 'destroy']);
    Route::post('/pesan/detail/{id}', [pesanController::class, 'userToagen']);
    
    //Pengunjung
    Route::get('/pengunjung', [PengunjungController::class, 'index']);
    Route::delete('/pengunjung/{id}', [PengunjungController::class, 'delete']);
    

    //listing
    Route::get('/listing', [listingController::class, 'index']);
    Route::get('/listing/create', [listingController::class, 'create'])->name('listing_create');
    Route::post('/listing', [ListingController::class, 'store']);
    Route::delete('/listing/{id}', [ListingController::class, 'destroy']);
    Route::get('/listing/{id}/edit', [listingController::class, 'edit']);
    Route::post('/listing/{id}/image', [listingController::class, 'image_delete']);
    Route::post('/listing/{id}', [listingController::class, 'update']);
});
Route::group(['middleware' => ['auth','CheckRole:User']] , function(){
    Route::get('/carilisting', [PageController::class, 'carilisting']);
    Route::get('/detail/{id}/list', [PageController::class, 'detail']);
    Route::post('/pesan/detail/{id}/list', [pesanController::class, 'userToagen']);

    Route::get('/user-recommendation', [PageController::class, 'rekomendasi']);
    Route::post('/user-recommendation/result', [KriteriaController::class, 'recommendation']);
});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardBookController;
use App\Http\Controllers\DashboardProfilController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CaroselController;
use App\Http\Controllers\CropGalleryController;
use App\Http\Controllers\CropImageController;

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
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('books', [BookController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/books', DashboardBookController::class)->middleware('auth');
Route::resource('/dashboard/categories', DashboardCategoryController::class)->middleware('auth');
Route::resource('/dashboard/profil', DashboardProfilController::class)->middleware('auth');

Route::resource('/gallery', GalleryController::class);

Route::resource('/carosel', CaroselController::class)->middleware('auth');

Route::get('/blog', [BlogController::class, 'index']);

Route::get('crop-image-upload', [CropImageController::class, 'index'])->middleware('auth');
Route::post('crop-image-upload', [CropImageController::class, 'uploadCropImage'])->middleware('auth');

Route::get('tambah-gambar', [CropGalleryController::class, 'index'])->middleware('auth');
Route::post('tambah-gambar', [CropGalleryController::class, 'uploadCropGallery'])->middleware('auth');
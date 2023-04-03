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

Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');
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
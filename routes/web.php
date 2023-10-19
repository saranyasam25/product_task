<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest');
Route::get('/forgot-password', function () {
    return view('auth.forgot_password');
})->middleware('guest');
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::post('/login-user', [LoginController::class, 'login']);
Route::post('/forgot-password', [LoginController::class, 'forgotPassword']);
Route::get('/user-logout', [LoginController::class, 'logout']);
Route::post('/register-form', [LoginController::class, 'store']);

Route::get('/dashboard', [ProductController::class, 'index'])->middleware('auth');
Route::get('/product-form', [ProductController::class, 'productAddForm'])->middleware('auth');
Route::get('/view-image', [ProductController::class, 'index'])->middleware('auth');
Route::post('/image-store', [ProductController::class, 'imageStore'])->middleware('auth')->name('image.store');
Route::post('/add-product', [ProductController::class, 'store'])->middleware('auth');
Route::get('/product-edit', [ProductController::class, 'edit'])->middleware('auth');
Route::POST('/update-product', [ProductController::class, 'update'])->middleware('auth');
Route::get('/delete-product', [ProductController::class, 'destroy'])->middleware('auth');
Route::get('/view-product/{id}', [ProductController::class, 'show'])->middleware('auth');


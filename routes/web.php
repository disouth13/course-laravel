<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome',function(){
    echo "Welcome Laravel";
});



Route::get('/welcome/{id}', function($id) {
    echo "Welcome Parameter $id";
});

Route::get('/show/{id}', function($id) {
    echo "Show Parameter $id";
});

Route::get('/edit/{nama}', function($nama) {
    echo "Welcome Parameter $nama";
})->where('nama','[a-z,A-Z]+');

Route::get('/index', function() {
    echo "<a href='".route('create')."'>Akses Create</a>";
});

Route::get('/create}', function() {
    echo "Route diakses dengan name";
})->name('create');

Route::get('/product', [ProdukController::class, 'index'])->name('index');
Route::get('/productshow', [ProdukController::class, 'productshow'])->name('show');
Route::get('/productshowall', [ProdukController::class, 'ProductShowAll'])->name('showAll');
Route::get('/productstore', [ProdukController::class, 'store']);
Route::get('/productupdate', [ProdukController::class, 'update']);
Route::get('/productdelete', [ProdukController::class, 'delete']);

//category
Route::get('/category', [CategoryController::class, 'index'])->name('category-index');
Route::get('/category-create', [CategoryController::class, 'create'])->name('category-create');
Route::post('/category-store', [CategoryController::class, 'store'])->name('category-store');
Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
Route::post('/category-update/{id}', [CategoryController::class, 'update'])->name('category-update');
Route::get('/category-destroy/{id}', [CategoryController::class, 'destroy'])->name('category-destroy');

Route::get('/user', [UserController::class, 'index']);


Route::resource('posts', PostController::class);
// Route::get('posts', [PostController::class, 'index'])->name('index');

Route::get('/halaman',function(){
    $title = 'Motor GP Mandalika';
    $konten = 'Indonesia berhasil menyelenggarakan MotoGP';
    return view('konten.halaman', compact('title', 'konten'));
});

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth-login', [LoginController::class, 'authenticate'])->name('auth-login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/store-register', [RegisterController::class, 'store'])->name('store-register');

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/administrator', [DashboardController::class, 'index'])->middleware('auth')->middleware('can:IsAdministrator');
Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth')->middleware('can:IsAdmin');
Route::get('/userbiasa', [DashboardController::class, 'index'])->middleware('auth')->middleware('can:IsUserBiasa');

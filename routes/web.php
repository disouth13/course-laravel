<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdukController;

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


Route::resource('posts', PostController::class);
// Route::get('posts', [PostController::class, 'index'])->name('index');

Route::get('/halaman',function(){
    $title = 'Motor GP Mandalika';
    $konten = 'Indonesia berhasil menyelenggarakan MotoGP';
    return view('konten.halaman', compact('title', 'konten'));
});

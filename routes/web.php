<?php
//ini adalah controller register
use App\Http\Controllers\RegisterController;
//ini adalah controller login
use App\Http\Controllers\LoginController;
//ini adalah controller home
use App\Http\Controllers\HomeController;
//ini adalah controller transaksi
Use App\Http\Controllers\TransaksiController;
//ini adalah controller barang
Use App\Http\Controllers\BarangController;
//ini adalah controller distributor
Use App\Http\Controllers\DistributorController;
//ini adalah controller merk
Use App\Http\Controllers\MerkController;
//ini adalah controller rayon
Use App\Http\Controllers\RayonController;
//ini adalah controller rombel
Use App\Http\Controllers\RombelController;
// ini adalah controller siswa
Use App\Http\Controllers\SiswaController;
//ini adalah  controller product
Use App\Http\Controllers\ProductController;


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

Route::get('/', function () {
    return view('auths.login');
});

// Route::get('index', function () {
//     return view('index');
// });

// ini adalah route menuju halaman siswa
Route::resource('products', ProductController::class);
Route::resource('siswas', SiswaController::class);
Route::resource('rombels', RombelController::class);
Route::resource('rayons', RayonController::class);
Route::resource('merks', MerkController::class);
Route::resource('distributors', DistributorController::class);
Route::resource('barangs', BarangController::class);
Route::resource('transaksis', TransaksiController::class);


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
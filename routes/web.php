<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogerController;
use App\Http\Controllers\UserController;
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

// metode nya get lalu masukkan namespace AuthController
// attribute name merupakan penamaan dari route yang kita buat
// kita tinggal panggil fungsi route(name) pada layout atau controller
Route::get('/', [AuthController::class,'index'])->name('login');
Route::get('login', [AuthController::class,'index'])->name('login');
Route::get('register', [AuthController::class,'register'])->name('register');
Route::post('proses_login', [AuthController::class,'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class,'logout'])->name('logout');

Route::post('proses_register',[AuthController::class,'proses_register'])->name('proses_register');

// kita atur juga untuk middleware menggunakan group pada routing
// didalamnya terdapat group untuk mengecek kondisi login
// jika user yang login merupakan bloger maka akan diarahkan ke blogerController
// jika user yang login merupakan user biasa maka akan diarahkan ke UserController
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:bloger']], function () {
        Route::get('dashboard', [BlogerController::class, 'index'])->name('dashboard');
        Route::delete('dashboard/{id}', [BlogerController::class, 'destroy'])->name('destroy');
        Route::get('dashboard/create', [BlogerController::class, 'create'])->name('create');
        Route::post('dashboard/store', [BlogerController::class, 'store'])->name('store');
        Route::get('dashboard/edit/{id}', [BlogerController::class, 'edit'])->name('edit');
        Route::put('dashboard/update/{id}', [BlogerController::class, 'update'])->name('update');
    });
    Route::group(['middleware' => ['cek_login:user']], function () {
        Route::get('blog', [UserController::class, 'index']);
        Route::get('blog/{id}', [UserController::class, 'show'])->name('detail');
    });
});

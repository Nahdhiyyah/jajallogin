<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BookController
};
use App\Http\Controllers\{
    UserController
};
use App\Http\Controllers\{
    PinjamController
};
use App\Http\Controllers\{
    BukuController
};

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
    return view('welcome');
});

//Route::resource('e_books', 'App\Http\Controllers\bookController');

Route::middleware('auth')->group(function () {
    // User only
    Route::middleware('role:2')->group(function () {
        Route::resource('e_books', BookController::class);
        Route::resource('users', UserController::class);
        Route::get('/kontak', function () {
            return view('kontak');
        });
        // Route::get('/historyPinjam', [PinjamController::class, 'index']);
        // Route::post('/tabelPinjam', [PinjamController::class, 'store']);
        // Route::get('/tabel', [PinjamController::class, 'create']);
        Route::resource('pinjam', PinjamController::class);
        Route::get('/baca', function () {
            return view('book');
        });
    });
    
    // Admin
    Route::middleware('role:1')->group(function () {
        // Route::get('/admin', function () {
        //     return view('admin');
        // })->name('admin');
        Route::resource('buku', BukuController::class);
        
    });
});

require __DIR__.'/auth.php';

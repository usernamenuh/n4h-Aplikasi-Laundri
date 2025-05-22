<?php

use Illuminate\Support\Facades\Route;
use App\Models\laundri;
use Illuminate\Support\Facades\Auth;
use App\Models\orders;
use App\Models\detail_transaksi;
use App\Models\layanan;
use App\Models\transaksi;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('laundri', App\Http\Controllers\LaundriController::class);
Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);
Route::resource('service', App\Http\Controllers\ServiceController::class);
Route::resource('detail_transaksi', App\Http\Controllers\DetailTransaksiController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('tampil', function () {
    $transaksis = transaksi::all();
    dd($transaksis->toArray());

});

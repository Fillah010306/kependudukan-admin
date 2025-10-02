<?php
use App\Http\Controllers\KependudukanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/adminpenduduk', [KependudukanController::class, 'index'])->name('kependudukan.index');
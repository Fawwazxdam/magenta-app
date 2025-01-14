<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/overview', function () {
    return view('overview.index');
})->middleware(['auth', 'verified'])->name('overview');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/overview', function () {
        return view('overview.index');
    })->name('overview');
    Route::get('/transaction', function () {
        return view('transaction.index');
    })->name('transaction');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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


Route::middleware('auth', 'verified')->group(function () {
    Route::get('/overview', function () {
        return view('overview.index');
    })->name('overview');

    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer');
        Route::get('/add', [CustomerController::class, 'create'])->name('customer.add');
        Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/show/{uuid}', [CustomerController::class, 'show'])->name('customer.show');
        Route::get('/edit/{uuid}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/update/{uuid}', [CustomerController::class, 'update'])->name('customer.update');
        Route::get('/delete/{uuid}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    });

    Route::prefix('employee')->group(function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('employee');
        Route::get('/add', [EmployeeController::class, 'create'])->name('employee.add');
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('/add', [ProductController::class, 'create'])->name('product.add');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/show/{uuid}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/edit/{uuid}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{uuid}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{uuid}', [ProductController::class, 'destroy'])->name('product.destroy');
    });

    Route::prefix('transaction')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('transaction');
        Route::get('/add', [TransactionController::class, 'create'])->name('transaction.add');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/add', [UserController::class, 'create'])->name('user.add');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

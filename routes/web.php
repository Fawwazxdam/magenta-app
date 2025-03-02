<?php

use App\Http\Controllers\CategoryController;
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
        Route::post('/store', [EmployeeController::class, 'store'])->name('employee.store');
        Route::get('/show/{uuid}', [EmployeeController::class, 'show'])->name('employee.show');
        Route::get('/edit/{uuid}', [EmployeeController::class, 'edit'])->name('employee.edit');
        Route::post('/update/{uuid}', [EmployeeController::class, 'update'])->name('employee.update');
        Route::get('/delete/{uuid}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
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

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::get('/add', [CategoryController::class, 'create'])->name('category.add');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/show/{uuid}', [CategoryController::class, 'show'])->name('category.show');
        Route::get('/edit/{uuid}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{uuid}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{uuid}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    Route::prefix('transaction')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('transaction');
        Route::get('/add', [TransactionController::class, 'create'])->name('transaction.add');
        Route::post('/store', [TransactionController::class, 'store'])->name('transaction.store');
        Route::get('/show/{uuid}', [TransactionController::class, 'show'])->name('transaction.show');
        Route::get('/edit/{uuid}', [TransactionController::class, 'edit'])->name('transaction.edit');
        Route::post('/update/{uuid}', [TransactionController::class, 'update'])->name('transaction.update');
        Route::get('/delete/{uuid}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
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

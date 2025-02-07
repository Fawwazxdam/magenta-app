<?php

use App\Http\Controllers\Api\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('customer')->group(function () {
    Route::get('/datatable', [CustomerController::class, 'getDatatable'])->name('api.customer.datatable');
    Route::post('/store', [CustomerController::class, 'store'])->name('api.customer.store');
});


Route::get('/proxy/provinces', function () {
    $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
    return response()->json($response->json());
})->name('api.provinces');

Route::get('/proxy/cities/{provinceID}', function ($provinceID) {
    $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/regencies/'.$provinceID.'.json');
    return response()->json($response->json());
})->name('api.province.cities');

Route::get('/proxy/districts/{regencyID}', function ($regencyID) {
    $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/districts/'.$regencyID.'.json');
    return response()->json($response->json());
})->name('api.province.city.districts');

Route::get('/proxy/villages/{districtID}', function ($districtID) {
    $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/villages/'.$districtID.'.json');
    return response()->json($response->json());
})->name('api.province.city.district.villages');

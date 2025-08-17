<?php

use Illuminate\Support\Facades\Route;

// Home
/*
Route::get('/', function () {
    return view('index');
});
*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Resource routes
Route::resource('exclusives', App\Http\Controllers\ExclusiveController::class)->parameters([
    'exclusives' => 'exclusive'
]);
Route::resource('categories', App\Http\Controllers\CategoryController::class);
Route::resource('pops', App\Http\Controllers\PopController::class);
Route::resource('variants', App\Http\Controllers\VariantController::class);

Route::resource('sales', App\Http\Controllers\SaleController::class);
Route::get('sales/create/{pop}', [App\Http\Controllers\SaleController::class, 'create'])->name('sales.create');


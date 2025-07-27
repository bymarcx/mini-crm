<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::get('/customers/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');

Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::delete('/customers/{id}', [CustomerController::class, 'delete'])->name('customers.delete');
Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
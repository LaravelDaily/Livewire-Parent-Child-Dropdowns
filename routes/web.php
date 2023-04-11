<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TomSelectController;
use App\Http\Controllers\VirtualSelectController;

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
    return view('home');
})->name('home');

Route::view('country-product', 'country-product')->name('country-product');
Route::view('create-order', 'create-order')->name('create-order');

Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');

Route::get('virtual-select-orders', [VirtualSelectController::class, 'index'])->name('virtual-select.index');
Route::view('virtual-select', 'virtualselect.create-virtual-select')->name('virtual-select.create');
Route::view('virtual-select/{order}/edit', 'virtualselect.edit-virtual-select')->name('virtual-select.edit');

Route::get('tom-select-orders', [TomSelectController::class, 'index'])->name('tom-select.index');
Route::view('tom-select', 'tomselect.create-tom-select')->name('tom-select.create');
Route::view('tom-select/{order}/edit', 'tomselect.edit-tom-select')->name('tom-select.edit');

Route::get('users', [UserController::class, 'index'])->name('users.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

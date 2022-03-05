<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::view('/', 'dashboard')->name('dashboard');
    Route::view('/profile', 'profile')->name('profile.index');
    Route::put('/profile-update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/billing', [BillingController::class, 'index'])->name('billing.index');
    Route::get('/checkout/{billing_id}', [BillingController::class, 'checkout'])->name('billing.checkout');
});














require __DIR__.'/auth.php';

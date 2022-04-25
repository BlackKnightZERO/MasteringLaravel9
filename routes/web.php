<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryRmbController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsfeedController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;

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

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'dashboard')->name('dashboard');                                                       //  view-load
    Route::view('/dashboard', 'dashboard')->name('dashboard');                                                       //  view-load
    Route::view('/profile', 'backend.profile.index')->name('profile.index');                                // load-auth-data
    Route::put('/profile-update', [ProfileController::class, 'update'])->name('profile.update');            // request-only-request-class
    
    Route::get('/billing', [BillingController::class, 'index'])->name('billing.index');                     // fractional-value-as-int
    Route::get('/checkout/{billing_id}', [BillingController::class, 'checkout'])->name('billing.checkout'); 

    Route::resource('/category-rmb', CategoryRmbController::class)->name('*', 'category-rmb');
    Route::resource('/product', ProductController::class)->name('*', 'product');

    Route::get('/newsfeed', NewsfeedController::class)->name('newsfeed');
    
    Route::resource('/comment', CommentController::class)->name('*', 'comment');
    
    Route::resource('/post', PostController::class)->name('*', 'post');
});














require __DIR__.'/auth.php';

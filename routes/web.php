<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FaqController;



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

Route::get('/', [IndexController::class,'index'])->name('home');

// Route::get('/admin', function(){
//     return view('admin.home');
// });




Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class,'index'])->name('admin.home');
    Route::get('/addfood', [AdminController::class, 'create'])->name('admin.addfood');
    Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');

    Route::get('/approveOrder/{order_id}', [OrderController::class, 'approveOrder'])->name('admin.approveOrder');
    
    Route::post('/faqStore', [FaqController::class, 'store'])->name('faq.store');
    Route::get('/faqDelete/{id}', [FaqController::class, 'destroy'])->name('faq.delete');

    
});


Route::middleware('auth')->prefix('order')->group(function () {
    Route::get('/orderform/{id}', [OrderController::class, 'create'])->name('order.orderform');
    Route::POST('/store/{user_id}/{food_id}', [OrderController::class, 'store'])->name('order.store');
    Route::get('/mybag/{user_id}', [OrderController::class, 'index'])->name('order.mybag');
    Route::get('/editorder/{id}', [OrderController::class, 'edit'])->name('order.editorder');
    Route::put('/update/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::get('/delete/{id}', [OrderController::class, 'destroy'])->name('order.delete');


    Route::get('/checkout/{user_id}', [CheckoutController::class, 'create'])->name('order.checkoutform');
    Route::POST('/checkoutStore/{user_id}', [CheckoutController::class, 'store'])->name('order.checkoutStore');
    Route::get('/orderlist/{user_id}', [CheckoutController::class, 'index'])->name('order.orderlist');
    Route::get('/cancle/order/{order_id}', [CheckoutController::class, 'destroy'])->name('order.cancelOrder');
    Route::get('/delete/order/{id}', [CheckoutController::class,'delete'])->name('order.checkout_delete');

    
});


Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/faq', [FaqController::class, 'index'])->name('user.faq');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Route::prefix('test')->group(function () {
//     Route::get('/index', [testController::class, 'index'])->name('test.index');
//     Route::get('/formDisplay', [testController::class, 'create'])->name('test.create');
//     Route::post('/formStore', [testController::class, 'store'])->name('test.formStore');
//     Route::get('/formEdit/{id}', [testController::class, 'edit'])->name('test.editform');
//     Route::put('/formUpdate/{id}', [testController::class, 'update'])->name('test.update');
//     Route::get('/delete/{id}', [testController::class, 'destroy'])->name('test.delete');
// });

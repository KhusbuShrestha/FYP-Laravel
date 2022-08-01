<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OurTeamController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Api\OrderController as ApiOrderController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('view', [FrontendController::class, 'front']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('vendor', VendorController::class);
Route::resource('order', OrderController::class);
Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('about', AboutUsController::class);
Route::resource('contact', ContactUsController::class);
Route::resource('shipping', ShippingController::class);
Route::resource('team', OurTeamController::class);

// Route::get('allRestaurant',[ApiOrderController::class,'allRestaurant']);
Route::resource('allOrders', OrderController::class);
Route::get('orderDescription/{id}', [OrderController::class, 'detailOfOrder']);
Route::get('producer', [VendorController::class, 'producer']);

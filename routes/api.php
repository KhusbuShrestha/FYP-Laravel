<?php

use App\Http\Controllers\Admin\OurTeamController;
use App\Http\Controllers\Api\AboutUsController as ApiAboutUsController;
use App\Http\Controllers\Api\AddressDelivery;
use App\Http\Controllers\Api\AddressDeliveryController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController as ApiCategoryController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\DelAddress;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OurTeamController as ApiOurTeamController;
use App\Http\Controllers\Api\ProducerController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\ShippingController;
use App\Http\Controllers\Api\VendorController;
use App\Http\Controllers\Api\WishlistController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Resources\UserResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    // return UserResource::collection($request->user());


});

Route::post('register', [AuthController::class, 'register']);
Route::post('logIn', [AuthController::class, 'logIn']);
Route::apiResource('categories', ApiCategoryController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('about_us', ApiAboutUsController::class);
Route::apiResource('contacts', ContactUsController::class);
Route::apiResource('teams', ApiOurTeamController::class);
Route::apiResource('shippings', ShippingController::class);
Route::apiResource('front', FrontendController::class);
Route::get('recentlyProducts', [ProductController::class, 'recentlyProducts']);
Route::get('increaseOrder/{id}', [ProductController::class, 'productInInc']);
Route::get('decreaseOrder/{id}', [ProductController::class, 'productInDec']);
Route::get('topRated', [RatingController::class, 'topRated']);
// Route::apiResource('ratings', RatingController::class);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('vendors', VendorController::class);
    Route::apiResource('producer', ProducerController::class);
    Route::apiResource('cart', CartController::class);
    Route::apiResource('orders', OrderController::class);
    Route::get('cartTotal', [CartController::class, 'cartTotal']);
    Route::get('userOd/{id}', [OrderController::class, 'userOrderDescription']);
    Route::apiResource('ratings', RatingController::class);
    Route::get('averageRating/{id}', [RatingController::class, 'averageRating']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('productSearch/{word}', [ProductController::class, 'productSearch']);
    Route::delete('destroyCart', [CartController::class, 'destroyCart']);
    Route::apiResource('wishlist', WishlistController::class);
    Route::apiResource('delAddress', AddressDeliveryController::class);
    Route::get('mosltySelling', [OrderController::class, 'mostlySelling']);
});

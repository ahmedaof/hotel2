<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\controllers\api\HotelController;
use App\Http\Controllers\controllers\api\LocationController;
use App\Http\Controllers\controllers\api\RoomController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/signup', [AuthController::class, 'signup']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
});
Route::post('/room', [RoomController::class, 'store']);
Route::get('/room', [RoomController::class, 'index']);

Route::post('/location', [LocationController::class, 'store']);
Route::get('/location', [LocationController::class, 'index']);


Route::post('/hotel', [HotelController::class, 'store']);
Route::get('/hotel', [HotelController::class, 'index']);


Route::post('/logout', [HotelController::class, 'logout']);
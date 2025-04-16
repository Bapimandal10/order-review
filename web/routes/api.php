<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewTypeController;

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

Route::get('/', function () {
    return "Hello API";
});

Route::POST('setting-save', [SettingController::class, 'store'])->middleware('shopify.auth');
Route::get('test/{order_id}',[OrderController::class, 'get_order'])->name('order');
Route::post('/review-submit',[OrderController::class, 'review_submit'])->name('review.submit');
Route::get('fetch-setting',[SettingController::class, 'showData'])->middleware('shopify.auth');
Route::POST('reviewtype-save',[ReviewTypeController::class, 'store'])->middleware('shopify.auth');
Route::get('fetch-review-types',[ReviewTypeController::class, 'list'])->middleware('shopify.auth');
Route::delete('delete-review-types/{reviewType}',[ReviewTypeController::class, 'delete'])->name('order');






<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\RoomController;
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


Route::apiResource('/chats', ChatController::class)->only([
    'index', 'store'
]);
Route::apiResource('/rooms', RoomController::class)->only([
    'index', 'show'
]);

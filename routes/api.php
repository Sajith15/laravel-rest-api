<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;

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

Route::get('list/{id?}',[DeviceController::class, 'list']);

Route::get('search/{name?}',[DeviceController::class, 'search']);

Route::get('count/{name?}',[DeviceController::class, 'count']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('add',[DeviceController::class, 'add']);

Route::put('update',[DeviceController::class, 'update']);

Route::delete('delete',[DeviceController::class, 'delete']);
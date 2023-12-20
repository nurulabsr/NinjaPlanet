<?php

use App\Http\Controllers\AirbusController;
use App\Http\Controllers\ProductHomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [AirbusController::class, 'HomePage']);

Route::group(['prefix' => 'airbus'], function(){
  Route::get('/create', [AirbusController::class, 'createAirbusData']);

});
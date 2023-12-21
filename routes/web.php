<?php

use App\Http\Controllers\AirbusController;
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
// Route::get('/', [AirbusController', 'HomePage']);
Route::get('/edit/{id}', [AirbusController::class, 'EditAirbusData'])->name('airbus.edit');
Route::get('/update/{id}', [AirbusController::class, 'UpdateAirBusData'])->name('airbus.update');
Route::get('/create', [AirbusController::class, 'createAirbusData'])->name('create');
Route::post('/post', [AirbusController::class, 'StoreAirBusData'])->name('airbus.store');

Route::group(['prefix' => 'airbus'], function(){
  

});
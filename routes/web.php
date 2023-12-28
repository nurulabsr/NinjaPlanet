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
Route::get('/create', [AirbusController::class, 'createAirbusData'])->name('create');
Route::post('/post', [AirbusController::class, 'StoreAirBusData'])->name('airbus.store');

Route::get('/edit/{id}', [AirbusController::class, 'EditAirbusData'])->name('airbus.edit');
Route::match(['get', 'put'], '/update/{id}', [AirbusController::class, 'UpdateAirBusData'])->name('airbus.update');

Route::delete('delete/{id}', [AirbusController::class, 'DeleteAirbusData'])->name('airbus.delete');

// Route::group(['prefix' => 'airbus'], function(){
  

// });



// Route::group(['middleware' => 'test2'], function(){
//     Route::get('test/', [AirbusController::class, 'Hello']);

// });

Route::get('404/', [ProductHomeController::class, 'Notfound404'])->name('404');
Route::get('hello/', [AirbusController::class, 'Hello']);
Route::get('test/', [AirbusController::class, 'TestFunction']);
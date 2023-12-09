<?php

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

Route::get('/', function () {
    return view('welcome');
});


/// Group Route 
Route::group(['prefix' => 'product'], function(){
     Route::get('/', function(){
       return view('HomeProduct');
     });

     Route::get('/airbus', function(){
        return view('Airbus');
     });
});
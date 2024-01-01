<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirbusController;
use App\Http\Controllers\ProductHomeController;

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
Route::get('/', [ProductHomeController::class, 'HomePage']);

// Route::group(['prefix' => 'airbus'], function(){
    
    
    // });
    
    // Route::group(['middleware' => 'test2'], function(){
        //     Route::get('test/', [AirbusController::class, 'Hello']);
        
        // });



        
Route::group(['middleware' => 'auth'], function(){
Route::get('/create', [AirbusController::class, 'createAirbusData'])->name('create');
Route::post('/post', [AirbusController::class, 'StoreAirBusData'])->name('airbus.store');
Route::get('/edit/{id}', [AirbusController::class, 'EditAirbusData'])->name('airbus.edit');
Route::match(['get', 'put'], '/update/{id}', [AirbusController::class, 'UpdateAirBusData'])->name('airbus.update');

Route::delete('delete/{id}', [AirbusController::class, 'DeleteAirbusData'])->name('airbus.delete');
Route::get('session', [ProductHomeController::class, 'retriveSession']);
Route::get('storeSession', [ProductHomeController::class, 'storingSession']);
Route::get('deleteSession', [ProductHomeController::class, 'deleteSession']);
Route::get('deleteSession_v2', [ProductHomeController::class, 'deleteSession_Version2']);
Route::get('test2', [ProductHomeController::class, 'Test2']);
Route::get('test3/', [ProductHomeController::class, 'TestThree']);
Route::get('404/', [ProductHomeController::class, 'Notfound404'])->name('404');
Route::get('hello/', [AirbusController::class, 'Hello']);
Route::get('test/', [AirbusController::class, 'TestFunction']);
Route::get('testThree/', [ProductHomeController::class, 'TestThree3']);
Route::get('test4/', [ProductHomeController::class, 'TestFour']);

//Route

Route::get('userdata', [ProductHomeController::class, 'ShowUserData'])->name('userdata.test');
Route::get('updateUserData/{id}', [ProductHomeController::class, 'UpdateUserData'])->name('updateUserData.test');
Route::put('user/{id}', [ProductHomeController::class, 'UpdateUserAndStore'])->name('user.updateand.store');
Route::delete('delete/{id}', [ProductHomeController::class, 'DeleteUserData'])->name('deleteUser.test');
});






// Working with Cache 
Route::get('homePaginatorErr', [ProductHomeController::class, 'HomeWithoutPaginator']);
Route::get('home', [ProductHomeController::class, 'Home']);
Route::get('profilea', [ProductHomeController::class, 'UserData'])->name('profile.data');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

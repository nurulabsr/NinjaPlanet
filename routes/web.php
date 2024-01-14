<?php
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirbusController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FruitController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductHomeController;
use App\Http\Controllers\RussianLanguageController;
use App\Models\Post;

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
Route::get('/', [ProductHomeController::class, 'HomePage'])->name('home.airbus'); //->middleware('auth');
Route::get('post/create', [PostController::class, 'CreatePost'])->name('post.create');
Route::post('post/store', [PostController::class, 'StorePost'])->name('post.store');
Route::get('post/category/create', [PostController::class, 'CreateCategoryPost'])->name('post.category.create');
Route::post('post/category/store', [PostController::class, 'StoreCategoryPost'])->name('post.category.store');

Route::get('book/create', [BookController::class, 'CreateBookData'])->name('book.create')->middleware('auth');
Route::post('book/store', [BookController::class, 'StoreBookData'])->name('book.store')->middleware('auth');
Route::get('book/category/create/', [BookController::class, 'CreateBookCategoryData'])->name('book.category.create')->middleware('auth', CheckUserRole::class . ':2');
Route::post('book/category/store', [BookController::class, 'StroreBookCategoryData'])->name('booke.category.store')->middleware('auth', CheckUserRole::class . ':2');

Route::get('russian/language/vocabulary', [RussianLanguageController::class, 'WriteLanguageVocabulary'])->name('write.russian.vocabulary');
Route::post('russian/language/storevocabulary', [RussianLanguageController::class, 'StoreLanguageVocabulary'])->name('store.russian.vocabulary');
Route::get('russianlanguage/category/create', [RussianLanguageController::class, 'CreateRussianLanguage'])->name('russian.language.category');
Route::post('russian/language/category', [RussianLanguageController::class, 'StoreRusssianLanguageCategory'])->name('russian.language.category.store')->middleware('auth', CheckUserRole::class . ':2');
Route::get('message', [RussianLanguageController::class, 'MessageFunction'])->name('message');

Route::get('fruit/create', [FruitController::class, 'CreateFruitDetails'])->name('fruit.detail.create');
Route::post('fruit/store', [FruitController::class, 'StoreFruitDetails'])->name('fruit.detail.store');
Route::get('fruit/tag', [FruitController::class, 'CreateTag'])->name('fruit.tag.create');
Route::post('fruit/tag/store', [FruitController::class, 'StoreTag'])->name('fruit.tag.store');

Route::group(['middleware' => 'auth'], function(){
Route::get('/create', [AirbusController::class, 'createAirbusData'])->name('create');
Route::post('/post', [AirbusController::class, 'StoreAirBusData'])->name('airbus.store');
Route::get('/edit/{id}', [AirbusController::class, 'EditAirbusData'])->name('airbus.edit');
Route::match(['get', 'put'], '/update/{id}', [AirbusController::class, 'UpdateAirBusData'])->name('airbus.update');
Route::delete('airbus/delete/{id}', [AirbusController::class, 'DeleteAirbusData'])->name("airbus.deletedata");

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

Route::get('userdata', [ProductHomeController::class, 'ShowUserData'])->name('userdata.test')->middleware(CheckUserRole::class . ':2');
Route::get('updateUserData/{id}', [ProductHomeController::class, 'UpdateUserData'])->name('updateUserData.test');
Route::put('user/{id}', [ProductHomeController::class, 'UpdateUserAndStore'])->name('user.updateand.store');
Route::delete('delete/{id}', [ProductHomeController::class, 'DeleteUserData'])->name('deleteUser.test');
Route::get('userdetail/{id}', [ProductHomeController::class, 'UserDetail'])->name('user.detail.test');
Route::get('user/role/create', [ProductHomeController::class, 'CreateUserRole'])->name('user.role.create');
Route::post('user/role/store', [ProductHomeController::class, 'StoreUserRole'])->name('user.role.store');
});




// Working with Cache
Route::get('homePaginatorErr', [ProductHomeController::class, 'HomeWithoutPaginator'])->middleware('auth');
Route::get('home', [ProductHomeController::class, 'Home'])->middleware('auth');
Route::get('profilea', [ProductHomeController::class, 'UserData'])->name('profile.data')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

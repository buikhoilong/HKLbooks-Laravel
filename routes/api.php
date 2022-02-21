<?php

//use App\Http\Controllers\API\AccountsAPIController;
use App\Http\Controllers\AccountsAPIController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\APIsController;
use App\Http\Controllers\BooksAPIController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Models\Account;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/book')->group(function () {
    Route::get('/', [APIsController::class, 'getAllBooks']);
});

// Route::get('/account/{email}&{password}',[AccountsController::class,'getAccountByEmail']);

Route::prefix('/account')->group(function () {
    Route::get('/{Id}', [APIsController::class, 'getAccount']);
    Route::post('/login', [APIsController::class, 'login']);
    Route::post('/register',[APIsController::class,'register']);
    Route::post('/update',[APIsController::class,'updateAccount']);
});

Route::prefix('/favourite')->group(function () {
    Route::get('/', [APIsController::class, 'getAllFavouritesBooksByAccountId']);
    Route::get('/getAllBooksByFavourite',[APIsController::class,'getAllBooksByFavourite']);
    Route::get('check/{$BookId}&{$AccountId}',[APIsController::class,'getAllBooksByFavourite']);
});

// Route::group(['middleware' => ['auth:sanctum']],function () {
//     Route::get('/',[BooksController::class,'getAllBooksAPI'])->name('api_all_book');
// });

Route::post('/login',[AuthController::class],'index');


// Route::prefix('/book')->group(function () {
//     // danh sách sản phẩm
//     Route::get('/',[BooksController::class,'getAllBooksAPI'])->name('api_all_book');

//     Route::get('/{Id}',[BooksController::class,'getIdBooksAPI'])->name('api_id_book');
// });




Route::prefix('/promote')->group(function () {
    Route::get('/',[APIsController::class,'getAllPromoteTypes']);
    Route::get('/allBooksByPromoteId/{Id}',[APIsController::class,'getAllBooksByPromotesId']);
});

Route::prefix('/category')->group(function () {
    Route::get('/',[APIsController::class,'getAllCategories']);
    Route::get('/getAllBooksByCategoryId/{Id}',[APIsController::class,'getAllBooksByCategoryId']);
});
Route::prefix('/cart')->group(function () {
    Route::get('/',[APIsController::class,'getAllCartByAccountId']);
    //Route::get('/getAllBooksByCategoryId/{Id}',[APIsController::class,'getAllBooksByCategoryId']);
});
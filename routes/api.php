<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
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



// Route::group(['middleware' => ['auth:sanctum']],function () {
//     Route::get('/',[BooksController::class,'getAllBooksAPI'])->name('api_all_book');
// });



Route::post('/login',[AuthController::class],'index');


// Route::prefix('/book')->group(function () {
//     // danh sách sản phẩm
//     Route::get('/',[BooksController::class,'getAllBooksAPI'])->name('api_all_book');

//     Route::get('/{Id}',[BooksController::class,'getIdBooksAPI'])->name('api_id_book');
// });





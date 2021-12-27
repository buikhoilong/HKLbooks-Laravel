<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProductsController;
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




// Route::get('/',[ProductsController::class,'getAll'])->name('index_product');

Route::get('/',[BooksController::class,'getAllBooks'])->name('index_product');



//add
Route::get('/add',[ProductsController::class,'addProduct1'])->name('add_product');
Route::post('/add',[ProductsController::class,'addProduct'])->name('add_product');

//detail

Route::get('/detail/{id?}',[ProductsController::class,'detaiProduct'])->name('detail_book');




// Route::get('list',[ProductsController::class,'getAll']);

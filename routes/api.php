<?php

//use App\Http\Controllers\API\AccountsAPIController;
use App\Http\Controllers\AccountsAPIController;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\APIsController;
use App\Http\Controllers\BooksAPIController;
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
    Route::get('/{email}&{password}', [AccountsController::class, 'getAccountByEmail']);
    Route::post('/login', [APIsController::class, 'login']);
    Route::post('/register',[APIsController::class,'register']);
});

Route::prefix('/promote')->group(function () {
    Route::get('/',[APIsController::class,'getAllPromoteTypes']);
    Route::get('/allBooksByPromoteId/{Id}',[APIsController::class,'getAllBooksByPromotesId']);
});


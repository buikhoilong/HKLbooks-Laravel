<?php

use App\Http\Controllers\AccountsController;
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
    Route::get('/', [BooksController::class, 'getAllBooksAPI']);
});

// Route::get('/account/{email}&{password}',[AccountsController::class,'getAccountByEmail']);

Route::prefix('/account')->group(function () {
    Route::get('/{email}&{password}', [AccountsController::class, 'getAccountByEmail']);
    Route::post('/login', [AccountsController::class, 'loginApp']);
    Route::post('/register',[AccountsController::class,'register']);
});

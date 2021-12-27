<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',function(){
    return view('Admin.index');
});




Route::get('login',function(){
    return view('Admin.page.login');
});

Route::get('foget',function(){
    return view('Admin.page.foget');
});

Route::get('register',function(){
    return view('Admin.page.register');
});




Route::prefix('books')->group(function () {
    Route::get('/', function () {
        return view('Admin.book.index_book');
    });
    
    Route::post('/add', function () {
        return view('Admin.book.add_book');
    });
});



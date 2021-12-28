<?php
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProductsController;
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


Route::prefix('/book')->group(function () {
    // danh sách sản phẩm
    Route::get('/',[BooksController::class,'getAllBooks'])->name('index_books');
    //thêm sản phẩm
    Route::get('/add',[BooksController::class,'getAddBook'])->name('add_book');
    Route::post('/add',[BooksController::class,'postAddBook'])->name('add_book');
    // chi tiết sản phẩm
    Route::get('/detail/{Id?}',[BooksController::class,'detailBook'])->name('detail_book');
    //Chỉnh sửa sản phẩm
    Route::get('/edit/{Id?}',[BooksController::class,'getUpdateBook'])->name('edit_book');
    Route::post('/update/{Id?}',[BooksController::class,'patchUpdateBook'])->name('update_book');
    //Xóa sản phẩm
    Route::get('/delete/{Id?}',[BooksController::class,'deleteBook'])->name('delete_book');
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
<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

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

Route::get('/',[LoginController::class,'getLogin'])->name('login');

Route::get('/home',[HomeController::class,'index'])->name('home')->middleware('adminrole');  


// Route::get('admin/login',[LoginController::class,'getLogin'])->name('login');
Route::post('admin/post',[LoginController::class,'postLogin'])->name('postLogin');
    
    Route::prefix('/admin')->middleware('adminrole')->group(function () {

    Route::get('admin/logout',[LoginController::class,'logout'])->name('logout');

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
            Route::post('/update',[BooksController::class,'patchUpdateBook'])->name('update_book');
            //Xóa sản phẩm
            Route::get('/delete/{Id?}',[BooksController::class,'deleteBook'])->name('delete_book');
        });

        Route::prefix('/account')->group(function () {
            // danh sách sản phẩm
            Route::get('/',[AccountsController::class,'getAllAccounts'])->name('index_account');
            //thêm sản phẩm
            Route::get('/add',[AccountsController::class,'getAddAccount'])->name('add_account');
            Route::post('/add',[AccountsController::class,'postAddAccount'])->name('add_account');
            // chi tiết sản phẩm
            Route::get('/detail/{Id?}',[AccountsController::class,'detailAccount'])->name('detail_account');
            // //Chỉnh sửa sản phẩm
            Route::get('/edit/{Id?}',[AccountsController::class,'getUpdateAccount'])->name('edit_account');
            Route::post('/update/{Id?}',[AccountsController::class,'postUpdateAccount'])->name('update_account');
            // //Xóa sản phẩm
            Route::get('/delete/{Id?}',[AccountsController::class,'deleteAccount'])->name('delete_account');
            // profile 
            Route::get('/profile',[AccountsController::class,'profile'])->name('profile');
        });

        Route::prefix('/category')->group(function () {
            // danh sách sản phẩm
            Route::get('/',[CategoriesController::class,'getAllCategory'])->name('index_category');
            //thêm sản phẩm
            Route::get('/add',[CategoriesController::class,'getAddCategory'])->name('add_category');
            Route::post('/add',[CategoriesController::class,'postAddCategory'])->name('add_category');
            //Chỉnh sửa sản phẩm
            Route::get('/edit/{Id?}',[CategoriesController::class,'getUpdateCategory'])->name('edit_category');
            Route::post('/update',[CategoriesController::class,'postUpdateCategory'])->name('update_category');
            //Xóa sản phẩm
            Route::get('/delete/{Id?}',[CategoriesController::class,'deleteCategory'])->name('delete_category');
            // cập nhật trạng thái
            Route::get('/update_delete/{Id?}',[CategoriesController::class,'getUpdateDeleteCategory'])->name('edit_delete_category');
            Route::get('/post_update_delete/{Id?}',[CategoriesController::class,'postUpdateDeleteCategory'])->name('update_delete_category');
        });
        
    });



    
    


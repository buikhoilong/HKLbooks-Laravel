<?php

namespace App\Http\Controllers;
use Illuminate\Http\UploadedFile; 
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    
    function getAll(){
        $product = Product::all();
        return view('Admin.book.index_book',compact('product'));
    }

    function addProduct1(){
        return view('Admin.book.add_book');
    }

    function addProduct(Request $req){
        $book = new Product;
        $book->name = $req->tentxt;
        $book->price = $req->soluongtxt;
        $book->quantity = $req->giatxt;
        $nameImg = $req->file('imagetxt')->getClientOriginalName(); // lấy tên của ảnh từ hệ thống
        $book->image = $nameImg; // gán giá trị cho database 
        $req->imagetxt->storeAs('admin/images', $nameImg); // lưu hình ảnh vào trong đường dẫn,storeAs() tham số thứ 3 mặc định là public 
        $book->save();
        return redirect()->route('index_product');
    }

    function detaiProduct($id){
        $product = Product::find($id);
        return view('Admin.book.detail_book', compact('product'));
    }
}


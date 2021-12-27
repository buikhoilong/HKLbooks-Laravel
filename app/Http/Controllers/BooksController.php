<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categorie;
use App\Models\Categories;
use App\Models\Category;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class BooksController extends Controller
{
    function getAllBooks(){
        $books = Book::all();
        return view('Admin.book.index_book',compact('books'));
    }
    
    function countbook(){
        $books = new Book;
        $count = $books->count()+1;
        $chuoiID = $count;
        if($count > 9){
            $chuoiID = '00'.$count;
            if($count > 99){
                $chuoiID = '0'.$count;
                if($count > 999){
                    $chuoiID = $count;
                }
            }
        }
        return $chuoiID;
    }

    function getAddBook(){
        $categories = Categories::all();
        $books = new Book;

       
        return view('Admin.book.add_book',compact('categories'));
    }

    function postAddBook(Request $request){
        $books = new Book;
        $datetime = Date('Ymd');
        $count = $books->count()+1;
        $chuoiID = $count;
        if($count > 0){
            $chuoiID = '000'.$count;
            if($count > 9){
                $chuoiID = '00'.$count;
                if($count > 99){
                    $chuoiID = '0'.$count;
                    if($count > 999){
                        $chuoiID = $count;
                    }
                }
            }
        }
        $countt = $chuoiID;
        $books->Id = 'BOOK'.$datetime.$countt;
        $books->Name = $request->tentxt;
        $books->Price = $request->giatxt;
        $books->Stock = $request->soluongtxt;
        $books->Detail = $request->motatxt;
        $books->Author = $request->tacgiatxt;
        $books->Publisher = $request->nhaxuatbantxt;
        $books->ImgPath = $request->imagetxt;
        $books->CategoryId = $request->theloaitxt;
        $books->Status = 1; 
        $books->SaleOff = null; 
        $books->SaleOffStart = null; 
        $books->SaleOffEnd = null; 
        $nameImg = $request->file('imagetxt')->getClientOriginalName(); // lấy tên của ảnh từ hệ thống
        $books->ImgPath = $nameImg; // gán giá trị cho database 
        $request->imagetxt->storeAs('admin/images/books', $nameImg,'public'); // lưu hình ảnh vào trong đường dẫn,storeAs() tham số thứ 3 mặc định là public 
        $books->save();
        return redirect()->route('index_books');
    }

    function getAllBooksAPI(){
        $books = Book::all();
        return response()->json($books,200);
    }

    
}

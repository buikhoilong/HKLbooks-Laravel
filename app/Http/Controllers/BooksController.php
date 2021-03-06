<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categories;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BooksController extends Controller
{
    public function getAllBooks(){
        $books = Book::all();
        $user = Auth::user();
        return view('Admin.book.index_book',compact('books','user'));
    }
    

    public function getAddBook(){
        $categories = Category::all();
        return view('Admin.book.add_book',compact('categories'));
    }

    public function postAddBook(Request $request){
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

    public function detailBook($id){
        $books = Book::find($id);
        $categories = Category::all();
        return view('Admin.book.detail_book',compact('books'),compact('categories'));
    }

    public function getUpdateBook($id){
        $books = Book::find($id);
        $categories = Category::all();
        return view('Admin.book.edit_book',compact('books'),compact('categories'));
    }

    public function patchUpdateBook(Request $request){
        $books = Book::find($request->Id);
        $Path = $books->ImgPath;
        if($request->hasFile('imagetxt')){
            $nameImg = $request->file('imagetxt')->getClientOriginalName(); // lấy tên của ảnh từ hệ thống
            $request->imagetxt->storeAs('admin/images/books', $nameImg,'public'); // lưu hình ảnh vào trong đường dẫn,storeAs() tham số thứ 3 mặc định là public 
            $Path = $nameImg;
        }
        Book::where('Id',$request->Id)->update(
            [
                'Name'=>$request->tentxt,
                'Price'=>$request->giatxt,
                'Stock'=>$request->soluongtxt,
                'Detail'=>$request->motatxt,
                'Author'=>$request->tacgiatxt,
                'Publisher'=>$request->nhaxuatbantxt,
                'CategoryId' => $request->theloaitxt,
                'ImgPath' => $Path,
            ]
        );
        return redirect()->route('index_books');
    }

    public function deleteBook($id){
        $books = Book::where('Id',$id);
        $books->delete();
        return redirect()->route('index_books');
    }



    // API 

    public function getAllBooksAPI(){
        $books = Book::all();
        return response()->json($books,200);
    }

    public function getIdBooksAPI($id){
        $books = Book::find($id);
        if(empty($books)){
            return ["kết quả" => "thất bại!!"];
        }else{
            return response()->json($books,200);
        }
    }
    
}

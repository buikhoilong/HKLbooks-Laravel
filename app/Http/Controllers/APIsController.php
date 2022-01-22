<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Book;
use App\Models\Promote;
use App\Models\PromoteType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class APIsController extends Controller
{
    //Begin: Accounts APIs
    public function login(Request $request)
    {
        $account = Account::where('Email', $request->Email)->first();

        if ($account == null) {
            return response()->json(['Email'=>'Invalid Email'], 401);
        } else {
            if (!Hash::check($request->Password, $account->password)) {
                return response()->json(['Password'=>'Invalid Password'], 402);
            }
        }
        return response()->json($account, 200);
    }

    public function register(Request $request){
        $rule = [
            "Email" => "required|unique:accounts",
            "Phone" => "required|unique:accounts",
            "Password" => "required|unique:accounts",
            
            //"Username" => "required|unique:users|min:5",
            //"Password" => "regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
            //'Avatar' => 'mimes:jpeg,png,jpg|max:2048',
        ];

        $customMessage = [
            "Email.unique" => "Email đã được đăng ký!",
            "Phone.unique" => "Só điện thoại được đăng ký!",
            "Email.required" => "Email không được bỏ trống!",
            "Phone.required" => "Số tài khoản không được bỏ trống!",
            // "Username.unique" => "Tên tài khoản đã tồn tại!",
            //"Username.min" => "Tên tài khoản phải lớn hơn 5 ký tự !",
            //"Password.regex" => "Mật khẩu gồm 8 ký tự và Có 1 chữ viết hoa",
            //"Avatar.mimes" => "Hình ảnh không đúng định dạng",
            //"Avatar.max" => "Hình ảnh không được lớn quá 2MB"
        ];
        
        $validator = Validator::make($request->all(), $rule, $customMessage);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        $account= new Account();
        $timeCretedAt = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $timestamp = Date('Ymd');

        $count = Account::where('created_at',  $timeCretedAt)->count();
        if($count < 9){
            $count++;
            $count = '00'.$count;
        }else if($count > 8 && $count < 99 ){
            $count++;
            $count = '0'.$count;
        }else{
            $count++;
        }
        $account->Id = 'USER'.$timestamp.$count;

        $account->Name= $request->Name;
        $account->Birthday= $request->Birthday;
        $account->Address= $request->Address;
        $account->Phone= $request->Phone;
        $account->Status= 1;

        $account->Email= $request->Email;
        $account->Password= Hash::make($request->Password);
        $account->Role= 1;
        if ($request->hasFile('Avatar')) {
            $image = $request->file('Avatar');
            $name = $account->Id. $image->getClientOriginalExtension();//yyyy-MM-dd
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $HinhAnh = $name;
        } else {
            $HinhAnh = "default-avatar.jpg"; // nếu k thì có thì chọn tên ảnh mặc định ảnh mặc định
        }
        $account->Avatar= $HinhAnh;
        $account->created_at = $timeCretedAt;
    
        $account->updated_at = $account->deleted_at = null;
        $account->save();
        return response()->json($account,201);
    }
    //End: Accounts APIs

    //Begin: Books APIs
    public function getAllBooks(){
        //$books = Book::all();
        $books = Book::join('categories', 'categories.Id','=','books.CategoryId')->select(array('books.*', 'categories.Name as CategoryName'))->get();
        return response()->json($books,200);
    }
    public function getAllBooksByPromotesId($id){
        $books = Book::join('promotes','promotes.BookId','=','books.Id')->where('promotes.PromoteId',$id)->get('books.*');
        return response()->json($books,200);
    }

    //End: Books APIs

    //Begin: Promotes APIs
    public function getAllPromoteTypes(){
       return response()->json(PromoteType::all(),200);
    }
    //End: Promotes APIs
}

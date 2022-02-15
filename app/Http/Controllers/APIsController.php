<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Promote;
use App\Models\PromoteType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class APIsController extends Controller
{
    //Begin: Accounts APIs
    public function login(Request $request)
    {
        $account = Account::where('Email', $request->Email)->first();

        if ($account == null) {
            return response()->json(['Email' => 'Invalid Email'], 401);
        } else {
            if($account->Status == 0){
                return response()->json(['Email' => 'Accout\'s been blocked!'], 402);
            }
            if (!Hash::check($request->Password, $account->password)) {
                return response()->json(['Password' => 'Invalid Password'], 402);
            }
        }
        return response()->json($account, 200);
    }

    public function register(Request $request)
    {
        // $rule = [
        //     "Email" => "required|unique:accounts",
        //     "Phone" => "required|unique:accounts",
        //     "Password" => "required|unique:accounts",

        //     "Username" => "required|unique:users|min:5",
        //     "Password" => "regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
        //     'Avatar' => 'mimes:jpeg,png,jpg|max:2048',
        // ];

        // $customMessage = [
        //     "Email.unique" => "Email đã được đăng ký!",
        //     "Phone.unique" => "Só điện thoại được đăng ký!",
        //     "Email.required" => "Email không được bỏ trống!",
        //     "Phone.required" => "Số tài khoản không được bỏ trống!",
        //     "Username.unique" => "Tên tài khoản đã tồn tại!",
        //     "Username.min" => "Tên tài khoản phải lớn hơn 5 ký tự !",
        //     "Password.regex" => "Mật khẩu gồm 8 ký tự và Có 1 chữ viết hoa",
        //     "Avatar.mimes" => "Hình ảnh không đúng định dạng",
        //     "Avatar.max" => "Hình ảnh không được lớn quá 2MB"
        // ];
        // $validator = Validator::make($request->all(), $rule, $customMessage);
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 400);
        // }

        $existingAccount = Account::where('Email', $request->Email)->first();
        if ($existingAccount != null) {
            return response()->json(['Email' => 'Email đã tồn tại!'], 401);
        }

        $existingAccount = Account::where('Phone', $request->Phone)->first();
        if ($existingAccount != null) {
            return response()->json(['Phone' => 'Số điện thoại tồn tại!'], 402);
        }


        $account = new Account();
        $timeCretedAt = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $timestamp = Date('Ymd');

        $count = Account::where('created_at',  $timeCretedAt)->count();
        if ($count < 9) {
            $count++;
            $count = '00' . $count;
        } else if ($count > 8 && $count < 99) {
            $count++;
            $count = '0' . $count;
        } else {
            $count++;
        }
        $account->Id = 'USER' . $timestamp . $count;

        $account->Name = $request->Name;
        $account->Birthday = $request->Birthday;
        $account->Address = $request->Address;
        $account->Phone = $request->Phone;
        $account->Status = 1;

        $account->Email = $request->Email;
        $account->Password = Hash::make($request->Password);
        $account->Role = 1;
        if ($request->hasFile('Avatar')) {
            $image = $request->file('Avatar');
            $name = $account->Id . $image->getClientOriginalExtension(); //yyyy-MM-dd
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $HinhAnh = $name;
        } else {
            $HinhAnh = "default-avatar.jpg"; // nếu k thì có thì chọn tên ảnh mặc định ảnh mặc định
        }
        $account->Avatar = $HinhAnh;
        $account->created_at = $timeCretedAt;

        $account->updated_at = $account->deleted_at = null;
        $account->save();
        return response()->json($account, 201);
    }
    public function getAccount(Request $request)
    {
        $account = Account::where($request->Id)->first();
        return  response()->json($account, 202);
    }
    public function updateAccount(Request $request)
    {
        $existingAccount = Account::where('Id', $request->Id)->first();

        if (!isNull($existingAccount)) {
            return json_encode([
                'Message' => 'Tài khoản không tồn tại',
                $existingAccount
            ], 400);
        } else {
            $timeUpdatedAt = Carbon::now('Asia/Ho_Chi_Minh');

            $updateValue =$existingAccount;

            $updateValue->name = $request->Name

            ($request->Name != null) ?
            
                $resultAccount = Account::where('Id', $request->Id)->update([
                    'Name' => $request->Name,
                    'updated_at' => $timeUpdatedAt

                ]) : null;

            if ($request->Phone != null) {

                if (Account::where('Phone', $request->Phone)->first() != null) {
                    return json_encode([
                        'Message' => 'Số điện thoại đã tồn tại'
                    ], 401);
                } else {
                    $resultAccount = Account::where('Id', $request->Id)->update([
                        'Phone' => $request->Phone,
                        'updated_at' => $timeUpdatedAt
                    ]);
                }
            }

            ($request->Birthday != null) ? $resultAccount = Account::where('Id', $request->Id)->update([
                'Birthday' => $request->Birthday,
                'updated_at' => $timeUpdatedAt
            ]) : null;

            ($request->Address != null) ? $resultAccount = Account::where('Id', $request->Id)->update([
                'Address' => $request->Address,
                'updated_at' => $timeUpdatedAt
            ]) : null;

            // $existingAccount = Account::where('Id', $request->id)->update([
            // 'Id' => $id,
            // 'Name' => $request->Name,
            // 'Birthday' => $request->Birthday,
            // 'Email' => $request->Email,
            // 'Address' => $request->Address,
            // 'Phone' => $request->Phone,
            // 'updated_at' => $timeUpdatedAt
            // ]);
        }

        if ($resultAccount == null) {
            return json_encode([
                'Message' => 'Cập nhật thất bại',
                $resultAccount
            ], 402);
        }
        $resultAccount = Account::where('Id', $request->Id)->first();
        return json_encode([$resultAccount], 202);
    }
    //End: Accounts APIs

    //Begin: Books APIs
    public function getAllBooks()
    {
        //$books = Book::all();
        $books = Book::join('categories', 'categories.Id', '=', 'books.CategoryId')->select(array('books.*', 'categories.Name as CategoryName'))->get();
        return response()->json($books, 200);
    }
    public function getAllBooksByPromotesId($id)
    {
        $books = Book::join('promotes', 'promotes.BookId', '=', 'books.Id')->join('categories', 'categories.Id', '=', 'books.CategoryId')->where('promotes.PromoteId', $id)->select(array('books.*', 'categories.Name as CategoryName'))->get();
        return response()->json($books, 200);
    }
    public function getAllBooksByCategoryId($id)
    {
        $books = Book::join('categories', 'categories.Id', '=', 'books.CategoryId')->where('categories.Id', $id)->select(array('books.*', 'categories.Name as CategoryName'))->get();
        //$books = Book::join('promotes','promotes.BookId','=','books.Id')->where('promotes.PromoteId',$id)->get('books.*');
        return response()->json($books, 200);
    }
    //End: Books APIs

    //Begin: Promotes APIs
    public function getAllPromoteTypes()
    {
        return response()->json(PromoteType::all(), 200);
    }
    //End: Promotes APIs

    //Begin: Categories APIs
    public function getAllCategories()
    {
        return response()->json(Category::all(), 200);
    }
    //End: Categories APIs

    //Begin: Carts APIs
    public function getAllCartByAccountId(Request $request)
    {
        $carts = Cart::where('AccountId', $request->Id)->get();
        if ($carts . isEmpty()) {
            return response()->json(['Error' => 'Giỏ hàng rỗng'], 400);
        }
        return response()->json($carts, 200);
    }
    public function addToCart(Request $request)
    {
        $existedInCart = Cart::where($request->AccountId)->get();
        for ($i = 0; $i < count($existedInCart); $i++) {
            if ($request->BookId == $existedInCart[$i]->BookId) {
                return response()->json(['Message' => 'Book\'s been already in cart!'], 401);
            }
        }
        $carts = new Cart();

        if ($carts . isEmpty()) {
            return response()->json(['Error' => 'Giỏ hàng rỗng'], 400);
        }
        return response()->json($carts, 200);
    }
    //End: Carts APIs
}

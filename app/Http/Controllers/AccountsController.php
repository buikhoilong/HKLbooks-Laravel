<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DateTime;
use Faker\Provider\Uuid;

class AccountsController extends Controller
{
    public function getAllAccounts()
    {
        $accounts = Account::all();
        return view('Admin.account.index_account', compact('accounts'));
    }

    public function getAddAccount()
    {
        return view('Admin.account.add_account');
    }

    public function postAddAccount(Request $request)
    {
        $accounts = new Account;
        $datetime = Date('Ymdhms');
        $count = $accounts->count()+1;
        $chuoiID = $count;
        if ($count > 0) {
            $chuoiID = '00' . $count;
            if ($count > 9) {
                $chuoiID = '0' . $count;
                if ($count > 99) {
                    $chuoiID = $count;
                }
            }
        }
        $countt = $chuoiID;
        if ($request->roletxt) {
            $accounts->Id = 'USER' . $datetime . $countt;
        } else {
            $accounts->Id = 'ADMIN' . $datetime . $countt;
        }
        $accounts->Name = $request->tentxt;
        $accounts->Birthday = $request->ngaysinhtxt;
        $accounts->Address = $request->diachitxt;
        $accounts->Phone = $request->sdttxt;
        $accounts->Email = $request->emailtxt;
        $accounts->Password =  Hash::make($request->matkhautxt);
        $accounts->Status = 1;
        $accounts->Role = $request->roletxt;
        $nameImg = $request->file('imagetxt')->getClientOriginalName(); // lấy tên của ảnh từ hệ thống
        $accounts->Avatar = $nameImg; // gán giá trị cho database 
        $request->imagetxt->storeAs('admin/images/avatar', $nameImg, 'public'); // lưu hình ảnh vào trong đường dẫn,storeAs() tham số thứ 3 mặc định là public 
        $accounts->save();
        return redirect()->route('index_account');
    }

    public function detailAccount($id)
    {
        $accounts = Account::find($id);
        return view('Admin.account.detail_account', compact('accounts'));
    }

    public function getUpdateAccount($id)
    {
        $accounts = Account::find($id);
        return view('Admin.account.edit_account', compact('accounts'));
    }

    public function postUpdateAccount(Request $request)
    {
        $accounts = Account::find($request->Id);
        $PathImg = $accounts->Avatar;
        if ($request->hasFile('imagetxt')) {
            $nameImg = $request->file('imagetxt')->getClientOriginalName(); // lấy tên của ảnh từ hệ thống
            $request->imagetxt->storeAs('admin/images/books', $nameImg, 'public'); // lưu hình ảnh vào trong đường dẫn,storeAs() tham số thứ 3 mặc định là public 
            $PathImg = $nameImg;
        }
        Account::where('Id', $request->Id)->update(
            [
                'Name' => $request->tentxt,
                'Birthday' => $request->ngaysinhtxt,
                'Address' => $request->diachitxt,
                'Phone' => $request->sdttxt,
                'Email' => $request->emailtxt,
                'Password' => $request->matkhautxt,
                'Avatar' => $PathImg,
            ]
        );

        return redirect()->route('index_account');
    }

    public function deleteAccount($id){
        Account::where('Id',$id)->update([
            'Status' => 0
        ]
    );
        return redirect()->route('index_account');
    }

    public function profile()
    {
        return view('Admin.page.profile');
    }

    //API Functions
    public function getAccountByEmail(Request $request)
    {
        $account = Account::where('Email', $request->email)->first();

        if ($account == null) {
            return response()->json('Invalid Email', 401);
        } else {
            return response()->json($account, 200);
            if (Hash::check($request->password, $account->password)) {
               
            } else {
                return response()->json('Invalid Password', 402);
            }
        }
    }

    public function loginApp(Request $request)
    {
        // $rule = [
        //     "Email" => "required",
        //     //"Password" => "required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",
        // ];
        // $customMessage = [
        //     "Email.required" => "Email không được bỏ trống",
        //     //"Password.regex" => "Mật khẩu không đúng",
        //     "Password.required" => "Mật khẩu không được bỏ trống",
        // ];
        // $validator = Validator::make($request->all(), $rule, $customMessage);
        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 400);
        // }

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
        //dd($count);
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
}

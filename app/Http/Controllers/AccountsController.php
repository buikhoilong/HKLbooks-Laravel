<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function getAllAccounts(){
        $accounts = Account::all();
        return view('Admin.account.index_account',compact('accounts'));
    }

    public function getAddAccount(){
        return view('Admin.account.add_account');
    }

    public function postAddAccount(Request $request){
        $accounts = new Account;
        $datetime = Date('Ymd');
        $count = $accounts->count()+1;
        $chuoiID = $count;
        if($count > 0){
            $chuoiID = '00'.$count;
            if($count > 9){
                $chuoiID = '0'.$count;
                if($count > 99){
                        $chuoiID = $count;
                }
            }
        }
        $countt = $chuoiID;
        if($request->roletxt){
            $accounts->Id = 'USER'.$datetime.$countt;
        }else{
        $accounts->Id = 'ADMIN'.$datetime.$countt;
        }
        $accounts->Name = $request->tentxt;
        $accounts->Birthday = $request->ngaysinhtxt;
        $accounts->Address = $request->diachitxt;
        $accounts->Phone = $request->sdttxt;
        $accounts->Email = $request->emailtxt;
        $accounts->Password = $request->matkhautxt;
        $accounts->Status = 1;
        $accounts->Role = $request->roletxt;
        $nameImg = $request->file('imagetxt')->getClientOriginalName(); // lấy tên của ảnh từ hệ thống
        $accounts->Avatar = $nameImg; // gán giá trị cho database 
        $request->imagetxt->storeAs('admin/images/avatar', $nameImg,'public'); // lưu hình ảnh vào trong đường dẫn,storeAs() tham số thứ 3 mặc định là public 
        $accounts->save();
        return redirect()->route('index_account');
    }

    public function detailAccount($id){
        $accounts = Account::find($id);
        return view('Admin.account.detail_account',compact('accounts'));
    }

       public function getUpdateAccount($id){
        $accounts = Account::find($id);
        return view('Admin.account.edit_account',compact('accounts'));
    }
    
    public function postUpdateAccount(Request $request){
        $accounts = Account::find($request->Id);
        $PathImg = $accounts->Avatar;
        if($request->hasFile('imagetxt')){
            $nameImg = $request->file('imagetxt')->getClientOriginalName(); // lấy tên của ảnh từ hệ thống
            $request->imagetxt->storeAs('admin/images/books', $nameImg,'public'); // lưu hình ảnh vào trong đường dẫn,storeAs() tham số thứ 3 mặc định là public 
            $PathImg = $nameImg;
        }
        Account::where('Id',$request->Id)->update(
            [
                'Name'=>$request->tentxt,
                'Birthday'=>$request->ngaysinhtxt,
                'Address'=>$request->diachitxt,
                'Phone'=>$request->sdttxt,
                'Email'=>$request->emailtxt,
                'Password'=>$request->matkhautxt,
                'Avatar' => $PathImg,
            ]
        );
 
        return redirect()->route('index_account');
    }




    
    public function deleteAccount($id){
        $accounts = Account::where('Id',$id);
        $accounts->delete();
        return redirect()->route('index_account');
    }





}

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
        $accounts->Name = $request->tentxt;
        $accounts->Birthday = $request->ngaysinhtxt;
        $accounts->Address = $request->diachitxt;
        $accounts->Phone = $request->sdttxt;
        $accounts->Email = $request->emailtxt;
        $accounts->Status = 1;
        $accounts->Role = $request->roletxt;

        $accounts->save();

        return redirect()->route('index_account');
    }


}

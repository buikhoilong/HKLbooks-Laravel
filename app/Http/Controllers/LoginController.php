<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function getLogin(){
        if(Auth::check()){
            return redirect()->route('home');
        }else{
            return view('Admin.page.login');
        }
    }

    public function postLogin(Request $request){
        if(Auth::attempt(['Email' => $request->Email, 'password' => $request->Password])){
            $user = Auth::user();
            $request->session()->put('user_login',$user);
            return redirect()->route('home');
        }else{
            echo "đăng nhập thất bại";
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('login');
    }
}

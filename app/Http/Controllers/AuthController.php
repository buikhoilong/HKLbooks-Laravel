<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index(Request $request){
        $account = Account::where('Email', $request->Email)->first();
        if(!$account || Hash::check($request->password, $account->password)){
            return response([
                'message' => ['Không đăng nhập được']
            ],404);
        }
        $token = $account->createTonken('HKLBook')->plainTextToken;
        
        $response = [
            'account' =>$account,
            'token' => $token
        ];

        return response($response,201);
    }
}

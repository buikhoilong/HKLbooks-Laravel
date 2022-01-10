<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Book;
use App\Models\Rate;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    public function getAllRates(){
        $rates = Rate::all();
        $accounts = Account::all();
        $books = Book::all();
        $array[0] = $accounts;
        $array[1] = $books;
        return view('Admin.rate.index_rates',compact('rates','array'));
    }

    public function getAllReplyRates(){
        $rates = Rate::all();
        $accounts = Account::all();
        $books = Book::all();
        $array[0] = $accounts;
        $array[1] = $books;
        return view('Admin.rate.reply_retes',compact('rates','array'));
    }

    public function postAllReplyRates(Request $request){
        Rate::where('Id',$request->Id)->update([
            'Reply' => $request->noidungtxt,
            'Status' => 1,
        ]);
        return redirect()->route('index_rates');
    }

    public function deleteRates(Request $request){
        $rates = Rate::where('Id',$request->Id);
        $rates->delete();
        return redirect()->route('reply_rates');
    }

}

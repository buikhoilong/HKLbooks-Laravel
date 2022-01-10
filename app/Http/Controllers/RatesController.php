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
        // dd($array[0]);
        return view('Admin.rate.index_rates',compact('rates','array'));
    }

    public function getAllReplyRates(){
        return view('Admin.rate.reply_rates');
    }

    public function getAllNoReplyRates(){
        return view('Admin.rate.no_reply_rates');
    }
}

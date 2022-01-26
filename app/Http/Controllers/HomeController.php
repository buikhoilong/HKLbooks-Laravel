<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    public function index(){
        $user = Account::all();
        $books = Book::all();
        $orders = Order::all();
        $tongtien = 0;
        $tongtien2 = 0;
        return view('Admin.index',compact('user','books','orders','tongtien','tongtien2'));
    }
}

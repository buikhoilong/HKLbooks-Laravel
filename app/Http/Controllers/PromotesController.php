<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Promote;
use Illuminate\Http\Request;

class PromotesController extends Controller
{
    public function getAllPromotes(){
        $promotes = Promote::all();
        $books = Book::all();
        return view('Admin.promote.index_promotes',compact('promotes','books'));
    }

    public function getAllNewPromotes(){
        $promotes = Promote::all();
        $books = Book::all();
        return view('Admin.promote.new_promotes',compact('promotes','books'));
    }

    public function getAllPopularPromotes(){
        $promotes = Promote::all();
        $books = Book::all();
        return view('Admin.promote.popular_promotes',compact('promotes','books'));
    }
}

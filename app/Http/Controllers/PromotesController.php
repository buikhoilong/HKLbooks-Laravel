<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Promote;
use App\Models\PromoteType;
use Illuminate\Http\Request;

class PromotesController extends Controller
{
    public function getAllPromotes()
    {
        $books = Book::all();
        $promotes = Promote::all();
        $promotetype = PromoteType::all();
        $array = [];
        return view('Admin.promote.index_promotes', compact('promotes', 'books','promotetype','array'));
    }

    public function getAllNewPromotes()
    {
        $promotes = Promote::all();
        $books = Book::all();
        $promotetype = PromoteType::all();
        return view('Admin.promote.new_promotes', compact('promotes', 'books', 'promotetype'));
    }

    public function getAllPopularPromotes()
    {
        $promotes = Promote::all();
        $books = Book::all();
        return view('Admin.promote.popular_promotes', compact('promotes', 'books'));
    }

    public function postPromote(Request $request)
    {
        $tam = Promote::where('BookId',$request->Id);
        $tam->delete();

        if(count($request->status_checkbox) !== 0){
            for($o = 0; $o < count($request->status_checkbox); $o++){
                $newpromote = new Promote;
                $newpromote->BookId = $request->Id;
                $newpromote->PromoteId = value($request->status_checkbox[$o]);
                $newpromote->save();
            }
        }

        return redirect()->route('index_promote');
    }
}

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
        return view('Admin.promote.index_promotes', compact('promotes', 'books', 'promotetype', 'array'));
    }

    public function getAllNewPromotes()
    {
        $promotes = Promote::all();
        $books = Book::all();
        return view('Admin.promote.new_promotes', compact('promotes', 'books'));
    }


    public function getAllPopularPromotes()
    {
        $promotes = Promote::all();
        $books = Book::all();
        return view('Admin.promote.popular_promotes', compact('promotes', 'books'));
    }
    public function getAllStoryPromotes()
    {
        $promotes = Promote::all();
        $books = Book::all();
        return view('Admin.promote.story_promotes', compact('promotes', 'books'));
    }

    public function postPromote(Request $request)
    {
        $tam = Promote::where('BookId', $request->Id);
        $tam->delete();
        if (count($request->status_checkbox) !== 0) {
            for ($o = 0; $o < count($request->status_checkbox); $o++) {
                $newpromote = new Promote;
                $newpromote->BookId = $request->Id;
                $newpromote->PromoteId = value($request->status_checkbox[$o]);
                $newpromote->save();
            }
        }

        return redirect()->route('index_promote');
    }

    public function getAddBookToPromote()
    {
        $books = Book::all();
        $promotetype = PromoteType::all();
        $tam = Promote::select('BookId')
            ->distinct()->get();
        $tam2 = Book::select('Id')->whereNotIn('Id', $tam)->get();
        return view('Admin.promote.add_promotes', compact('tam2', 'books', 'promotetype'));
    }

    public function postAddBookToPromote(Request $request)
    {
        if (count($request->status_checkbox) !== 0) {
            for ($o = 0; $o < count($request->status_checkbox); $o++) {
                $newpromote = new Promote;
                $newpromote->BookId = $request->idsach;
                $newpromote->PromoteId = value($request->status_checkbox[$o]);
                $newpromote->save();
            }
        }
        return redirect()->route('index_promote');
    }

    public function getAddPromoteType(){
        return view('Admin.promote.add_promote_type');
    }

    
    public function postAddPromoteType(Request $request){
        $promote_type = new PromoteType;
        $promote_type->Id = $request->idtxt;
        $promote_type->Name = $request->tentxt;
        $promote_type->Description = $request->motatxt;
        $promote_type->Status = 1;
        $promote_type->save();
        return redirect()->route('index_promote');
    }


    public function deletePromote(Request $request)
    {
        $tam = Promote::where('BookId', $request->Id);
        $tam->delete();
        return redirect()->route('index_promote');
    }
}

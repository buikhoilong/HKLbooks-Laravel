<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    function getAllBooks(){
        $books = Book::all();
        return view('Admin.book.index_book',compact('books'));
    }
}

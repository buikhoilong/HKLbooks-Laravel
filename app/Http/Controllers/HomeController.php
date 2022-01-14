<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    public function index(){
        $tam = Auth::user();
        return view('Admin.index',compact('tam'));
    }
}

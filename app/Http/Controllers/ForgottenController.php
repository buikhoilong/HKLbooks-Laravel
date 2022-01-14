<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgottenController extends Controller
{
    public function getForgotten(){
        return view('Admin.page.foget');
    }
}

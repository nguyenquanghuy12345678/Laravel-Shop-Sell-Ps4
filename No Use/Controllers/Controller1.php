<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controller1 extends Controller
{
    //
    // bổ sung hàm //
    public function index() {
        return view('news');
    }
}

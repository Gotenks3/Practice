<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function mypage()
    {
        return view('mypage.index');
    }
}
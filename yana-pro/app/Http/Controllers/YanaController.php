<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YanaController extends Controller
{
    /**
     * ホームページ表示
     * 
     */
    public function showHome()
    {
        return view("home");
    }
}

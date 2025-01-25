<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * 機械学習
     * 
     */
    public function showMachine()
    {
        return view('information.machine');
    }
}

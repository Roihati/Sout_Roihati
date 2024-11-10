<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Check404Controller extends Controller
{
    public function check404(){
        return view('errors.404');
    }
}

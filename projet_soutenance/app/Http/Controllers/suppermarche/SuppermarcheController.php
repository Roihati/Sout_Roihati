<?php

namespace App\Http\Controllers\suppermarche;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuppermarcheController extends Controller
{
    public function index(){
        return view("suppermarche.dashboard");
    }
}

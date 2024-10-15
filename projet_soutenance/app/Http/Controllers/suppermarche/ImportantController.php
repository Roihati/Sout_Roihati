<?php

namespace App\Http\Controllers\suppermarche;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportantController extends Controller
{
     public function important(){

        return view('suppermarche.important');
     }
}

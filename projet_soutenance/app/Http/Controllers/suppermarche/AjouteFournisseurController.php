<?php

namespace App\Http\Controllers\suppermarche;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjouteFournisseurController extends Controller
{
    public function add() {
        
        
        return view('suppermarche.add');

    }
}

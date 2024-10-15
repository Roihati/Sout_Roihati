<?php

namespace App\Http\Controllers\fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function rapport(){
         return view("fournisseur.rapport");
    }
}

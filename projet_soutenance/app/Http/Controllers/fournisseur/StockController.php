<?php

namespace App\Http\Controllers\fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stock(){
        return view("fournisseur.stock");
    }
}

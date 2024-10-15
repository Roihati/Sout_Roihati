<?php

namespace App\Http\Controllers\fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    //
    public function index(){
        return view('fournisseur.accueil');
    }
}

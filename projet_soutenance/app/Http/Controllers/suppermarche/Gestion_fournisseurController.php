<?php

namespace App\Http\Controllers\suppermarche;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Gestion_fournisseurController extends Controller
{
    public function index(){
        return view("suppermarche.gerer_fournisseur");
    }
}

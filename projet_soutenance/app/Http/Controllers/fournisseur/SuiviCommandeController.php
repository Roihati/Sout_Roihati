<?php

namespace App\Http\Controllers\fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuiviCommandeController extends Controller
{
    public function suivicommande(){
        return view("fournisseur.suivicommande");
    }
}

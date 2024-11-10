<?php

namespace App\Http\Controllers\fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Categories;

class CategoryController extends Controller
{
    //
    public function category(){
        return view("fournisseur.category");
    }
    public function index()
    {
        $categories = Categories::all();
        return view('fournisseur.category', compact('categories'));
    }
    
}

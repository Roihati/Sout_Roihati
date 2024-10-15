<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Favorites;

class Favorite extends Controller
{
    //
    public function index(){
        $favorites=Favorites:: all();
        return view('client.favorite',compact('favorites'));
    }
}

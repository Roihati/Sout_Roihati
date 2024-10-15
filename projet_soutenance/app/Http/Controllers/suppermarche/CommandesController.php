<?php

namespace App\Http\Controllers\suppermarche;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class CommandesController extends Controller
{
    public function orders()
    {

        return view('suppermarche.Commandes');
    } 
}

<?php

namespace App\Http\Controllers\suppermarche;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlerteController extends Controller
{
    public function alert(){

        return view('suppermarche.alert');
    }
}

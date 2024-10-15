<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commandes;

class Order extends Controller
{
    //
    public function index(){
        $orders=Commandes:: all();
        return view('client.order' ,compact('orders'));
    }
}

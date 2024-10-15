<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Products;

class ProductController extends Controller
{
    

    public function index()
    {
        // Récupérer tous les produits
        $products = Products::all();
        return view('client.products', compact('products'));
    }

    public function favorites()
    {
        // Récupérer les produits populaires
        $favorites = Products::where('is_favorite', true)->get();
        return view('client.favorite', compact('favorites'));
    }

    public function orders()
    {
        // Récupérer les nouveaux arrivages
       # $orders = Order::all();
        #passer les commandes à la vue 
        $orders = Products::where('is_new', true)->get();
        return view('client.order', compact('orders'));
    }

}

<?php

namespace App\Http\Controllers\fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Stock;

class StockController extends Controller
{
    public function stock(){
        return view("fournisseur.stock");
    }

    public function store(Request $request)
        {
            $request->validate([
                'product_name' => 'required|string|max:255',
                'current_stock' => 'required|integer',
                'alert_Threshold' => 'required|integer',
            ]);
        
            Stock::create([
                'product_name' => $request->input('product_name'),
                'current_stock' => $request->input('current_stock'),
                'alert_threshold' => $request->input('alert_threshold'),
            ]);
        
            return response()->json(['success' => true]);
        
}
}
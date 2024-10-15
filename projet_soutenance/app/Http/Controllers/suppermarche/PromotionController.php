<?php

namespace App\Http\Controllers\suppermarche;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('suppermarche.promotion', compact('promotions'));
    }

    public function create()
    {
        
        return view('suppermarche.promotion');
    }

    public function store(Request $request)
    {
        Promotion::create($request->all());
        return redirect()->route('suppermarche.promotion');
    }

    public function edit(Promotion $promotion)
    {
        return view('suppermarche.promotion', compact('promotion'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $promotion->update($request->all());
        return redirect()->route('suppermarche.promotion');
    }

    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('suppermarche.promotion');
    }
}


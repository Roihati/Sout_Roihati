<?php

namespace App\Http\Controllers\suppermarche;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function inventory()
    {
        $inventories = Inventory::all();
        return view('suppermarche.inventories', compact('inventories'));
    }

    public function create()
    {
        return view('suppermarche.create');
    }

    public function store(Request $request)
    {
        Inventory::create($request->all());
        return redirect()->route('suppermarche.inventories');
    }

    public function edit(Inventory $inventory)
    {
        return view('suppermarche.edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $inventory->update($request->all());
        return redirect()->route('suppermarche.inventories');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('suppermarche.inventories');
    }
}

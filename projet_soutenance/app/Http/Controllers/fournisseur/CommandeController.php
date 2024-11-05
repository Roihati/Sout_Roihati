<?php

namespace App\Http\Controllers\fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commandes;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commandes::all();
        return view('fournisseur.commande', compact('commandes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'suppermarche' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'produit' => 'required|string|max:255',
            'quantite' => 'required|integer|min:1',
            'date_livraison' => 'required|date',
        ]);

        Commandes::create($request->all());

        return redirect()->route('fournisseur.commande')->with('success', 'Commande ajoutée avec succès.');
    }

    public function destroy($id)
    {
        $commande = Commandes::findOrFail($id);
        $commande->delete();

        return redirect()->route('fournisseur.commande')->with('success', 'Commande supprimée avec succès.');
    }
}
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
        return view('fournisseur.commande.store', compact('commandes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'suppermarche' => 'required|string|max:255',
            'produit-id' => 'required|string|max:255',
            'quantite' => 'required|integer|min:1',
            'date_livraison' => 'required|date',
        ]);

        Commandes::create($request->all());

        return response()->json(['success' => 'Commande ajoutée avec succès.']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'statut' => 'required|string|max:255',
        ]);

        $commande = Commandes::findOrFail($id);
        $commande->update($request->all());

        return response()->json(['success' => 'Statut de la commande mis à jour.']);
    }

    public function destroy($id)
    {
        $commande = Commandes::findOrFail($id);
        $commande->delete();

        return response()->json(['success' => 'Commande supprimée avec succès.']);
    }
}
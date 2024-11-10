<?php
namespace App\Http\Controllers\fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commandes;
use App\Models\Products;
use App\Models\Supermarche;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commandes::with('products', 'supermarches')->get();
        $supermarches = Supermarche::all();
        $produits = Products::all();
        
        return view('fournisseur.commande', compact('commandes', 'supermarches', 'produits'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_supermarche' => 'required|exists:supermarches,id',
            'product_id' => 'required|exists:products,id',
            'quantite' => 'required|integer|min:1',
            'date_livraison' => 'required|date',
            'status' => 'required|in:en cours,préparée,expédiée,livrée',
        ]);

        Commandes::create($validatedData);

        return redirect()->route('fournisseur.commande')->with('success', 'Commande ajoutée avec succès.');
    }

    public function destroy($id)
    {
        $commande = Commandes::findOrFail($id);
        $commande->delete();

        return redirect()->route('fournisseur.commande')->with('success', 'Commande supprimée avec succès.');
    }
}
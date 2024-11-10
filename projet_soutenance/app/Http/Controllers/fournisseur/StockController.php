<?php
namespace App\Http\Controllers\fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class StockController extends Controller
{
    public function index()
    {
        // Récupère tous les produits et détecte ceux en dessous du seuil
        $produits = Products::all()->map(function($produit) {
            $produit->besoinReapprovisionnement = $produit->besoinReapprovisionnement();
            return  $produit;


        });
    
        return view('fournisseur.stock', compact('produits'));
    }
    
    public function updateStock(Request $request, $id)
{
    $request->validate(['quantite_disponible' => 'required|integer|min:0']);

    $produit = Products::findOrFail($id);
    $produit->quantite_disponible = $request->quantite_disponible;
    $produit->status = $produit->besoinReapprovisionnement() ? 'rupture' : 'en stock';
    $produit->save();

    return redirect()->back()->with('success', 'Stock mis à jour avec succès.');
}

}

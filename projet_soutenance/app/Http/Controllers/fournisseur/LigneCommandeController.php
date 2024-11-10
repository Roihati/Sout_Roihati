<?php

namespace App\Http\Controllers\fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commandes;
use App\Models\LigneCommande;
use App\Models\Products;


class LigneCommandeController extends Controller
{

    public function create($commandeId)
    {
        // Vérifiez si la commande existe
        $commande = Commandes::find($commandeId);
        if (!$commande) {
            return redirect()->route('fournisseur.commande')->with('error', 'Commande non trouvée.');
        }

        $produits = Products::all();
        return view('fournisseur.lignes', compact('produits', 'commandeId'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'commande_id' => 'required|exists:commandes,id',
            'produit_id' => 'required|exists:products,id',
            'quantite' => 'required|integer|min:1',
            'prix_unitaire' => 'required|numeric|min:0',
            
        ]);
 // Créer la ligne de commande
 LigneCommande::create($validatedData);

 // Récupérer toutes les lignes de commande pour la commande actuelle
 $lignesCommandes = LigneCommande::where('commande_id', $validatedData['commande_id'])->get();

 // Redirection avec message de succès et lignes de commande
 return redirect()->route('fournisseur.lignes', $validatedData['commande_id'])
                  ->with('success', 'Ligne de commande ajoutée avec succès.')
                  ->with('lignesCommandes', $lignesCommandes);

        // Création de la ligne de commande
        /*$ligneCommande = LigneCommande::create($validatedData);

        // Vérifiez si l'insertion a réussi
        if ($ligneCommande) {
            return redirect()->route('fournisseur.commande')->with('success', 'Ligne de commande ajoutée avec succès.');
        } else {
            return redirect()->route('fournisseur.commande')->with('error', 'Erreur lors de l\'ajout de la ligne de commande.');
        } */
    }

}
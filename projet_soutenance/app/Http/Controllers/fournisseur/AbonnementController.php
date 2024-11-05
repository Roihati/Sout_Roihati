<?php

namespace App\Http\Controllers\fournisseur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Abonnement;
use App\Models\User;
use App\Notifications\AbonnementCreated;


class AbonnementController extends Controller
{
    

    public function index()
{
    return view('fournisseur.abonnement');
}

public function store(Request $request)
{
    $request->validate([
        'nom_fournisseur' => 'required|string|max:255',
        'prix' => 'required|numeric',
        'durée' => 'required|integer',
    ]);
// Dans la méthode store :
$abonnement = Abonnement::create($request->all());
User::first()->notify(new AbonnementCreated($abonnement)); // Notifie le premier utilisateur (vous pouvez adapter cela)
return redirect()->back()->with('success', 'Abonnement créé avec succès!');
 
}

public function dashboard()
{
    $abonnements = Abonnement::all();
    return view('fournisseur.dashboard', compact('abonnements'));
}

public function activate($id)
{
    $abonnement = Abonnement::findOrFail($id);
    // Logique pour activer l'abonnement
    $abonnement->status = 'active'; //  mise à jour
    $abonnement->save();

    return redirect()->back()->with('success', 'Abonnement activé avec succès!');
}

public function deactivate($id)
{
    $abonnement = Abonnement::findOrFail($id);
    // Logique pour désactiver l'abonnement
    $abonnement->status = 'inactive'; // Exemple de mise à jour
    $abonnement->save();

    return redirect()->back()->with('success', 'Abonnement désactivé avec succès!');
}
}

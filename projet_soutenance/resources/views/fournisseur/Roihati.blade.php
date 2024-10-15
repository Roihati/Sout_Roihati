// app/Http/Controllers/CommandeController.php
namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::all();
        return view('fournisseur.gestion_commandes', compact('commandes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fournisseur' => 'required|string|max:255',
            'produit' => 'required|string|max:255',
            'quantite' => 'required|integer|min:1',
            'date_livraison' => 'required|date',
        ]);

        Commande::create($request->all());

        return response()->json(['success' => 'Commande ajoutée avec succès.']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'statut' => 'required|string|max:255',
        ]);

        $commande = Commande::findOrFail($id);
        $commande->update($request->all());

        return response()->json(['success' => 'Statut de la commande mis à jour.']);
    }

    public function destroy($id)
    {
        $commande = Commande::findOrFail($id);
        $commande->delete();

        return response()->json(['success' => 'Commande supprimée avec succès.']);
    }
}
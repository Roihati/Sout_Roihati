<?php
namespace App\Http\Controllers\fournisseur;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Order;

class ProductController extends Controller
{
    //
    public function index(){
        return view("fournisseur.product");
    }
   
    public function store(Request $request) {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        ]);
    
        // Insération des données du formulaire dans la base de données
        $product = new Products();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category = $request->input('category');
    
        // Traitement de l'image du produit
        if ($request->hasFile('image')) {
            // Stocker la nouvelle image
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath; // Assignation du chemin de l'image
        } else {
            // Si aucune image n'est fournie, on laisse le champ image vide (ou on peut assigner une valeur par défaut)
            $product->image = null; // Assurez-vous que cela correspond à votre logique métier
        }
    
        // Sauvegarder le produit
        $product->save();
    
        // Redirection vers une page de confirmation
        return redirect()->route('confirmation')->with('success', 'Produit ajouté avec succès');
    }
  //afficher les donneés 

  public function list()

  { 
    
    $products = Products::paginate(3); // Ici, 10 est le nombre de produits par page


     //$products = Products::all(); // Récupère tous les produits
      return view('fournisseur.list_product', compact('products'));
       // Pagination des produits*/
   
  
  }
//search des produits
public function search(Request $request)
{
    
    $search = $request->input('search');
    
    $produits = Products::query()
        ->when($search, function ($query, $search) {
            return $query->where('search', 'like', "%{$search}%");
        })
        ->get();

    return view('fournisseur.search', compact('produits'));
    
}

   // Modification d'un produit
   public function show( )
   {
    $products = Products::paginate(3); // Ici, 10 est le nombre de produits par page

    //$products = Products::all(); // Récupère tous les produits

       return view('fournisseur.show ', compact('products'));
   }
  // Modification d'un produit
  public function edit($id)
{
    // Trouver le produit par ID
    $product = Products::findOrFail($id);

    // Retourner la vue avec le produit
    return view('fournisseur.update', compact('product'));
}

public function update(Request $request, $id)
{
    // Validation des données
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
    ]);

    // Trouver le produit par ID
    $product = Products::findOrFail($id);

    // Mise à jour des informations du produit
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->stock = $request->input('stock');

    // Traitement de l'image du produit
    if ($request->hasFile('image')) {
        // Supprimer l'ancienne image si elle existe
        if ($product->image) {
            Storage::delete($product->image);
        }

        // Stocker la nouvelle image
        $imagePath = $request->file('image')->store('images', 'public');
        $product->image = $imagePath; // une colonne 'image' dans table
    }

    // Sauvegarder les modifications
    $product->save();

    // Redirection avec message de succès
    return redirect()->back()->with('success', 'Produit mis à jour avec succès.');
}
  // Suppression d'un produit

  public function destroy($id)
{
    
    // Trouver le produit par ID
    $product = Products::findOrFail($id);

    // Suppression du produit
    $product->delete();

   
   // Redirection ou retour d'une réponse avec un message de succès
   return redirect()->back()->with('success', 'Produit supprime avec succès.');
}
//stock 
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


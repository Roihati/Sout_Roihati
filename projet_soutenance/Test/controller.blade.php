<?php

namespace App\Http\Controllers\fournisseur;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Order;
use App\Models\Categories;


/*class ProductController extends Controller
{

    public function index($categoryId = null)
{
    if (is_null($categoryId)) {
        return redirect()->route('fournisseur.category'); // Redirige vers une route par défaut
    }
        

    $category = Categories::findOrFail($categoryId);
    $products = $category->products;
    return view('fournisseur.product', compact('category', 'products'));
}

    public function store(Request $request) {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
           # 'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        ], [
            'name.required' => 'Le nom du produit est obligatoire',
            'description.required' => 'La description du produit est obligatoire',
            'price.required' => 'Le prix du produit est obligatoire',
        ]);
    
        // Traitement de l'image du produit
        $imagePath ='public/storage/images';
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Stocker dans le dossier public/images
        }
    
        // Insérer les données du produit dans la base de données
        Products::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            
            'stock' => $request->input('stock'),
            'category' => $request->input('category'),
            'image' => $imagePath, //  c'est le chemin stocké 
        ]);
    
        // Redirection vers une page de confirmation
        return redirect()->route('confirmation')->with('success', 'Produit ajouté avec succès');
    }

  //afficher les donneés 

  public function list()
  {
      $products = Products::all(); // Récupère tous les produits
      return view('fournisseur.list_product', compact('products'));
      
   
  }

   // Modification d'un produit
   public function show( )
   {
    $products = Products::all(); // Récupère tous les produits

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

}
*/
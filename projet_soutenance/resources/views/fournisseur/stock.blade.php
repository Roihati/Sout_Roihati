<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Stock</title>
</head>
<body>
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-4">Gestion des Stocks</h2>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Nom</th>
                <th class="py-3 px-6 text-left">Quantité Disponible</th>
                <th class="py-3 px-6 text-left">Statut</th>
                <th class="py-3 px-6 text-left">Seuil de Réapprovisionnement</th>
                <th class="py-3 px-6 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach($produits as $produit)
            <tr class="border-b hover:bg-gray-100">
                <td class="py-3 px-6 text-left text-gray-800 font-medium">{{ $produit->name }}</td>
                <td class="py-3 px-6 text-left text-blue-600">{{ $produit->quantite_disponible }}</td>
                <td class="py-3 px-6 text-left">
                    @if ($produit->besoinReapprovisionnement)
                        <span class="text-red-600 font-bold border border-red-400 bg-red-100 rounded-lg px-2 py-1">Besoin de réapprovisionnement</span>
                    @else
                        <span class="text-green-600 font-bold border border-green-400 bg-green-100 rounded-lg px-2 py-1">{{ $produit->status }}</span>
                    @endif
                </td>
                <td class="py-3 px-6 text-left text-yellow-600">{{ $produit->seuil_reapprovisionnement }}</td>
                <td class="py-3 px-6 text-left">
                    <!-- Formulaire pour mettre à jour la quantité -->
                    <form action="{{ route('fournisseur.updateStock', $produit->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="number" name="quantite_disponible" min="0" value="{{ $produit->quantite_disponible }}" class="border border-gray-300 p-1 rounded">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white py-1 px-4 rounded">Mettre à jour</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
                    
<!-- Bouton de retour -->
      
 <button onclick="history.back()" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg">
                        
                       
             &larr; Retour
         </button>   
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Ligne de Commande</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<div class="container mx-auto px-4 py-8">

    @if(session()->has('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <h1 class="text-xl font-semibold mb-4">Ajouter une Ligne de Commande</h1>

    <form method="POST" action="{{ route('fournisseur.lignes.store') }}">
        @csrf
        <input type="hidden" name="commande_id" value="{{ $commandeId }}">

        <div class="mb-4">
            <label for="produit_id" class="block text-sm font-medium text-gray-700">Produit</label>
            <select id="produit_id" name="produit_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                @foreach($produits as $produit)
                    <option value="{{ $produit->id }}">{{ $produit->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="quantite" class="block text-sm font-medium text-gray-700">Quantité</label>
            <input type="number" id="quantite" name="quantite" min="1" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <div class="mb-4">
            <label for="prix_unitaire" class="block text-sm font-medium text-gray-700">Prix Unitaire</label>
            <input type="number" id="prix_unitaire" name="prix_unitaire" step="0.01" min="0" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>

        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Ajouter Ligne</button>
    </form>

    <!-- Affichage des lignes de commande -->
    <h2 class="text-lg font-semibold mt-8 mb-4">Lignes de Commande</h2>
    
    @if(isset($lignesCommandes) && $lignesCommandes->count() > 0)
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Produit</th>
                    <th class="py-2 px-4 border-b">Quantité</th>
                    <th class="py-2 px-4 border-b">Prix Unitaire</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
                @foreach($lignesCommandes as $index => $ligne)
                    <tr class="{{ ($index % 2 == 0) ? 'bg-gray-100' : 'bg-white' }}">
                        <td class="py-3 px-6">{{ $ligne->produit->name }}</td> <!-- Assurez-vous que la relation est définie -->
                        <td class="py-3 px-6">{{ $ligne->quantite }}</td>
                        <td class="py-3 px-6">{{ number_format($ligne->prix_unitaire, 2, ',', ' ') }} €</td> <!-- Formatage du prix -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune ligne de commande trouvée.</p>
    @endif

</div>
</body>
</html>
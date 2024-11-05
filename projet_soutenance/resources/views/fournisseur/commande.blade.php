@include('fournisseur.deconnexion')
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Commandes - Supermarché</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<div class="container mx-auto px-4 py-8">
    <h1 class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"">Gestion des Commandes</h1>
    
    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-4">Nouvelle Commande</h2>
            <form method="POST" action="{{ route('fournisseur.commande') }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="suppermarche" class="block text-sm font-medium text-gray-700 mb-2">Supermarché</label>
                        <input type="text" id="suppermarche" name="suppermarche" class="w-full px-3 py-2 border rounded-md" required>
                    </div>
                    <div>
                        <label for="produit" class="block text-sm font-medium text-gray-700 mb-2">Produit</label>
                        <input type="text" id="produit" name="produit" class="w-full px-3 py-2 border rounded-md" required>
                    </div>
                    <div>
                        <label for="quantite" class="block text-sm font-medium text-gray-700 mb-2">Quantité</label>
                        <input type="number" id="quantite" name="quantite" class="w-full px-3 py-2 border rounded-md" required min="1">
                    </div>
                    <div>
                        <label for="date_livraison" class="block text-sm font-medium text-gray-700 mb-2">Date de livraison</label>
                        <input type="date" id="date_livraison" name="date_livraison" class="w-full px-3 py-2 border rounded-md" required>
                    </div>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <input type="status" id="status" name="status" class="w-full px-3 py-2 border rounded-md" required>
                </div>
            </div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Ajouter la commande</button>
            </form>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-4">Liste des Commandes</h2>
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Supermarché</th>
                        <th class="py-3 px-6 text-left">Produit</th>
                      
                        <th class="py-3 px-6 text-center">Quantité</th>
                        <th class="py-3 px-6 text-left">Status</th>
                        <th class="py-3 px-6 text-center">Date de livraison</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach($commandes as $commande)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                               
                            <td class="py-3 px-6 text-left">{{ $commande->id }}</td>
                            <td class="py-3 px-6 text-left">{{ $commande->suppermarche }}</td>
                            <td class="py-3 px-6 text-left">{{ $commande->produit }}</td>
                            <td class="py-3 px-6 text-center">{{ $commande->quantite }}</td>
                            <td class="py-3 px-6 text-left">{{ $commande->status }}</td>
                            <td class="py-3 px-6 text-center">{{ $commande->date_livraison }}</td>
                            <td class="py-3 px-6 text-center">

                                <form method="POST" action="{{ route('fournisseur.destroy', $commande->id) }}" style="display:inline;" onsubmit="return confirmDelete();">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash-alt"></i> Supprimer
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('fournisseur.destroy', $commande->id) }}" style="display:inline;" onsubmit="return confirmDelete();">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash-alt"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>

<script>
    function confirmDelete() {
        return confirm("Êtes-vous sûr de vouloir supprimer cette commande ?");
    }
</script>
</html>
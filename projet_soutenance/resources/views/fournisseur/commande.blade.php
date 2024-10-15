<html>
<head>
    @include('fournisseur.deconnexion')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Commandes - Supermarché</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100 font-sans">
<div x-data="commandesApp()" class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8 text-center text-blue-600">Gestion des Commandes</h1>
    
    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-4">Nouvelle Commande</h2>
            <form method="POST" action="{{ route('fournisseur.commande.store') }}">
                @csrf
            
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="suppermarche" class="block text-sm font-medium text-gray-700 mb-2">Supermarché</label>
                        <input type="text" id="user_id" name="user_id" x-model="nouvelleCommande.fournisseur" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="produit" class="block text-sm font-medium text-gray-700 mb-2">Produit</label>
                        <input type="text" id="produit-id" name="produit_id" x-model="nouvelleCommande.produit" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="quantite" class="block text-sm font-medium text-gray-700 mb-2">Quantité</label>
                        <input type="number" id="quantite" name="quantite" x-model="nouvelleCommande.quantite" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required min="1">
                    </div>
                    <div>
                        <label for="date_livraison" class="block text-sm font-medium text-gray-700 mb-2">Date de livraison prévue</label>
                        <input type="date" id="date_livraison" name="date_livraison" x-model="nouvelleCommande.date_livraison" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
                <button type="submit" class="mt-4 w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Ajouter la commande</button>
            </form>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-4">Liste des Commandes</h2>
            <div class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Supermarchés</th>
                            <th class="py-3 px-6 text-left">Produit</th>
                            <th class="py-3 px-6 text-center">Quantité</th>
                            <th class="py-3 px-6 text-center">Date de livraison</th>
                            <th class="py-3 px-6 text-center">Statut</th>
                            <th class="py-3 px-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <template x-for="(commande, index) in commandes" :key="index">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left" x-text="commande.fournisseur"></td>
                                <td class="py-3 px-6 text-left" x-text="commande.produit"></td>
                                <td class="py-3 px-6 text-center" x-text="commande.quantite"></td>
                                <td class="py-3 px-6 text-center" x-text="commande.date_livraison"></td>
                                <td class="py-3 px-6 text-center" x-text="commande.statut"></td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        <button click="updateStatut(index)" class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>
                                        <button click="supprimerCommande(index)" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('fournisseur.footer')

<script>
    function commandesApp() {
        return {
            nouvelleCommande: {
                suppermarche: '',
                produit: '',
                quantite: 1,
                date_livraison: '',
                statut: 'En attente'
            },
            commandes: [],
            init() {
                this.fetchCommandes();
            },
            fetchCommandes() {
                // Fetch existing commandes from the server
                fetch('/commandes')
                    .then(response => response.json())
                    .then(data => {
                        this.commandes = data;
                    });
            },
            ajouterCommande() {
                fetch('/commandes', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(this.nouvelleCommande)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.commandes.push({ ...this.nouvelleCommande });
                        this.nouvelleCommande = { suppermarche: '', produit: '', quantite: 1, date_livraison: '', statut: 'En attente' };
                    }
                });
            },
            supprimerCommande(index) {
                const commande = this.commandes[index];
                fetch(`/commandes/${commande.id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.commandes.splice(index, 1);
                    }
                });
            },
            updateStatut(index) {
                const commande = this.commandes[index];
                const statuts = ['En attente', 'En cours', 'Livrée'];
                const currentIndex = statuts.indexOf(commande.statut);
                commande.statut = statuts[(currentIndex + 1) % statuts.length];

                fetch(`/commandes/${commande.id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ statut: commande.statut })
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        alert('Erreur lors de la mise à jour du statut.');
                    }
                });
            }
        }
    }

    document.addEventListener('alpine:init', () => {
        Alpine.data('commandesApp', commandesApp);
    });
</script>
</body>
</html>
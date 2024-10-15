<html><head>
    <?php echo $__env->make('fournisseur.deconnexion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Fournisseurs - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://replicate.delivery/yhqm/fJC7fpgk7QrUBUzKbNbsvegmrX5OmSWM0kPJrCrjpY88jhgmA/out-0.webp'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div x-data="dashboard()" class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Interface Fournisseurs - Dashboard</h1>
        
        <!-- Slogan pour les supermarchés -->
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-8" role="alert">
            <p class="font-bold">Notre engagement envers les supermarchés :</p>
            <p>"Ensemble, cultivons la confiance et la qualité pour une chaîne d'approvisionnement performante."</p>
        </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-4">Catalogue de Produits</h2>
                        <a href="<?php echo e(route('fournisseur.product')); ?>" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded w-full block text-center">
                            <i class="fas fa-plus mr-2"></i>Ajouter un produit
                        </a>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-4">Suivi des Commandes</h2>
                        <div class="text-3xl font-bold text-blue-500" x-text="orderCount"></div>
                        <p class="text-gray-600">Commandes en cours</p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-4">Gestion des Stocks</h2>
                        <div class="text-3xl font-bold text-red-500" x-text="lowStockCount"></div>
                        <p class="text-gray-600">Produits en rupture</p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-4">Abonnement</h2>
                        <a href="abonnement" class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded block text-center">
                            <i class="fas fa-star mr-2"></i>S'abonner (Supermarchés)
                        </a>
                    </div>
                </div>
        
                <!-- Barre de recherche pour les supermarchés -->
                <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                    <h2 class="text-xl font-semibold mb-4">Recherche de Produits (pour Supermarchés)</h2>
                    <div class="flex">
                        <input type="text" x-model="searchQuery" placeholder="Rechercher un produit..." class="flex-grow px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button click="searchProducts" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r-lg">
                            <i class="fas fa-search mr-2"></i>Rechercher
                        </button>
                    </div>
                </div>
                
        
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-4">Suivi des Commandes</h2>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="px-4 py-2 text-left">ID</th>
                                        <th class="px-4 py-2 text-left">Statut</th>
                                        <th class="px-4 py-2 text-left">Date</th>
                                        <th class="px-4 py-2 text-left">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="order in orders" :key="order.id">
                                        <tr class="border-b hover:bg-gray-50">
                                            <td class="px-4 py-2" x-text="order.id"></td>
                                            <td class="px-4 py-2">
                                                <span :class="{
                                                    'bg-yellow-200 text-yellow-800': order.status === 'En traitement',
                                                    'bg-blue-200 text-blue-800': order.status === 'Expédiée',
                                                    'bg-green-200 text-green-800': order.status === 'Livrée'
                                                }" class="px-2 py-1 rounded-full text-sm" x-text="order.status"></span>
                                            </td>
                                            <td class="px-4 py-2" x-text="order.date"></td>
                                            <td class="px-4 py-2" x-text="'€' + order.total.toFixed(2)"></td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-4">Analyse des Ventes</h2>
                        <canvas id="salesChart" ></canvas>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md mb-8">
                    <h2 class="text-xl font-semibold mb-4">Gestion des Stocks</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="px-4 py-2 text-left">Produit</th>
                                    <th class="px-4 py-2 text-left">Stock actuel</th>
                                    <th class="px-4 py-2 text-left">Seuil d'alerte</th>
                                    <th class="px-4 py-2 text-left">Statut</th>
                                    <th class="px-4 py-2 text-left">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <template x-for="product in products" :key="product.id">
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-4 py-2" x-text="product.name"></td>
                                        <td class="px-4 py-2" x-text="product.stock"></td>
                                        <td class="px-4 py-2" x-text="product.alertThreshold"></td>
                                        <td class="px-4 py-2">
                                            <span :class="{
                                                'bg-red-200 text-red-800': product.stock <= product.alertThreshold,
                                                'bg-green-200 text-green-800': product.stock > product.alertThreshold
                                            }" class="px-2 py-1 rounded-full text-sm" x-text="product.stock <= product.alertThreshold ? 'Rupture' : 'En stock'"></span>
                                        </td>
                                        <td class="px-4 py-2">
                                            <button click="showModal('product', product)" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded mr-2">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button click="showModal('delete', product)" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
        
                <!-- Modal -->
                <div x-show="modalOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                    <div class="bg-white p-8 rounded-lg max-w-md w-full">
                        <h2 x-text="modalTitle" class="text-2xl font-bold mb-4"></h2>
                        
                        <template x-if="modalType === 'product'">
                            <form submit.prevent="saveProduct">
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 font-bold mb-2">Nom du produit</label>
                                    <input type="text" id="name" x-model="currentProduct.name" required class="w-full px-3 py-2 border rounded-lg">
                                </div>
                                <div class="mb-4">
                                    <label for="price" class="block text-gray-700 font-bold mb-2">Prix</label>
                                    <input type="number" id="price" x-model="currentProduct.price" step="0.01" required class="w-full px-3 py-2 border rounded-lg">
                                </div>
                                <div class="mb-4">
                                    <label for="stock" class="block text-gray-700 font-bold mb-2">Stock</label>
                                    <input type="number" id="stock" x-model="currentProduct.stock" required class="w-full px-3 py-2 border rounded-lg">
                                </div>
                                <div class="mb-4">
                                    <label for="alertThreshold" class="block text-gray-700 font-bold mb-2">Seuil d'alerte</label>
                                    <input type="number" id="alertThreshold" x-model="currentProduct.alertThreshold" required class="w-full px-3 py-2 border rounded-lg">
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" click="closeModal" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                                        Annuler
                                    </button>
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                        Enregistrer
                                    </button>
                                </div>
                            </form>
                        </template>
        
                        <template x-if="modalType === 'delete'">
                            <div>
                                <p class="mb-4">Êtes-vous sûr de vouloir supprimer ce produit ?</p>
                                <div class="flex justify-end">
                                    <button click="closeModal" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                                        Annuler
                                    </button>
                                    <button click="deleteProduct" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                        Confirmer la suppression
                                    </button>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
    
        <!-- Modal -->
        <div x-show="modalOpen" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg max-w-md w-full">
                <h2 x-text="modalTitle" class="text-2xl font-bold mb-4"></h2>
                
                <template x-if="modalType === 'product'">
                    <form submit.prevent="saveProduct">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Nom du produit</label>
                            <input type="text" id="name" x-model="currentProduct.name" required class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 font-bold mb-2">Prix</label>
                            <input type="number" id="price" x-model="currentProduct.price" step="0.01" required class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="mb-4">
                            <label for="stock" class="block text-gray-700 font-bold mb-2">Stock</label>
                            <input type="number" id="stock" x-model="currentProduct.stock" required class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="mb-4">
                            <label for="alertThreshold" class="block text-gray-700 font-bold mb-2">Seuil d'alerte</label>
                            <input type="number" id="alertThreshold" x-model="currentProduct.alertThreshold" required class="w-full px-3 py-2 border rounded-lg">
                        </div>
                        <div class="flex justify-end">
                            <button type="button" click="closeModal" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                                Annuler
                            </button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </template>

                <template x-if="modalType === 'delete'">
                    <div>
                        <p class="mb-4">Êtes-vous sûr de vouloir supprimer ce produit ?</p>
                        <div class="flex justify-end">
                            <button click="closeModal" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                                Annuler
                            </button>
                            <button click="deleteProduct" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                Confirmer la suppression
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
    <?php echo $__env->make('fournisseur.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        function dashboard() {
            return {
                modalOpen: false,
                modalType: '',
                modalTitle: '',
                currentProduct: {},
                searchQuery: '',
                products: [
                    { id: 1, name: 'Produit A', price: 10.99, stock: 50, alertThreshold: 10 },
                    { id: 2, name: 'Produit B', price: 15.99, stock: 30, alertThreshold: 5 },
                    { id: 3, name: 'Produit C', price: 20.99, stock: 20, alertThreshold: 8 }
                ],
                orders: [
                    { id: 1, status: 'En traitement', date: '2023-05-01', total: 55.97 },
                    { id: 2, status: 'Expédiée', date: '2023-04-30', total: 31.98 },
                    { id: 3, status: 'Livrée', date: '2023-04-29', total: 41.98 }
                ],
                get orderCount() {
                    return this.orders.filter(o => o.status !== 'Livrée').length;
                },
                get lowStockCount() {
                    return this.products.filter(p => p.stock <= p.alertThreshold).length;
                },
                showModal(type, product = {}) {
                    this.modalType = type;
                    this.modalTitle = type === 'product' ? (product.id ? 'Modifier le produit' : 'Ajouter un produit') : 'Supprimer le produit';
                    this.currentProduct = { ...product };
                    this.modalOpen = true;
                },
                closeModal() {
                    this.modalOpen = false;
                },
                saveProduct() {
                    if (this.currentProduct.id) {
                        const index = this.products.findIndex(p => p.id === this.currentProduct.id);
                        this.products[index] = { ...this.currentProduct };
                    } else {
                        this.currentProduct.id = Date.now();
                        this.products.push({ ...this.currentProduct });
                    }
                    this.closeModal();
                },
                deleteProduct() {
                    this.products = this.products.filter(p => p.id !== this.currentProduct.id);
                    this.closeModal();
                },
                searchProducts() {
                    // Implémenter la logique de recherche ici
                    console.log('Recherche de produits:', this.searchQuery);
                    // Vous pouvez ajouter une logique pour filtrer les produits basés sur searchQuery
                    // et mettre à jour l'affichage en conséquence
                },
                init() {
                    this.$nextTick(() => {
                        const ctx = document.getElementById('salesChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                                datasets: [{
                                    label: 'Ventes mensuelles',
                                    data: [12, 19, 3, 5, 2, 3],
                                    borderColor: 'rgb(75, 192, 192)',
                                    tension: 0.1
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    });
                }
            }
        }
    </script>
</body>
</html><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/fournisseur/accueil.blade.php ENDPATH**/ ?>
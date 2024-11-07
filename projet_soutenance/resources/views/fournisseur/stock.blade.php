
@include('fournisseur.deconnexion')
<html>
  <head><title>Gestion des Stocks </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
      @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
      }
      .pulse-animation {
        animation: pulse 2s infinite;
      }
    </style>
    </head>
    <body class="bg-gray-100 min-h-screen">
      <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
          <h1 class="text-2xl font-bold">StockManager</h1>
          <div>
            <button id="notificationBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
              </svg>
              Notifications
            </button>
          </div>
        </div>
      </nav>
    
      <main class="container mx-auto mt-8 px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Vue d'ensemble -->
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Vue d'ensemble</h2>
            <canvas id="overviewChart"></canvas>
          </div>
    
          <!-- Liste des produits -->
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Liste des produits</h2>
            <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3">Produit</th>
                    <th scope="col" class="px-6 py-3">Stock actuel</th>
                    <th scope="col" class="px-6 py-3">Seuil d'alerte</th>
                  </tr>
                </thead>
                <tbody id="productList">
                  <!-- Les produits seront ajoutés ici dynamiquement -->
                </tbody>
              </table>
            </div>
          </div>
    
          <!-- Formulaire d'ajout de produit -->
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Ajouter un produit</h2>
            <form id="addProductForm">
              <div class="mb-4">
                <label for="product_name" class="block text-gray-700 text-sm font-bold mb-2">Nom du produit</label>
                <input type="text" id="product_name" name="product_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
              </div>
              <div class="mb-4">
                <label for="current_stock" class="block text-gray-700 text-sm font-bold mb-2">Stock actuel</label>
                <input type="number" id="current_stock" name="current_stock" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
              </div>
              <div class="mb-6">
                <label for="alert_threshold" class="block text-gray-700 text-sm font-bold mb-2">Seuil d'alerte</label>
                <input type="number" id="alert_threshold" name="alert_threshold" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
              </div>
              <div class="flex items-center justify-between">
                <button type="submit" name="submit"   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                  Ajouter le produit
                </button>
              </div>
            </form>
          </div>
        </div>
      </main>
    
      <!-- Modal pour les notifications -->
      <div id="notificationModal" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                  <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                  </svg>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                  <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                    Alertes de stock bas
                  </h3>
                  <div class="mt-2">
                    <p class="text-sm text-gray-500" id="notificationContent">
                      <!-- Le contenu des notifications sera inséré ici -->
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <button type="button" id="closeModalBtn" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Fermer
              </button>
            </div>
          </div>
        </div>
      </div>
      <script>
        // Données factices pour la démonstration
        const products = [
            { name: "Banane", current_stock: 50, alert_threshold: 20 },
            { name: "carotte", current_stock: 15, alert_threshold: 25 },
            { name: "huile", current_stock: 100, alert_threshold: 30 },
        ];
    
        // Fonction pour mettre à jour la liste des produits
        function updateProductList() {
            const productList = document.getElementById('productList');
            productList.innerHTML = '';
            products.forEach(product => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="px-6 py-4">${product.name}</td>
                    <td class="px-6 py-4">${product.current_stock}</td>
                    <td class="px-6 py-4">${product.alert_threshold}</td>
                `;
                if (product.current_stock < product.alert_threshold) {
                    row.classList.add('bg-red-100');
                }
                productList.appendChild(row);
            });
        }
    
        // Fonction pour mettre à jour le graphique
        function updateChart() {
            const ctx = document.getElementById('overviewChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: products.map(p => p.name),
                    datasets: [{
                        label: 'Stock actuel',
                        data: products.map(p => p.currentStock),
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgb(54, 162, 235)',
                        borderWidth: 1
                    }, {
                        label: 'Seuil d\'alerte',
                        data: products.map(p => p.alertThreshold),
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgb(255, 99, 132)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    
        // Fonction pour vérifier les alertes
        function checkAlerts() {
            const lowStockProducts = products.filter(p => p.current_stock < p.alert_threshold);
            if (lowStockProducts.length > 0) {
                document.getElementById('notificationBtn').classList.add('pulse-animation');
            } else {
                document.getElementById('notificationBtn').classList.remove('pulse-animation');
            }
        }
    
        // Initialisation
        updateProductList();
        updateChart();
        checkAlerts();
    
        // Gestion du formulaire d'ajout de produit
        document.getElementById('addProductForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const newProduct = {
                name: document.getElementById('product_name').value,
                current_stock: parseInt(document.getElementById('current_stock').value),
                alert_threshold: parseInt(document.getElementById('alert_threshold').value)
            };
    
            // Envoi des données au serveur
            fetch('/stocks', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(newProduct)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    products.push(newProduct); // Ajoute le produit à la liste locale
                    updateProductList();
                    updateChart();
                    checkAlerts();
                    this.reset(); // Réinitialise le formulaire
                }
            })
            .catch(error => console.error('Erreur:', error));
        });
    
        // Gestion des notifications
        const notificationBtn = document.getElementById('notificationBtn');
        const notificationModal = document.getElementById('notificationModal');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const notificationContent = document.getElementById('notificationContent');
    
        notificationBtn.addEventListener('click', function() {
            const lowStockProducts = products.filter(p => p.current_stock < p.alert_threshold);
            if (lowStockProducts.length > 0) {
                notificationContent.innerHTML = lowStockProducts.map(p => 
                    `<p class="mb-2">Le stock de <strong>${p.name}</strong> est bas (${p.currentStock}). Seuil d'alerte : ${p.alertThreshold}.</p>`
                ).join('');
            } else {
                notificationContent.innerHTML = "<p>Aucune alerte de stock bas pour le moment.</p>";
            }
            notificationModal.classList.remove('hidden');
        });
    
        closeModalBtn.addEventListener('click', function() {
            notificationModal.classList.add('hidden');
        });
    
        // Fermer le modal en cliquant en dehors
        window.addEventListener('click', function(event) {
            if (event.target === notificationModal) {
                notificationModal.classList.add('hidden');
            }
        });
    </script>
    
    </body></html>
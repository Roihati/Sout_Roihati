<html><head><base href="https://cdn.tailwindcss.com/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <title>Système de Gestion d'Inventaire Avancé</title>
    <style>
      @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
      }
      .pulse {
        animation: pulse 2s infinite;
      }
    </style>
    </head>
    <body class="bg-gray-50 font-sans text-gray-800">
      <nav class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white shadow-lg">
        <div class="container mx-auto px-4 py-3">
          <div class="flex justify-between items-center">
            <h1 class="text-3xl font-extrabold">InventoryPro</h1>
            <div class="hidden md:flex space-x-4">
              <a href="https://inventorypro.com/dashboard" class="px-4 py-2 hover:bg-white hover:bg-opacity-20 rounded-full transition duration-300">Tableau de bord</a>
              <a href="https://inventorypro.com/products" class="px-4 py-2 hover:bg-white hover:bg-opacity-20 rounded-full transition duration-300">Produits</a>
              <a href="https://inventorypro.com/suppliers" class="px-4 py-2 hover:bg-white hover:bg-opacity-20 rounded-full transition duration-300">Fournisseurs</a>
              <a href="https://inventorypro.com/reports" class="px-4 py-2 hover:bg-white hover:bg-opacity-20 rounded-full transition duration-300">Rapports</a>
            </div>
            <button class="md:hidden focus:outline-none">
              <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
            </button>
          </div>
        </div>
      </nav>
    
      <main class="container mx-auto mt-8 px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Catalogue des produits -->
          <section class="bg-white rounded-xl shadow-md overflow-hidden transition duration-300 hover:shadow-xl">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-4">
              <h2 class="text-xl font-semibold text-white">Catalogue des produits</h2>
            </div>
            <div class="p-6">
              <div class="overflow-x-auto">
                <table class="w-full table-auto">
                  <thead>
                    <tr class="bg-gray-100">
                      <th class="px-4 py-2 text-left">Produit</th>
                      <th class="px-4 py-2 text-left">Fournisseur</th>
                      <th class="px-4 py-2 text-left">Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="hover:bg-gray-50">
                      <td class="border-t px-4 py-2">Produit A</td>
                      <td class="border-t px-4 py-2">Fournisseur 1</td>
                      <td class="border-t px-4 py-2">150</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                      <td class="border-t px-4 py-2">Produit B</td>
                      <td class="border-t px-4 py-2">Fournisseur 2</td>
                      <td class="border-t px-4 py-2">75</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
    
          <!-- Gestion des niveaux de stock -->
          <section class="bg-white rounded-xl shadow-md overflow-hidden transition duration-300 hover:shadow-xl">
            <div class="bg-gradient-to-r from-green-500 to-teal-600 p-4">
              <h2 class="text-xl font-semibold text-white">Niveaux de stock</h2>
            </div>
            <div class="p-6 space-y-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Produit A</label>
                <div class="relative pt-1">
                  <div class="overflow-hidden h-3 mb-4 text-xs flex rounded-full bg-blue-200">
                    <div style="width:60%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 rounded-full transition-all duration-500"></div>
                  </div>
                  <div class="flex justify-between text-xs text-gray-600">
                    <span>Min: 50</span>
                    <span>Actuel: 150</span>
                    <span>Max: 200</span>
                  </div>
                </div>
              </div>
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Produit B</label>
                <div class="relative pt-1">
                  <div class="overflow-hidden h-3 mb-4 text-xs flex rounded-full bg-yellow-200">
                    <div style="width:30%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500 rounded-full transition-all duration-500"></div>
                  </div>
                  <div class="flex justify-between text-xs text-gray-600">
                    <span>Min: 25</span>
                    <span>Actuel: 75</span>
                    <span>Max: 150</span>
                  </div>
                </div>
              </div>
            </div>
          </section>
    
          <!-- Alertes de réapprovisionnement -->
          <section class="bg-white rounded-xl shadow-md overflow-hidden transition duration-300 hover:shadow-xl">
            <div class="bg-gradient-to-r from-red-500 to-pink-600 p-4">
              <h2 class="text-xl font-semibold text-white">Alertes de réapprovisionnement</h2>
            </div>
            <div class="p-6">
              <ul class="space-y-4">
                <li class="flex items-center bg-red-100 p-3 rounded-lg">
                  <svg class="h-6 w-6 text-red-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                  </svg>
                  <span class="text-red-700 font-medium">Produit C - Stock bas (5 unités)</span>
                </li>
                <li class="flex items-center bg-yellow-100 p-3 rounded-lg">
                  <svg class="h-6 w-6 text-yellow-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                  </svg>
                  <span class="text-yellow-700 font-medium">Produit D - Approche du seuil min (30 unités)</span>
                </li>
              </ul>
            </div>
          </section>
    
          <!-- Suivi des entrées/sorties -->
          <section class="bg-white rounded-xl shadow-md overflow-hidden transition duration-300 hover:shadow-xl">
            <div class="bg-gradient-to-r from-purple-500 to-indigo-600 p-4">
              <h2 class="text-xl font-semibold text-white">Suivi des entrées/sorties</h2>
            </div>
            <div class="p-6">
              <div class="overflow-x-auto">
                <table class="w-full table-auto">
                  <thead>
                    <tr class="bg-gray-100">
                      <th class="px-4 py-2 text-left">Date</th>
                      <th class="px-4 py-2 text-left">Produit</th>
                      <th class="px-4 py-2 text-left">Type</th>
                      <th class="px-4 py-2 text-left">Quantité</th>
                      <th class="px-4 py-2 text-left">N° Lot</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="hover:bg-gray-50">
                      <td class="border-t px-4 py-2">2023-05-15</td>
                      <td class="border-t px-4 py-2">Produit A</td>
                      <td class="border-t px-4 py-2">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                          Entrée
                        </span>
                      </td>
                      <td class="border-t px-4 py-2">+50</td>
                      <td class="border-t px-4 py-2">LOT-001</td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                      <td class="border-t px-4 py-2">2023-05-16</td>
                      <td class="border-t px-4 py-2">Produit B</td>
                      <td class="border-t px-4 py-2">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                          Sortie
                        </span>
                      </td>
                      <td class="border-t px-4 py-2">-25</td>
                      <td class="border-t px-4 py-2">LOT-002</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
    
          <!-- Inventaire physique -->
          <section class="bg-white rounded-xl shadow-md overflow-hidden transition duration-300 hover:shadow-xl">
            <div class="bg-gradient-to-r from-yellow-500 to-orange-600 p-4">
              <h2 class="text-xl font-semibold text-white">Inventaire physique</h2>
            </div>
            <div class="p-6">
              <form class="space-y-4">
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">Produit</label>
                  <select class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    <option>Produit A</option>
                    <option>Produit B</option>
                    <option>Produit C</option>
                  </select>
                </div>
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-2">Quantité comptée</label>
                  <input type="number" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-yellow-500 to-orange-600 hover:from-yellow-600 hover:to-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition duration-300">
                  Enregistrer
                </button>
              </form>
            </div>
          </section>
    
          <!-- Analyses et rapports -->
          <section class="bg-white rounded-xl shadow-md overflow-hidden transition duration-300 hover:shadow-xl">
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-4">
              <h2 class="text-xl font-semibold text-white">Analyses et rapports</h2>
            </div>
            <div class="p-6 space-y-6">
              <div>
                <h3 class="text-lg font-medium mb-3">Rotation des stocks</h3>
                <canvas id="stockRotationChart" class="w-full"></canvas>
              </div>
              <div>
                <h3 class="text-lg font-medium mb-2">Valeur du stock</h3>
                <p class="text-4xl font-bold text-green-600">125,000 €</p>
              </div>
            </div>
          </section>
        </div>
      </main>
    
      <footer class="bg-gray-800 text-white mt-12 py-8">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap justify-between items-center">
            <div class="w-full md:w-1/3 mb-6 md:mb-0">
              <h3 class="text-2xl font-bold mb-2">InventoryPro</h3>
              <p class="text-gray-400">Solution de gestion d'inventaire avancée</p>
            </div>
            <div class="w-full md:w-1/3 mb-6 md:mb-0">
              <h4 class="text-lg font-semibold mb-2">Liens rapides</h4>
              <ul class="space-y-2">
                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Accueil</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Produits</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Fournisseurs</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Rapports</a></li>
              </ul>
            </div>
            <div class="w-full md:w-1/3">
              <h4 class="text-lg font-semibold mb-2">Nous contacter</h4>
              <p class="text-gray-400 mb-2">Email: contact@inventorypro.com</p>
              <p class="text-gray-400">Tél: +33 1 23 45 67 89</p>
            </div>
          </div>
          <div class="border-t border-gray-700 mt-8 pt-6 text-center">
            <p>&copy; 2023 InventoryPro. Tous droits réservés.</p>
          </div>
        </div>
      </footer>
    
      <script>
        // Chart.js pour la rotation des stocks
        const ctx = document.getElementById('stockRotationChart').getContext('2d');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Produit A', 'Produit B', 'Produit C', 'Produit D'],
            datasets: [{
              label: 'Taux de rotation',
              data: [4.5, 3.2, 5.1, 2.8],
              backgroundColor: [
                'rgba(59, 130, 246, 0.6)',
                'rgba(16, 185, 129, 0.6)',
                'rgba(245, 158, 11, 0.6)',
                'rgba(239, 68, 68, 0.6)'
              ],
              borderColor: [
                'rgba(59, 130, 246, 1)',
                'rgba(16, 185, 129, 1)',
                'rgba(245, 158, 11, 1)',
                'rgba(239, 68, 68, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            scales: {
              y: {
                beginAtZero: true
              }
            },
            plugins: {
              legend: {
                display: false
              }
            }
          }
        });
    
        // Simulation d'alerte en temps réel
        setInterval(() => {
          const alertSection = document.querySelector('section:nth-child(3) ul');
          const newAlert = document.createElement('li');
          newAlert.classList.add('flex', 'items-center', 'bg-red-100', 'p-3', 'rounded-lg', 'pulse', 'mb-4');
          newAlert.innerHTML = `
            <svg class="h-6 w-6 text-red-600 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span class="text-red-700 font-medium">Nouvelle alerte : Produit E - Stock critique (2 unités)</span>
          `;
          alertSection.prepend(newAlert);
          if (alertSection.children.length > 5) {
            alertSection.removeChild(alertSection.lastChild);
          }
        }, 10000);
      </script>
    </body></html><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/suppermarche/inventories.blade.php ENDPATH**/ ?>
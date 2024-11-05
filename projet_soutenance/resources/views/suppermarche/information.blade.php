<html><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système d'Information - Supermarché Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/luxon@3.0.1/build/global/luxon.min.js"></script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
      
      body {
        font-family: 'Poppins', sans-serif;
      }
    
      .glass-effect {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(8px);
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.3);
      }
    
      @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
      }
    
      .float-animation {
        animation: float 4s ease-in-out infinite;
      }
    
      .gradient-border {
        position: relative;
      }
    
      .gradient-border::after {
        content: '';
        position: absolute;
        top: -2px; right: -2px; bottom: -2px; left: -2px;
        background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1);
        border-radius: 12px;
        z-index: -1;
      }
    
      @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
      }
    
      .pulse-animation {
        animation: pulse 2s infinite;
      }
    </style>
    </head>
    <body class="bg-gradient-to-br from-blue-900 via-purple-900 to-pink-800 text-white min-h-screen">
      <nav class="bg-black bg-opacity-50 p-4 sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
          <div class="flex items-center">
            <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
            <h1 class="text-3xl font-bold">SuperMarché </h1>
          </div>
          <div class="flex items-center">
            <span class="mr-4">Pilotez votre supermarché avec précision</span>
            <a href="/suppermarche/supermaket" class="hover:text-pink-400 transition duration-300">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
              </svg>
            </a>
          </div>
        </div>
      </nav>
    
      <div class="container mx-auto mt-8 text-center">
        <div class="inline-flex items-center glass-effect px-6 py-3 rounded-full pulse-animation">
          <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
          </svg>
          <span class="text-xl font-semibold">L'excellence au service de vos décisions</span>
        </div>
      </div>
    
      <main class="container mx-auto mt-12 p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Carte des stocks -->
          <div class="glass-effect p-6 gradient-border">
            <h2 class="text-2xl font-semibold mb-6">État des stocks</h2>
            <div class="space-y-6">
              <div class="flex justify-between items-center">
                <span>Produits en stock</span>
                <span id="stockCount" class="font-bold text-3xl text-green-400"></span>
              </div>
              <div class="flex justify-between items-center">
                <span>Produits en rupture</span>
                <span id="outOfStockCount" class="font-bold text-3xl text-red-400 float-animation"></span>
              </div>
              <div class="flex justify-between items-center">
                <span>Réapprovisionnement prévu</span>
                <span id="restockCount" class="font-bold text-3xl text-blue-400"></span>
              </div>
            </div>
            <a href="/stocks" class="block mt-6 text-pink-400 hover:text-pink-300 transition duration-300 flex items-center">
              <span>Voir détails</span>
              <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
    
          <!-- Carte des ventes -->
          <div class="glass-effect p-6 gradient-border">
            <h2 class="text-2xl font-semibold mb-6">Rapport des ventes</h2>
            <canvas id="salesChart" width="400" height="200"></canvas>
            <a href="/ventes" class="block mt-6 text-pink-400 hover:text-pink-300 transition duration-300 flex items-center">
              <span>Voir rapport complet</span>
              <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
    
          <!-- Carte des alertes -->
          <div class="glass-effect p-6 gradient-border">
            <h2 class="text-2xl font-semibold mb-6">Alertes</h2>
            <ul id="alertList" class="space-y-4">
              <!-- Les alertes seront insérées ici dynamiquement -->
            </ul>
          </div>
        </div>
    
        <!-- Tableau des produits à réapprovisionner -->
        <div class="mt-12 glass-effect p-6 gradient-border">
          <h2 class="text-2xl font-semibold mb-6">Produits à réapprovisionner</h2>
          <div class="overflow-x-auto">
            <table class="w-full text-left">
              <thead>
                <tr class="bg-black bg-opacity-20">
                  <th class="p-3">Produit</th>
                  <th class="p-3">Stock actuel</th>
                  <th class="p-3">Seuil d'alerte</th>
                  <th class="p-3">Délai de réapprovisionnement</th>
                </tr>
              </thead>
              <tbody id="restockTable">
                <!-- Les données seront insérées ici dynamiquement -->
              </tbody>
            </table>
          </div>
        </div>
      </main>
    @include('fournisseur.footer')
      <script>
        const DateTime = luxon.DateTime;
    
        // Fonction pour générer des données aléatoires
        function getRandomInt(min, max) {
          return Math.floor(Math.random() * (max - min + 1)) + min;
        }
    
        // Mise à jour des stocks
        function updateStocks() {
          document.getElementById('stockCount').textContent = getRandomInt(1000, 1500);
          document.getElementById('outOfStockCount').textContent = getRandomInt(5, 20);
          document.getElementById('restockCount').textContent = getRandomInt(30, 60);
        }
    
        // Mise à jour du graphique des ventes
        function updateSalesChart() {
          const ctx = document.getElementById('salesChart').getContext('2d');
          const today = DateTime.now();
          const labels = Array.from({length: 7}, (_, i) => today.minus({days: i}).toFormat('ccc'));
          const data = Array.from({length: 7}, () => getRandomInt(10000, 30000));
    
          new Chart(ctx, {
            type: 'line',
            data: {
              labels: labels.reverse(),
              datasets: [{
                label: 'Ventes quotidiennes',
                data: data.reverse(),
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                tension: 0.4,
                fill: true
              }]
            },
            options: {
              responsive: true,
              scales: {
                y: {
                  beginAtZero: true,
                  grid: {
                    color: 'rgba(255, 255, 255, 0.1)'
                  }
                },
                x: {
                  grid: {
                    color: 'rgba(255, 255, 255, 0.1)'
                  }
                }
              },
              plugins: {
                legend: {
                  labels: {
                    color: 'white'
                  }
                }
              }
            }
          });
        }
    
        // Mise à jour des alertes
        function updateAlerts() {
          const alertList = document.getElementById('alertList');
          alertList.innerHTML = ''; // Effacer les alertes existantes
    
          const alerts = [
            {type: 'danger', message: 'Rupture de stock : Lait frais'},
            {type: 'warning', message: 'Stock faible : Pain de mie'},
            {type: 'info', message: 'Nouvelle livraison prévue demain'}
          ];
    
          alerts.forEach(alert => {
            const li = document.createElement('li');
            li.className = `flex items-center ${alert.type === 'danger' ? 'text-red-400' : alert.type === 'warning' ? 'text-yellow-400' : 'text-blue-400'}`;
            li.innerHTML = `
              <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
              </svg>
              ${alert.message}
            `;
            alertList.appendChild(li);
          });
        }
    
        // Mise à jour du tableau de réapprovisionnement
        function updateRestockTable() {
          const table = document.getElementById('restockTable');
          table.innerHTML = ''; // Effacer les lignes existantes
    
          const products = [
            {name: 'Lait frais', stock: 0, threshold: 20, delay: '2 jours'},
            {name: 'Pain de mie', stock: 5, threshold: 15, delay: '1 jour'},
            {name: 'Œufs', stock: 30, threshold: 50, delay: '3 jours'}
          ];
    
          products.forEach((product, index) => {
            const row = table.insertRow();
            row.className = index % 2 === 0 ? 'bg-black bg-opacity-10' : '';
            row.innerHTML = `
              <td class="p-3">${product.name}</td>
              <td class="p-3 ${product.stock === 0 ? 'text-red-400' : product.stock < product.threshold ? 'text-yellow-400' : ''}">${product.stock}</td>
              <td class="p-3">${product.threshold}</td>
              <td class="p-3">${product.delay}</td>
            `;
          });
        }
    
        // Initialisation et mise à jour périodique
        function init() {
          updateStocks();
          updateSalesChart();
          updateAlerts();
          updateRestockTable();
    
          // Mise à jour toutes les 30 secondes
          setInterval(() => {
            updateStocks();
            updateAlerts();
            updateRestockTable();
          }, 30000);
        }
    
        // Lancer l'initialisation au chargement de la page
        window.addEventListener('load', init);
      </script>
    </body></html>
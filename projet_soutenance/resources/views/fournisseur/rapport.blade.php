<html><head>
  @include('fournisseur.deconnexion')
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord des fournisseurs - Rapports et Analyses</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  
  <style>
    .gradient-bg {
      background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
    }
    .card {
      transition: all 0.3s ease;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
  </style>
  </head>
  <body class="bg-gray-100 font-sans">
    <nav class="gradient-bg p-4 text-white">
      <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-2xl font-bold">Tableau de Rapports et Analyses </h1>
        <a href="#" class="bg-white text-green-500 py-2 px-4 rounded-full hover:bg-green-100 transition duration-300">Déconnexion</a>
      </div>
    </nav>
  
    <main class="container mx-auto mt-8 p-4">
      <h2 class="text-3xl font-semibold mb-6">Rapports et Analyses</h2>
  
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="card bg-white rounded-lg shadow-md p-6">
          <h3 class="text-xl font-semibold mb-4">Saisie de données</h3>
          <form id="salesForm" class="space-y-4">
            <div>
              <label for="sales" class="block text-sm font-medium text-gray-700">Chiffre d'affaires</label>
              <input type="number" id="sales" name="sales" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
            </div>
            <div>
              <label for="units_sold" class="block text-sm font-medium text-gray-700">Unités vendues</label>
              <input type="number" id="units_sold" name="units_sold" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
            </div>
            <div>
              <label for="market_share" class="block text-sm font-medium text-gray-700">Part de marché (%)</label>
              <input type="number" id="market_share" name="market_share" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50">
            </div>
            <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 transition duration-300">Soumettre le rapport</button>
          </form>
        </div>
  
        <div class="card bg-white rounded-lg shadow-md p-6">
          <h3 class="text-xl font-semibold mb-4">Performances de ventes</h3>
          <canvas id="salesChart" width="400" height="200"></canvas>
        </div>
  
        <div class="card bg-white rounded-lg shadow-md p-6">
          <h3 class="text-xl font-semibold mb-4">Tendances du marché</h3>
          <ul id="marketTrends" class="space-y-2">
            <!-- Les tendances seront mises à jour dynamiquement ici -->
          </ul>
        </div>
      </div>
    </main>
  @include('fournisseur.footer')
    <script>
      let salesData = [12, 19, 3, 5, 2, 3];
      let salesChart;
  
      function updateChart() {
        if (salesChart) {
          salesChart.destroy();
        }
        const ctx = document.getElementById('salesChart').getContext('2d');
        salesChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
            datasets: [{
              label: 'Ventes mensuelles',
              data: salesData,
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
      }
  
      function updateMarketTrends() {
        const lastSales = salesData[salesData.length - 1];
        const prevSales = salesData[salesData.length - 2] || lastSales;
        const growthRate = ((lastSales - prevSales) / prevSales) * 100;
        
        const marketShareInput = document.getElementById('market_share');
        const marketShare = parseFloat(marketShareInput.value) || 0;
  
        const trendsHtml = `
          <li class="flex items-center">
            <svg class="w-4 h-4 mr-2 ${growthRate >= 0 ? 'text-green-500' : 'text-red-500'}" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm${growthRate >= 0 ? '3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z' : '8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z'}" clip-rule="evenodd"></path>
            </svg>
            Croissance des ventes : ${growthRate.toFixed(1)}%
          </li>
          <li class="flex items-center">
            <svg class="w-4 h-4 mr-2 ${marketShare >= 10 ? 'text-green-500' : 'text-yellow-500'}" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
            </svg>
            Part de marché : ${marketShare.toFixed(1)}%
          </li>
          <li class="flex items-center">
            <svg class="w-4 h-4 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 2v8h8V6H6z" clip-rule="evenodd"></path>
            </svg>
            Prévision prochaine période : ${(lastSales * (1 + growthRate/100)).toFixed(0)} unités
          </li>
        `;
  
        document.getElementById('marketTrends').innerHTML = trendsHtml;
      }
  
      document.getElementById('salesForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const sales = parseFloat(document.getElementById('sales').value);
        const unitsSold = parseInt(document.getElementById('units_sold').value);
        
        if (!isNaN(sales) && !isNaN(unitsSold)) {
          salesData.push(unitsSold);
          if (salesData.length > 6) {
            salesData.shift();
          }
          updateChart();
          updateMarketTrends();
        }
  
        alert('Rapport soumis avec succès !');
      });
  
      // Initialisation
      updateChart();
      updateMarketTrends();
    </script>
  </body>
  </html>
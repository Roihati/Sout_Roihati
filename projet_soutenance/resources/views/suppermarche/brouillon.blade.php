@extends('adminlte::page')

@section('title', 'Gestion des Inventaires')

@section('content_header')
    <h1 class="text-3xl font-bold text-gray-800">
        <a href="/suppermarche/supermaket" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Inventaires
        </a>
    </h1>
@stop
@section('content')
<html><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Stocks - Supermarchés</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="bg-gray-100">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-8 text-center text-green-600">Gestion des Stocks - Supermarchés</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-2xl font-semibold mb-4">Ajouter un produit au stock</h2>
                    <form id="addStockForm">
                        <div class="mb-4">
                            <label for="product" class="block text-sm font-medium text-gray-700 mb-2">Produit</label>
                            <select id="product" name="product" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">Sélectionnez un produit</option>
                                <option value="1">Pommes</option>
                                <option value="2">Lait45</option>
                                <option value="3">Pain</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="supplier" class="block text-sm font-medium text-gray-700 mb-2">Fournisseur</label>
                            <select id="supplier" name="supplier" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                                <option value="">Sélectionnez un fournisseur</option>
                                <option value="1">Ferme Durand</option>
                                <option value="2">zjhd</option>
                                <option value="3">Boulangerie Dupont45</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Quantité</label>
                            <input type="number" id="quantity" name="quantity" min="0" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div class="mb-4">
                            <label for="expiry_date" class="block text-sm font-medium text-gray-700 mb-2">Date d'expiration</label>
                            <input type="date" id="expiry_date" name="expiry_date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Ajouter au stock
                        </button>
                    </form>
                </div>
                
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-2xl font-semibold mb-4">Aperçu des stocks</h2>
                    <canvas id="stockChart" width="400" height="200"></canvas>
                </div>
            </div>
            
            <div class="mt-8 bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Inventaire actuel</h2>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2 text-left">Produit</th>
                                <th class="px-4 py-2 text-left">Fournisseur</th>
                                <th class="px-4 py-2 text-left">Quantité</th>
                                <th class="px-4 py-2 text-left">Date d'expiration</th>
                                <th class="px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="inventoryTable">
                            <!-- Le contenu du tableau sera rempli dynamiquement par JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('fournisseur.footer')
        <script>
            // Données factices pour l'inventaire
            const inventoryData = [
                { id: 1, product: 'Pommes', supplier: 'Ferme Durand', quantity: 500, expiryDate: '2024-06-30' },
                { id: 2, product: 'Lait', supplier: 'ehjr', quantity: 200, expiryDate: '2024-05-15' },
                { id: 3, product: 'Pain', supplier: 'ghjre', quantity: 100, expiryDate: '2024-05-10' },
            ];
    
            // Fonction pour remplir le tableau d'inventaire
            function populateInventoryTable() {
                const table = document.getElementById('inventoryTable');
                table.innerHTML = '';
                inventoryData.forEach(item => {
                    const row = `
                        <tr>
                            <td class="border px-4 py-2">${item.product}</td>
                            <td class="border px-4 py-2">${item.supplier}</td>
                            <td class="border px-4 py-2">${item.quantity}</td>
                            <td class="border px-4 py-2">${item.expiryDate}</td>
                            <td class="border px-4 py-2">
                                <button class="bg-blue-500 text-white py-1 px-2 rounded-md hover:bg-blue-600 mr-2" onclick="editItem(${item.id})">Modifier</button>
                                <button class="bg-red-500 text-white py-1 px-2 rounded-md hover:bg-red-600" onclick="deleteItem(${item.id})">Supprimer</button>
                            </td>
                        </tr>
                    `;
                    table.innerHTML += row;
                });
            }
    
            // Fonction pour créer le graphique des stocks
            function createStockChart() {
                const ctx = document.getElementById('stockChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: inventoryData.map(item => item.product),
                        datasets: [{
                            label: 'Quantité en stock',
                            data: inventoryData.map(item => item.quantity),
                            backgroundColor: 'rgba(75, 192, 192, 0.6)',
                            borderColor: 'rgba(75, 192, 192, 1)',
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
    
            // Fonction pour ajouter un produit au stock
            document.getElementById('addStockForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const product = document.getElementById('product').value;
                const supplier = document.getElementById('supplier').value;
                const quantity = document.getElementById('quantity').value;
                const expiryDate = document.getElementById('expiry_date').value;
                
                if (product && supplier && quantity && expiryDate) {
                    const newItem = {
                        id: inventoryData.length + 1,
                        product: document.getElementById('product').options[document.getElementById('product').selectedIndex].text,
                        supplier: document.getElementById('supplier').options[document.getElementById('supplier').selectedIndex].text,
                        quantity: parseInt(quantity),
                        expiryDate: expiryDate
                    };
                    inventoryData.push(newItem);
                    populateInventoryTable();
                    createStockChart();
                    this.reset();
                    alert('Produit ajouté au stock avec succès !');
                } else {
                    alert('Veuillez remplir tous les champs.');
                }
            });
    
            // Fonction pour modifier un produit
            function editItem(id) {
                const item = inventoryData.find(item => item.id === id);
                if (item) {
                    const newQuantity = prompt(`Modifier la quantité pour ${item.product}`, item.quantity);
                    if (newQuantity !== null) {
                        item.quantity = parseInt(newQuantity);
                        populateInventoryTable();
                        createStockChart();
                    }
                }
            }
    
            // Fonction pour supprimer un produit
            function deleteItem(id) {
                if (confirm('Êtes-vous sûr de vouloir supprimer ce produit du stock ?')) {
                    const index = inventoryData.findIndex(item => item.id === id);
                    if (index !== -1) {
                        inventoryData.splice(index, 1);
                        populateInventoryTable();
                        createStockChart();
                    }
                }
            }
    
            // Initialisation
            populateInventoryTable();
            createStockChart();
        </script>
    </body></html>
@stop
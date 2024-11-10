<html><head>
    @include('fournisseur.deconnexion')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Fournisseurs</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://img.passeportsante.net/1200x675/2021-05-03/i101971-banane-nu.webp'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div x-data="dashboard()" class="container mx-auto px-4 py-8">
   
        <!-- Slogan pour les supermarchés -->
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 mb-8" role="alert">
            <p class="font-bold">Notre engagement envers les supermarchés :</p>
            <p>"Ensemble, cultivons la confiance et la qualité pour une chaîne d'approvisionnement performante."</p>
        </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-4">Catalogue de Produits</h2>
                        <a href="{{ route('fournisseur.product') }}" class="mt-4 bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded w-full">
                            <i class="fas fa-plus mr-2"></i>Ajouter un produit
                        </a>
                    </div>

                    <!-- Order Tracking Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Suivi des Commandes</h2>
            <div class="text-3xl font-bold text-green-500 mb-2">24</div>
            <p class="text-gray-600">Commandes actives</p>
            <button class="mt-4 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded w-full">
                <i class="fas fa-truck mr-2"></i>Voir les détails
            </button>
        </div>
                 <!-- Stock Management Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Gestion des Stocks</h2>
            <div class="text-3xl font-bold text-red-500 mb-2">15</div>
            <p class="text-gray-600">Produits en rupture</p>
            <button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-full">
                <i class="fas fa-sync-alt mr-2"></i>Mettre à jour
            </button>
        </div>
                   
        <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-4">Abonnement</h2>
                        <a href="{{ route('fournisseur.abonnement') }}" class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded block text-center">
                            <i class="fas fa-star mr-2"></i>S'abonner (Supermarchés)
                        </a>
                    </div>
                </div>
              
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-4">Analyse des Ventes</h2>
                        <canvas id="salesChart" ></canvas>
                    </div>
                  </div>
    <script>
        window.onload = function() {
            const ctx = document.getElementById('salesChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
                    datasets: [{
                        label: 'Ventes 2023',
                        data: [12500, 15000, 18000, 16500, 21000, 22000, 25000, 23000, 27000, 28500, 30000, 32000],
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.3,
                        fill: true
                    },
                    {
                        label: 'Ventes 2022',
                        data: [10000, 13000, 15000, 14500, 18000, 19500, 21000, 20000, 23000, 24500, 26000, 28000],
                        borderColor: 'rgb(255, 99, 132)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Évolution des ventes mensuelles'
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            titleFont: {
                                size: 14,
                                weight: 'bold'
                            },
                            bodyFont: {
                                size: 13
                            },
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        label += new Intl.NumberFormat('fr-FR', { 
                                            style: 'currency', 
                                            currency: 'EUR' 
                                        }).format(context.parsed.y);
                                    }
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Ventes en €'
                            },
                            ticks: {
                                callback: function(value) {
                                    return value.toLocaleString() + ' €';
                                }
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Mois'
                            }
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeInOutQuart'
                    },
                    elements: {
                        point: {
                            radius: 4,
                            hoverRadius: 6,
                            backgroundColor: 'white',
                            borderWidth: 2
                        },
                        line: {
                            borderWidth: 3
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>
    
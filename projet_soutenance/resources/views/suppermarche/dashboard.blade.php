
@extends('adminlte::page')

@section('title', 'Gestion des Supermarchés')

@section('content_header')
<html><head>
<title> Gestion des Supermarchés</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-image: url('https://img.passeportsante.net/1200x675/2021-05-03/i101971-banane-nu.webp');
        background-size: cover;
        background-attachment: fixed;
    }
    .glass-effect {
        background: rgba(255, 255, 255, 0.25);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.18);
    }
    .shadow-text {
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }
    .supergest-title {
        font-size: 4rem;
        font-weight: 800;
        background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 0.5rem;
    }
    .supergest-subtitle {
        font-size: 1.5rem;
        color: #ffffff;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.7);
    }
    .supergest-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #ffd700;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
</style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <header class="text-center mb-12">
            <i class="fas fa-shopping-basket supergest-icon"></i>
            <h1 class="supergest-title">SuperGest</h1>
            <p class="supergest-subtitle">Votre solution de gestion de supermarchés</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="glass-effect p-6 rounded-lg">
                <i class="fas fa-users text-4xl text-blue-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Fournisseurs actifs</h3>
                <p class="text-3xl font-bold" id="fournisseurs-actifs">-</p>
                <input type="number" id="input-fournisseurs" class="mt-2 p-2 w-full" placeholder="Saisir le nombre">
            </div>
            <div class="glass-effect p-6 rounded-lg">
                <i class="fas fa-shopping-cart text-4xl text-green-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Commandes en cours</h3>
                <p class="text-3xl font-bold" id="commandes-en-cours">-</p>
                <input type="number" id="input-commandes" class="mt-2 p-2 w-full" placeholder="Saisir le nombre">
            </div>
            <div class="glass-effect p-6 rounded-lg">
                <i class="fas fa-box-open text-4xl text-yellow-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Produits en stock</h3>
                <p class="text-3xl font-bold" id="produits-en-stock">-</p>
                <input type="number" id="input-produits" class="mt-2 p-2 w-full" placeholder="Saisir le nombre">
            </div>
            <div class="glass-effect p-6 rounded-lg">
                <i class="fas fa-chart-line text-4xl text-purple-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Chiffre d'affaires</h3>
                <p class="text-3xl font-bold" id="chiffre-affaires">-</p>
                <input type="number" id="input-chiffre" class="mt-2 p-2 w-full" placeholder="Saisir le montant">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <a href="/fournisseur/commande" class="glass-effect p-4 rounded-lg text-center hover:bg-blue-600 transition duration-300">
                <i class="fas fa-clipboard-list text-2xl mb-2"></i>
                <span class="block">Voir les Commandes</span>
            </a>
            <a href="/suppermarche/Gestion" class="glass-effect p-4 rounded-lg text-center hover:bg-green-600 transition duration-300">
                <i class="fas fa-truck text-2xl mb-2"></i>
                <span class="block">Gérer les Fournisseurs</span>
            </a>
            <a href="/inventories" class="glass-effect p-4 rounded-lg text-center hover:bg-yellow-600 transition duration-300">
                <i class="fas fa-boxes text-2xl mb-2"></i>
                <span class="block">Inventaire des Produits</span>
            </a>
            <a href="/promotions" class="glass-effect p-4 rounded-lg text-center hover:bg-purple-600 transition duration-300">
                <i class="fas fa-percentage text-2xl mb-2"></i>
                <span class="block">Gérer les Promotions</span>
            </a>
        </div>
    </div>
</body>
</html>
@endsection
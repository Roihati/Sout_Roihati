<!DOCTYPE html>
<html lang="fr">
    @include('fournisseur.deconnexion')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
   
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Abonnement Supermarché</title>
</head>

<br>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4">Créer un Abonnement</h2>
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif
        <form action="{{ route('fournisseur.abonnement.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nom_fournisseur" class="block text-gray-700">Nom du Fournisseur</label>
                <input type="text" name="nom_fournisseur" id="nom_fournisseur" required class="border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label for="prix" class="block text-gray-700">Prix (€)</label>
                <input type="number" step="0.01" name="prix" id="prix" required class="border rounded w-full py-2 px-3">
            </div>
            <div class="mb-4">
                <label for="durée" class="block text-gray-700">Durée (mois)</label>
                <input type="number" name="durée" id="durée" required class="border rounded w-full py-2 px-3">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700">status</label>
                <input type="text" name="status" id="status" required class="border rounded w-full py-2 px-3">
            </div>

             
            <div class="flex items-center">
                <button type="submit" class="flex items-center bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-200">
                    <i class="fas fa-paper-plane mr-2"></i> S'abonner
                </button>
            
                <a href="{{ route('fournisseur.dashboard') }}" class="flex items-center ml-4 bg-green-500 text-white py-2 px-4 rounded">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard Abonnement
                </a>
            </div>
            </form>  
    </div>
     
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
<html><head>
    @include('fournisseur.deconnexion')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Produit - Interface Fournisseurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('https://img.passeportsante.net/1200x675/2021-05-03/i101971-banane-nu.webp');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .content-wrapper {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-100">
    <div x-data="addProduct()" class="container mx-auto px-4 py-8">
        <div class="content-wrapper">
            <h1 class="text-3xl font-bold mb-8">Ajouter un Produit</h1>

            <form method="POST" action="{{ route('fournisseur.product.store') }}" enctype="multipart/form-data" class="space-y-6">
                @method('post')
                @csrf
              
                <form method="POST" class="space-y-6">
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700">Nom du produit</label>
                        <input type="text" id="name" name ="name"  x-model="product.nom" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name ="description" x-model="product.description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    </div>
                    
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Prix (€)</label>
                        <input type="number" id="price"  name="price" x-model="product.price" step="0.01" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                    </div>
                    
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700">Stock initial</label>
                        <input type="number" id="stock" name="stock" x-model="product.stock" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>

                        <select id="category" name="category" x-model="product.category" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">Sélectionner une catégorie</option>
                            <option value="fruits">Fruits</option>
                            <option value="legumes">Légumes</option>
                            <option value="viandes">Viandes</option>
                            <option value="produits_laitiers">Produits laitiers</option>
                            <option value="epicerie">Épicerie</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Image du produit</label>
                        <input type="file" id="image" name="image" change="handleImageUpload" accept="image/*" class="mt-1 block w-full">
                    </div>
                    
                    <div x-show="imagePreview" type ="file " class="mt-4">
                        <img src="" name ="" alt="Aperçu de l'image du produit" class="max-w-xs rounded-lg shadow-md">
                    </div>
                    
                    <div>
                        <button type="submit"  name="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Ajouter le produit
                        </button>
                    </div>
                </form>
                
                <div class="mt-8">
                    <a href="#" class="text-indigo-600 hover:text-indigo-800">
                        <i class="fas fa-arrow-left mr-2"></i>Retour au tableau de bord
                    </a>
                </div>
         </div>
        </div>
      </form>
    
</body>
</html>
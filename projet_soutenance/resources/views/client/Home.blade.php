@extends('client.app_client')
@extends('client.deconnexion')
@section('content')
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Interface</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
  <style>
    .card {
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .card-img-top {
      height: 200px;
      object-fit: cover;
    }

    .search-form {
      margin-bottom: 20px;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-danger {
      background-color: #dc3545;
      border-color: #dc3545;
    }

    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
    }

    .btn-warning {
      background-color: #ffc107;
      border-color: #ffc107;
      color: #212529;
    }

    .product-categories {
      background-color: #f5f5f5;
      padding: 1rem;
      border-radius: 5px;
      margin-bottom: 1rem;
    }

    .category-list {
      list-style: none;
      padding: 0;
    }

    .category-item {
      border-bottom: 1px solid #ddd;
      padding: 0.5rem 1rem;
    }

    .category-link {
      text-decoration: none;
      color: #333;
      display: flex;
      align-items: center;
    }

    .category-link i {
      margin-right: 1rem;
    }
  </style>
</head>
<body class="bg-gray-100 p-8">
  <header class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-12 px-4 sm:px-6 lg:px-8 animate-fadeIn">
    <div class="max-w-7xl mx-auto">
      <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-center mb-6">
        Découvrez l'art du shopping en ligne
       
      </h1>
      <p class="text-xl sm:text-2xl text-center max-w-3xl mx-auto">
        Votre destination ultime pour une expérience d'achat incomparable
      </p>
    </div>
  </header>
  <br/>
  <br/>
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap -mx-4">
      <div class="w-full md:w-1/4 px-4">
        <section class="product-categories">
          <h2 class="text-lg font-semibold mb-4">Product Categories</h2>
          <ul class="category-list">
            <li class="category-item">
              <a href="{{ route('client.products') }}" class="category-link">
                <i class="fas fa-shopping-bag"></i> All Products
              </a>
            </li>
            <li class="category-item">
              <a href="{{ route('client.favorite') }}" class="category-link">
                <i class="fas fa-fire"></i> Popular Items
              </a>
            </li>
            <li class="category-item">
              <a href="{{ route('client.order') }}" class="category-link">
                <i class="fas fa-star"></i> New Arrivals
              </a>
            </li>
          </ul>
        </section>
      </div>

      <div class="w-full md:w-3/4 mx-auto">
        <div class="search-form mb-6">
            <form action="client.search" method="GET" class="flex items-center">
                <input type="text" class="form-control flex-grow rounded-l-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Rechercher un produit" name="query">
                <button class="btn btn-primary rounded-r-md text-white px-4 py-2 bg-indigo-600 hover:bg-indigo-700">
                    <i class="fas fa-search"></i> Rechercher
                </button>
            </form>
        </div>
    <div class="flex flex-wrap -mx-4">
        <div class="w-full md:w-1/3 px-4 mb-4">
            <div class="card bg-white rounded-lg shadow">
                <img src="https://replicate.delivery/yhqm/gbPOo8wPn7ogIZL9a1f7gMe4czpOMjQLhY9BsBOtK5jbgZRTA/out-0.webp" class="w-full" alt="Produit 1">
                <div class="p-4">
                    <h5 class="card-title font-semibold">Produit 1</h5>
                    <p class="card-text text-gray-600">Description du produit 1.</p>
                    <div class="flex justify-between items-center">
                        <p class="mb-0 font-bold">9,99 €</p>
                        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                            <i class="fas fa-shopping-cart"></i> Ajouter au panier
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/3 px-4 mb-4">
            <div class="card bg-white rounded-lg shadow">
                <img src="https://replicate.delivery/yhqm/A4esfxHhnBhxKkr8P4LPWg4nahrSx29uK9lVaxs4wxEbgZRTA/out-0.webp" class="w-full" alt="Produit 2">
                <div class="p-4">
                    <h5 class="card-title font-semibold">Produit 2</h5>
                    <p class="card-text text-gray-600">Description du produit 2.</p>
                    <div class="flex justify-between items-center">
                        <p class="mb-0 font-bold">12,99 €</p>
                        <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                            <i class="fas fa-edit"></i> Modifier
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/3 px-4 mb-4">
            <div class="card bg-white rounded-lg shadow">
                <img src="https://replicate.delivery/yhqm/NfxRHwubwYyaLy8ttVPWfZGsopKx7HOWSr9LKNjLlsPbgZRTA/out-0.webp" class="w-full" alt="Produit 2">
                <div class="p-4">
                    <h5 class="card-title font-semibold">Produit 2</h5>
                    <p class="card-text text-gray-600">Description du produit 2.</p>
                    <div class="flex justify-between items-center">
                        <p class="mb-0 font-bold">12,99 €</p>
                        <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            <a href="/product-list" class="text-white no-underline">
                                <i class="fas fa-trash-alt"></i> Vider panier
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/3 px-4 mb-4">
            <div class="card bg-white rounded-lg shadow">
                <img src="https://replicate.delivery/yhqm/MbOSg641KU6zOlDUEFWKKddgekspe3rSlT1h65XOB4GbgZRTA/out-0.webp " class="w-full" alt="Produit 2">
                <div class="p-4">
                    <h5 class="card-title font-semibold">Produit 2</h5>
                    <p class="card-text text-gray-600">Description du produit 2.</p>
                    <div class="flex justify-between items-center">
                        <p class="mb-0 font-bold">12,99 €</p>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            <a href="/product-list" class="text-white no-underline">
                                <i class="fas fa-box"></i> Détails du Produit
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/3 px-4 mb-4">
            <div class="card bg-white rounded-lg shadow">
              <img src="https://replicate.delivery/yhqm/tmW4ngA2edzxPKaWJj7tHo7ZfVsgklaAFPJdWFF4BcxRmZRTA/out-0.webp" class="w-full alt" = "Produit 2">
                <div class="p-4">
                    <h5 class="card-title font-semibold">Produit 2</h5>
                    <p class="card-text text-gray-600">Description du produit 2.</p>
                    <div class="flex justify-between items-center">
                        <p class="mb-0 font-bold">12,99 €</p>
                        <button class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">
                            <a href="/product-list" class="text-white no-underline">
                                <i class="fas fa-list"></i> Liste des Produits
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/3 px-4 mb-4">
            <div class="card bg-white rounded-lg shadow">
                <img src="https://replicate.delivery/yhqm/BBbOADqQTqoWOBbaEfYJfJP2gvb9b8lxV6MH05r98sNOmZRTA/out-0.webp" class="w-full" alt="Produit 2">
                <div class="p-4">
                    <h5 class="card-title font-semibold">Produit 2</h5>
                    <p class="card-text text-gray-600">Description du produit 2.</p>
                    <div class="flex justify-between items-center">
                        <p class="mb-0 font-bold">12,99 €</p>
                        <button class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600">
                            <a href="/shopping-cart" class="text-white no-underline">
                                <i class="fas fa-cart-arrow-down"></i> Retirer du panier
                            </a>
                        </button>
                    </div>
                  </div>
                 </div>
     </div>
    </div>
   <!---formumaire pour ce qui souhaiter s'abonner aux produits de suppermarche------>
        <section class="mt-12 bg-white shadow-lg rounded-lg overflow-hidden">
          <div class="px-4 py-5 sm:p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Abonnez-vous à notre newsletter</h2>
            <p class="text-gray-600 mb-6">Recevez en avant-première nos offres exclusives et nos dernières nouveautés.</p>
            <form class="space-y-4">
              <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="vous@exemple.com">
              </div>
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Votre nom">
              </div>
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input id="terms" name="terms" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                </div>
                <div class="ml-3 text-sm">
                  <label for="terms" class="font-medium text-gray-700">J'accepte les conditions d'utilisation</label>
                </div>
              </div>
              <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  S'abonner
                </button>
              </div>
            </form>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
  @endsection
  <script>
    // Ajouter des écouteurs d'événements pour les boutons "Ajouter au panier"
    const addToCartButtons = document.querySelectorAll('.btn-primary');
    addToCartButtons.forEach(button => {
      button.addEventListener('click', () => {
        // Logique pour ajouter le produit au panier
        console.log('Produit ajouté au panier');
      });
    });
  </script>
</body>
</html>

@extends('client.app_client')
@extends('client.deconnexion')
@section('content')
<div class="container">
    <html><head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Produits Populaires - SuperMarché Élégant</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                primary: '#4F46E5',
                secondary: '#10B981',
                accent: '#F59E0B',
              },
              fontFamily: {
                sans: ['Inter', 'sans-serif'],
              },
            }
          }
        }
        </script>
        <style>
          @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
          
          .product-card { transition: all 0.3s ease; }
          .product-card:hover { transform: translateY(-5px); }
        </style>
        </head>
        <body class="bg-gray-100 text-gray-800 font-sans">
          <div x-data="productData()" x-init="initProducts">
            <header class="bg-white shadow-md sticky top-0 z-50">
              <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
                <div class="flex items-center">
                  <a href="/" class="text-3xl font-bold text-primary mr-4">FAVORITES</a>
                  <a href="/" class="text-gray-600 hover:text-primary transition" title="Retour à l'accueil">
                    <i class="fas fa-home text-2xl"></i>
                  </a>
                </div>
                <div class="flex items-center space-x-4">
                  <a href="#" class="text-gray-600 hover:text-primary transition" @click.prevent="openCart">
                    <i class="fas fa-shopping-cart text-2xl"></i>
                    <span class="ml-1 bg-accent text-white rounded-full px-2 py-1 text-xs" x-text="cartItemCount"></span>
                  </a>
                </div>
              </nav>
            </header>
        
            <main class="container mx-auto mt-8 p-4">
              <h1 class="text-4xl font-bold mb-2 text-center text-primary">Nos Produits Populaires</h1>
              <p class="text-xl text-center text-gray-600 mb-8">Découvrez les favoris de nos clients !</p>
        
              <div class="flex justify-between items-center mb-8">
                <div class="relative">
                  <select x-model="sortBy" @change="sortProducts" class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 leading-tight focus:outline-none focus:ring focus:border-primary">
                    <option value="popularity">Trier par popularité</option>
                    <option value="rating">Trier par note moyenne</option>
                    <option value="price">Trier par prix</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                  </div>
                </div>
              </div>
        
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <template x-for="product in products" :key="product.id">
                  <div class="product-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <img :src="product.image" :alt="product.name" class="w-full h-64 object-cover">
                    <div class="p-6">
                      <div class="flex justify-between items-center mb-4">
                        <h3 x-text="product.name" class="text-xl font-semibold text-gray-800"></h3>
                        <span class="bg-accent text-white px-3 py-1 rounded-full text-sm font-medium">Populaire</span>
                      </div>
                      <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400 mr-2">
                          <template x-for="i in 5">
                            <i :class="{'fas fa-star': i <= product.rating, 'far fa-star': i > product.rating}"></i>
                          </template>
                        </div>
                        <span x-text="`${product.rating.toFixed(1)} (${product.reviewCount} avis)`" class="text-gray-600 text-sm"></span>
                      </div>
                      <p x-text="`Vendu ${product.soldCount} fois`" class="text-gray-600 text-sm mb-4"></p>
                      <div class="flex justify-between items-center">
                        <span x-text="`${product.price.toFixed(2)} €`" class="text-2xl font-bold text-primary"></span>
                        <button @click="addToCart(product)" class="bg-secondary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition transform hover:scale-105">
                          Ajouter au panier
                        </button>
                      </div>
                      <button @click="showDetails(product)" class="mt-4 text-primary hover:underline w-full text-center text-sm">
                        Voir les détails
                      </button>
                    </div>
                  </div>
                </template>
              </div>
        
              <section class="mt-16">
                <h2 class="text-3xl font-bold text-center mb-8 text-primary">Recommandations pour vous</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                  <template x-for="product in recommendedProducts" :key="product.id">
                    <div class="bg-white rounded-xl shadow-md p-4 transition duration-300 hover:shadow-lg">
                      <img src="https://replicate.delivery/yhqm/Te1DYOH3iI1jZiHEwGJqxbACPxsMv1rb2l4WL68FYfEvluRTA/out-0.webp" :alt="product.name" class="w-full h-48 object-cover mb-4 rounded-lg">
                      <h3 x-text="product.name" class="font-semibold text-lg text-gray-800 mb-2"></h3>
                      <p x-text="product.description" class="text-sm text-gray-600"></p>
                    </div>
                  </template>
                </div>
              </section>
            </main>
        
            <!-- Modal pour les détails du produit -->
            <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-cloak>
              <div class="bg-white p-8 rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                <h2 x-text="selectedProduct.name" class="text-3xl font-bold mb-4 text-primary"></h2>
                <img src="https://replicate.delivery/yhqm/vVAXW5qzuxoWD1IqN3amX6xJLWguLR7EI3fSHgGoZ700S3oJA/out-0.webp" :alt="selectedProduct.name" class="w-full h-64 object-cover mb-4 rounded-lg">
                <p x-text="selectedProduct.description" class="mb-4 text-gray-700"></p>
                <div class="mb-4">
                  <h3 class="font-bold text-gray-800">Composition:</h3>
                  <p x-text="selectedProduct.composition" class="text-gray-600"></p>
                </div>
                <div class="mb-4">
                  <h3 class="font-bold text-gray-800">Allergènes:</h3>
                  <p x-text="selectedProduct.allergens" class="text-gray-600"></p>
                </div>
                <div class="mb-4">
                  <h3 class="font-bold text-gray-800">Instructions de préparation:</h3>
                  <p x-text="selectedProduct.instructions" class="text-gray-600"></p>
                </div>
                <div class="mb-4">
                  <h3 class="font-bold text-gray-800">Avis des clients:</h3>
                  <div class="space-y-2">
                    <template x-for="review in selectedProduct.reviews" :key="review.id">
                      <div class="border-b pb-2">
                        <div class="flex items-center">
                          <div class="flex text-yellow-400 mr-2">
                            <template x-for="i in 5">
                              <i :class="{'fas fa-star': i <= review.rating, 'far fa-star': i > review.rating}"></i>
                            </template>
                          </div>
                          <span x-text="review.author" class="font-semibold text-gray-700"></span>
                        </div>
                        <p x-text="review.comment" class="text-gray-600"></p>
                      </div>
                    </template>
                  </div>
                </div>
                <button @click="showModal = false" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition">Fermer</button>
              </div>
            </div>
        
            <!-- Panier -->
            <div x-show="showCart" class="fixed inset-y-0 right-0 max-w-md w-full bg-white shadow-lg p-6 overflow-y-auto z-50" x-cloak>
              <h2 class="text-2xl font-bold mb-4 text-primary">Votre Panier</h2>
              <template x-if="cart.length === 0">
                <p class="text-gray-600">Votre panier est vide.</p>
              </template>
              <template x-if="cart.length > 0">
                <div>
                  <ul class="space-y-4">
                    <template x-for="item in cart" :key="item.id">
                      <li class="flex justify-between items-center border-b pb-2">
                        <div>
                          <h3 x-text="item.name" class="font-semibold text-gray-800"></h3>
                          <p x-text="`${item.price.toFixed(2)} € x ${item.quantity}`" class="text-gray-600"></p>
                        </div>
                        <button @click="removeFromCart(item)" class="text-red-500 hover:text-red-700">
                          <i class="fas fa-trash"></i>
                        </button>
                      </li>
                    </template>
                  </ul>
                  <div class="mt-4 border-t pt-4">
                    <p class="font-bold text-xl text-gray-800">Total: <span x-text="`${cartTotal.toFixed(2)} €`" class="text-primary"></span></p>
                  </div>
                  <button @click="checkout" class="mt-4 bg-secondary text-white px-4 py-2 rounded-lg w-full hover:bg-opacity-90 transition">
                    Passer à la caisse
                  </button>
                </div>
              </template>
              <button @click="showCart = false" class="mt-4 text-gray-500 hover:text-gray-700">Fermer</button>
            </div>
        
          </div>
        
          <script>
            function productData() {
              return {
                products: [],
                recommendedProducts: [],
                sortBy: 'popularity',
                showModal: false,
                selectedProduct: null,
                showCart: false,
                cart: [],
                initProducts() {
                  // Simule une requête à l'API pour obtenir les produits
                  this.products = [
                    { id: 1, name: "Yaourt Bio", price: 2.99, image: "https://replicate.delivery/yhqm/6vvaXrb8c0bEJpPu56Kh3LrhicxH0psYD2ywZmxe2jjRQ3oJA/out-0.webp", rating: 4.5, reviewCount: 120, soldCount: 1500, description: "Yaourt onctueux et naturel", composition: "Lait entier bio, ferments lactiques", allergens: "Lait", instructions: "À conserver au frais", reviews: [{id: 1, author: "Marie", rating: 5, comment: "Délicieux et crémeux!"}, {id: 2, author: "Paul", rating: 4, comment: "Très bon, mais un peu cher."}] },
                    { id: 2, name: "Pain Complet", price: 3.50, image: "https://replicate.delivery/yhqm/mMSiLIL4vOqBFVgo90tUWOgMfj3Wh1Ad0If6omLe3EZEBdjmA/out-0.webp", rating: 4.2, reviewCount: 85, soldCount: 1200, description: "Pain riche en fibres", composition: "Farine complète, levain, sel", allergens: "Gluten", instructions: "À conserver dans un endroit sec", reviews: [{id: 3, author: "Lucie", rating: 4, comment: "Bon pain, se conserve bien."}, {id: 4, author: "Marc", rating: 5, comment: "Parfait pour le petit-déjeuner!"}] },
                    { id: 3, name: "Jus d'Orange Pressé", price: 4.99, image: "https://replicate.delivery/yhqm/ZNgZPcYgRc5NL5rnEkbCJY4XeYeM0r2Nsf8HasUESjXHBdjmA/out-0.webp", rating: 4.8, reviewCount: 200, soldCount: 2000, description: "100% pur jus", composition: "Oranges pressées", allergens: "Aucun", instructions: "À consommer dans les 3 jours après ouverture", reviews: [{id: 5, author: "Sophie", rating: 5, comment: "Le meilleur jus d'orange que j'ai goûté!"}, {id: 6, author: "Thomas", rating: 4, comment: "Très rafraîchissant, mais un peu acide."}] },
                    { id: 4, name: "Fromage de Chèvre Bio", price: 5.99, image: "https://replicate.delivery/yhqm/3jM5bvQTJN6xLRCaQh629vKra3iWwLrRqqjOgjBLktzIob0E/out-0.webp", rating: 4.6, reviewCount: 150, soldCount: 1800, description: "Fromage de chèvre crémeux et savoureux", composition: "Lait de chèvre bio, sel, ferments", allergens: "Lait", instructions: "À conserver au réfrigérateur", reviews: [{id: 7, author: "Julie", rating: 5, comment: "Un délice sur une tranche de pain!"}, {id: 8, author: "Pierre", rating: 4, comment: "Très bon, mais un peu fort pour moi."}] },
                    { id: 5, name: "Huile d'Olive Extra Vierge", price: 8.99, image: "https://replicate.delivery/yhqm/pyeDiuXZYMU3Z6kulE9tAfgNxFa8r5iLpKbeIPFRESsFBdjmA/out-0.webp", rating: 4.9, reviewCount: 180, soldCount: 2200, description: "Huile d'olive premium de Provence", composition: "100% olives", allergens: "Aucun", instructions: "À conserver à l'abri de la lumière", reviews: [{id: 9, author: "Isabelle", rating: 5, comment: "Le goût de la Provence dans mon assiette!"}, {id: 10, author: "François", rating: 5, comment: "Excellente qualité, je recommande."}] },
                    { id: 6, name: "Miel de Lavande", price: 7.50, image: "https://replicate.delivery/yhqm/6cQsongnpdaXIRtvsJtH6MFuWezlplVumvi43gdQ4pzRQ3oJA/out-0.webp", rating: 4.7, reviewCount: 130, soldCount: 1600, description: "Miel doux et parfumé", composition: "100% miel de lavande", allergens: "Aucun", instructions: "À conserver à température ambiante", reviews: [{id: 11, author: "Anne", rating: 5, comment: "Un vrai délice au petit déjeuner!"}, {id: 12, author: "Michel", rating: 4, comment: "Très bon, mais un peu cher."}] },
                  ];
                  this.recommendedProducts = [
                    { id: 7, name: "Confiture de Fraises Bio", image: "https://replicate.delivery/yhqm/74dtDXuaLTJhKhIdaXYfNJ0MeVQosvKaI1fGnVRfFUcNC6GNB/out-0.webp", description: "Parfaite avec votre pain!" },
                    { id: 8, name: "Café Bio Moulu", image: "https://replicate.delivery/yhqm/LCcLnGd1eg2Dek7GrIJiUtsyD5ao39lrBRUTLIGoI75jguRTA/out-0.webp", description: "Pour bien commencer la journée" },
                    { id: 9, name: "Pâtes Fraîches Artisanales", image: "https://replicate.delivery/yhqm/2eyiHONlCTT0caGjdHLgNFO6aqsiJ2mqFXwffm58x6GfW6GNB/out-0.webp", description: "Idéales pour un repas rapide et savoureux" },
                    { id: 10, name: "Thé Vert Jasmin", image: "https://replicate.delivery/yhqm/POjrM0aLJk6HElplLMdxMJLOpA1uaPA6AfVjTq1v7uo3S3oJA/out-0.webp", description: "Une pause détente parfumée" },
                  ];
                },
                sortProducts() {
                  if (this.sortBy === 'popularity') {
                    this.products.sort((a, b) => b.soldCount - a.soldCount);
                  } else if (this.sortBy === 'rating') {
                    this.products.sort((a, b) => b.rating - a.rating);
                  } else if (this.sortBy === 'price') {
                    this.products.sort((a, b) => a.price - b.price);
                  }
                },
                showDetails(product) {
                  this.selectedProduct = product;
                  this.showModal = true;
                },
                addToCart(product) {
                  const existingItem = this.cart.find(item => item.id === product.id);
                  if (existingItem) {
                    existingItem.quantity += 1;
                  } else {
                    this.cart.push({ ...product, quantity: 1 });
                  }
                },
                removeFromCart(item) {
                  const index = this.cart.findIndex(cartItem => cartItem.id === item.id);
                  if (index !== -1) {
                    this.cart.splice(index, 1);
                  }
                },
                get cartItemCount() {
                  return this.cart.reduce((total, item) => total + item.quantity, 0);
                },
                get cartTotal() {
                  return this.cart.reduce((total, item) => total + item.price * item.quantity, 0);
                },
                openCart() {
                  this.showCart = true;
                },
                checkout() {
                  // Ici, vous implémenteriez la logique de paiement
                  alert("Redirection vers la page de paiement sécurisé...");
                }
              }
            }
          </script>
        </body>
        </html>
</div>
@endsection

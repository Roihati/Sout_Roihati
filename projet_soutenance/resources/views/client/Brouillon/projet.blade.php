@extends('client.app_clientt')
@extends('client.deconnexion')
@section('content')
{{-- -mettre  le style de tailwin css --}}
<html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SuperMarché En Ligne - Votre épicerie en ligne de confiance</title>
<script src="https://cdn.tailwindcss.com"></script><script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"><script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#34D399',
            secondary: '#F59E0B',
            accent: '#EF4444',
            darkBlue: '#1E40AF',
          },
          fontFamily: {
            sans: ['Poppins', 'sans-serif'],
          },
        }
      }
    }
  </script></head>
  <body class="bg-gray-50 font-sans">
    <div id="app">
      <header class="bg-gradient-to-r from-primary to-darkBlue text-white p-6 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
          <h1 class="text-4xl font-bold">Produit Disponible</h1>
          <p class="text-xl italic font-light">"Frais, rapide et à votre porte"</p>
        </div>
      </header>
  
      <nav class="bg-white shadow-md p-4 sticky top-0 z-10">
        <div class="container mx-auto">
          <div class="flex justify-between items-center">
            <div class="relative inline-block text-left">
              <button @click="toggleCategoryMenu" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-primary transition duration-150 ease-in-out">
               {{--  {{ selectedCategory ? selectedCategory : 'Toutes les catégories' }}--}} 
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </button>
              <div v-if="showCategoryMenu" class="origin-top-right absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                  <a href="#" @click="selectCategory(null)" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Toutes les catégories</a>
                  <a v-for="category in categories" :  {{-- key="category" href="#" @click="selectCategory(category)" --}} class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{ category }}</a>
                </div>
              </div>
            </div>
            <div class="flex space-x-4">
              <input v-model="searchQuery" @input="filterProducts" type="text" placeholder="Rechercher un produit..." class="border rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary transition duration-150 ease-in-out">
              <select v-model="sortOption" @change="sortProducts" class="border rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary transition duration-150 ease-in-out">
                <option value="">Trier par</option>
                <option value="priceLowToHigh">Prix croissant</option>
                <option value="priceHighToLow">Prix décroissant</option>
                <option value="nameAZ">Nom A-Z</option>
                <option value="nameZA">Nom Z-A</option>
              </select>
            </div>
          </div>
        </div>
      </nav>
  
      <main class="container mx-auto p-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
          <div v-for="product in filteredProducts" :key="product.id" class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300 ease-in-out">
            <img :src="product.image" :alt="product.name" class="w-full h-56 object-cover">
            <div class="p-6">
              <h2 class="text-xl font-semibold mb-2 text-gray-800">{{-- - --}}</h2>
              <p class="text-gray-600 mb-4 h-20 overflow-hidden">{{-- - --}}</p>
              <div class="flex justify-between items-center mb-4">
                <span class="text-accent font-bold text-2xl">{{--  --}} €</span>
                <div class="flex items-center">
                  <span class="text-yellow-500">★</span>
                  <span class="ml-1 text-sm text-gray-600">{{-- -{{ product.rating }} ({{ product.reviews }} --}} avis)</span>
                </div>
              </div>
              <button @click="addToCart(product)" class="w-full bg-secondary text-white px-4 py-2 rounded-full hover:bg-opacity-80 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-opacity-50 transform hover:scale-105">
                Ajouter au panier
              </button>
            </div>
          </div>
        </div>
      </main>
  
      <footer class="bg-darkBlue text-white py-12">
        <div class="container mx-auto text-center">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
              <h3 class="text-xl font-semibold mb-4">À propos</h3>
              <p class="text-gray-300">SuperMarché En Ligne, votre épicerie de confiance depuis 2010.</p>
            </div>
            <div>
              <h3 class="text-xl font-semibold mb-4">Liens rapides</h3>
              <ul class="space-y-2">
                <li><a href="#" class="text-gray-300 hover:text-white transition">Accueil</a></li>
                <li><a href="#" class="text-gray-300 hover:text-white transition">Produits</a></li>
                <li><a href="#" class="text-gray-300 hover:text-white transition">À propos</a></li>
                <li><a href="#" class="text-gray-300 hover:text-white transition">Contact</a></li>
              </ul>
            </div>
            <div>
              <h3 class="text-xl font-semibold mb-4">Contactez-nous</h3>
              <p class="text-gray-300">Email : support@supermarche-en-ligne.example</p>
              <p class="text-gray-300">Tél : +33 1 23 45 67 89</p>
            </div>
          </div>
          <div class="mt-8 pt-8 border-t border-gray-700">
            <p>&copy; 2024 SuperMarché En Ligne. Tous droits réservés.</p>
          </div>
        </div>
      </footer>
    </div>
  
    <script>
      new Vue({
        el: '#app',
        data: {
          categories: ['Fruits et Légumes', 'Produits Laitiers', 'Viandes et Poissons', 'Épicerie', 'Boissons', 'Hygiène et Beauté'],
          selectedCategory: null,
          showCategoryMenu: false,
          searchQuery: '',
          sortOption: '',
          products: [
            { id: 1, name: 'Bananes Bio', category: 'Fruits et Légumes', description: 'Bananes bio Fairtrade, cultivées sans pesticides. Parfaites pour un en-cas sain ou un smoothie énergisant.', price: 1.99, image: 'https://produits.example/bananes.jpg', rating: 4.5, reviews: 120 },
            { id: 2, name: 'Lait Frais Entier', category: 'Produits Laitiers', description: 'Lait entier frais de la ferme, riche en calcium et en vitamines. Idéal pour votre petit-déjeuner ou vos préparations culinaires.', price: 1.29, image: 'https://produits.example/lait.jpg', rating: 4.8, reviews: 250 },
            { id: 3, name: 'Filet de Saumon Sauvage', category: 'Viandes et Poissons', description: 'Filet de saumon frais de l\'Atlantique, riche en oméga-3. Parfait pour un repas sain et savoureux.', price: 12.99, image: 'https://produits.example/saumon.jpg', rating: 4.7, reviews: 180 },
            { id: 4, name: 'Pâtes Complètes Artisanales', category: 'Épicerie', description: 'Pâtes complètes italiennes, fabriquées artisanalement. Riches en fibres et en goût pour des repas équilibrés.', price: 2.49, image: 'https://produits.example/pates.jpg', rating: 4.3, reviews: 90 },
            { id: 5, name: 'Eau Minérale Naturelle', category: 'Boissons', description: 'Eau minérale naturelle des Alpes, pure et rafraîchissante. Idéale pour vous hydrater au quotidien.', price: 0.99, image: 'https://produits.example/eau.jpg', rating: 4.6, reviews: 300 },
            { id: 6, name: 'Shampoing Doux Bio', category: 'Hygiène et Beauté', description: 'Shampoing doux bio pour tous types de cheveux. Formule naturelle qui respecte votre cuir chevelu et l\'environnement.', price: 3.99, image: 'https://produits.example/shampoing.jpg', rating: 4.4, reviews: 150 },
          ]
        },
        computed: {
          filteredProducts() {
            let filtered = this.products;
            if (this.selectedCategory) {
              filtered = filtered.filter(p => p.category === this.selectedCategory);
            }
            if (this.searchQuery) {
              const query = this.searchQuery.toLowerCase();
              filtered = filtered.filter(p => p.name.toLowerCase().includes(query) || p.description.toLowerCase().includes(query));
            }
            return filtered;
          }
        },
        methods: {
          toggleCategoryMenu() {
            this.showCategoryMenu = !this.showCategoryMenu;
          },
          selectCategory(category) {
            this.selectedCategory = category;
            this.showCategoryMenu = false;
          },
          filterProducts() {
            // La computed property filteredProducts s'occupe déjà du filtrage
          },
          sortProducts() {
            switch (this.sortOption) {
              case 'priceLowToHigh':
                this.products.sort((a, b) => a.price - b.price);
                break;
              case 'priceHighToLow':
                this.products.sort((a, b) => b.price - a.price);
                break;
              case 'nameAZ':
                this.products.sort((a, b) => a.name.localeCompare(b.name));
                break;
              case 'nameZA':
                this.products.sort((a, b) => b.name.localeCompare(a.name));
                break;
            }
          },
          addToCart(product) {
            alert(`${product.name} ajouté au panier !`);
            // Ici, vous pouvez implémenter la logique pour ajouter le produit au panier
          }
        }
      });
    </script>
  </body></html>
@endsection

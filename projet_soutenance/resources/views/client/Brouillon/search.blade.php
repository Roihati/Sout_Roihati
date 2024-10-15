<html><head><base href="/search?query=">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de recherche - VotreBoutique</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    </head>
    <body class="bg-gray-100 font-sans leading-normal tracking-normal">
    
    <header class="bg-gradient-to-r from-purple-600 to-blue-500 text-white">
      <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
        <div class="flex items-center">
          <a href="/" class="text-3xl font-bold">
            <i class="fas fa-store mr-2"></i>
            VotreBoutique
          </a>
        </div>
        <div class="flex items-center">
          <a href="/" class="text-lg mx-4 hover:text-gray-300">Accueil</a>
          <a href="/products" class="text-lg mx-4 hover:text-gray-300">Produits</a>
          <a href="/about" class="text-lg mx-4 hover:text-gray-300">À propos</a>
          <a href="/contact" class="text-lg mx-4 hover:text-gray-300">Contact</a>
        </div>
      </nav>
    </header>
    
    <main class="container mx-auto px-6 py-8">
      <h1 class="text-3xl font-bold mb-6">Résultats de recherche</h1>
      
      <div class="mb-8">
        <form action="/search" method="GET" class="flex">
          <input type="text" name="query" placeholder="Rechercher un produit" class="w-full px-4 py-2 rounded-l-lg border-t border-b border-l text-gray-800 border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
          <button type="submit" class="px-4 bg-purple-600 text-white font-semibold rounded-r-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>
    
      <div id="searchResults" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Search results will be dynamically inserted here -->
      </div>
    
      <div id="noResults" class="text-center py-8 hidden">
        <i class="fas fa-search text-5xl text-gray-400 mb-4"></i>
        <p class="text-xl text-gray-600">Aucun résultat trouvé. Essayez une autre recherche.</p>
      </div>
    </main>
    
    <footer class="bg-gray-800 text-white py-8">
      <div class="container mx-auto px-6">
        <div class="flex flex-wrap justify-between">
          <div class="w-full md:w-1/3 mb-6 md:mb-0">
            <h3 class="text-xl font-bold mb-2">À propos de nous</h3>
            <p class="text-gray-400">Nous sommes passionnés par l'offre de produits uniques et d'expériences exceptionnelles à nos clients.</p>
          </div>
          <div class="w-full md:w-1/3 mb-6 md:mb-0">
            <h3 class="text-xl font-bold mb-2">Liens rapides</h3>
            <ul class="text-gray-400">
              <li><a href="/" class="hover:text-white">Accueil</a></li>
              <li><a href="/products" class="hover:text-white">Produits</a></li>
              <li><a href="/about" class="hover:text-white">À propos</a></li>
              <li><a href="/contact" class="hover:text-white">Contact</a></li>
            </ul>
          </div>
          <div class="w-full md:w-1/3 mb-6 md:mb-0">
            <h3 class="text-xl font-bold mb-2">Suivez-nous</h3>
            <div class="flex space-x-4">
              <a href="https://facebook.com/votreboutique" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
              <a href="https://twitter.com/votreboutique" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
              <a href="https://instagram.com/votreboutique" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
              <a href="https://linkedin.com/company/votreboutique" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-sm text-center text-gray-400">
          <p>&copy; 2023 VotreBoutique. Tous droits réservés.</p>
        </div>
      </div>
    </footer>
    
    <script>
    document.addEventListener('DOMContentLoaded', () => {
      const searchResults = document.getElementById('searchResults');
      const noResults = document.getElementById('noResults');
      const urlParams = new URLSearchParams(window.location.search);
      const query = urlParams.get('query');
    
      if (query) {
        // Simulate an API call to fetch search results
        setTimeout(() => {
          const results = generateMockResults(query);
          if (results.length > 0) {
            searchResults.innerHTML = results.map(product => `
              <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="${product.image}" alt="${product.name}" class="w-full h-48 object-cover">
                <div class="p-6">
                  <h3 class="text-xl font-semibold mb-2">${product.name}</h3>
                  <p class="text-gray-600 mb-4">${product.description}</p>
                  <div class="flex justify-between items-center">
                    <span class="text-2xl font-bold text-purple-600">${product.price} €</span>
                    <button class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 transition duration-300">
                      <i class="fas fa-shopping-cart mr-2"></i>
                      Ajouter au panier
                    </button>
                  </div>
                </div>
              </div>
            `).join('');
            noResults.classList.add('hidden');
          } else {
            searchResults.innerHTML = '';
            noResults.classList.remove('hidden');
          }
        }, 500);
      } else {
        searchResults.innerHTML = '<p class="text-center text-gray-600">Veuillez entrer un terme de recherche.</p>';
      }
    });
    
    function generateMockResults(query) {
      const mockProducts = [
        { name: "Smartphone dernière génération", description: "Un téléphone intelligent avec des fonctionnalités avancées.", price: "699,99", image: "https://via.placeholder.com/300x200.png?text=Smartphone" },
        { name: "Ordinateur portable ultra-fin", description: "Léger et puissant, parfait pour le travail en mobilité.", price: "1299,99", image: "https://via.placeholder.com/300x200.png?text=Laptop" },
        { name: "Casque audio sans fil", description: "Une qualité sonore exceptionnelle avec annulation de bruit.", price: "249,99", image: "https://via.placeholder.com/300x200.png?text=Headphones" },
        { name: "Montre connectée fitness", description: "Suivez votre activité et restez en forme.", price: "199,99", image: "https://via.placeholder.com/300x200.png?text=Smartwatch" },
        { name: "Appareil photo reflex", description: "Capturez des moments inoubliables en haute définition.", price: "899,99", image: "https://via.placeholder.com/300x200.png?text=Camera" }
      ];
    
      // Filter products based on the search query
      return mockProducts.filter(product => 
        product.name.toLowerCase().includes(query.toLowerCase()) || 
        product.description.toLowerCase().includes(query.toLowerCase())
      );
    }
    </script>
    
    </body>
    </html>
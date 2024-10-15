
<html><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Gestion des Promotions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
  [v-cloak] { display: none; }
  .promo-banner {
    background-image: url('https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80');
    background-size: cover;
    background-position: center;
    height: 200px;
    position: relative;
  }
  .promo-banner::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.5);
  }
  .promo-text {
    position: relative;
    z-index: 1;
  }
</style>
    </head>
    <body class="bg-gray-100">
        <div id="app" v-cloak class="container mx-auto px-4 py-8">
          <div class="flex justify-between items-center mb-8">
            <a href="/suppermarche/supermaket" class="text-indigo-600 hover:text-indigo-800 transition">
              <i class="fas fa-home text-2xl"></i>
            </a>
            <h1 class="text-3xl font-bold text-center text-indigo-700">
              <i class="fas fa-tags mr-2"></i>Système de Gestion des Promotions
            </h1>
            <div class="w-8"></div> <!-- Espace vide pour équilibrer le layout -->
          </div>
          
          <!-- Nouvelle bannière promotionnelle -->
          <div class="promo-banner rounded-lg shadow-md mb-8 flex items-center justify-center">
            <div class="promo-text text-white text-center">
              <h2 class="text-4xl font-bold mb-2">Promotions Exceptionnelles</h2>
              <p class="text-xl">Gérez vos offres comme un pro !</p>
            </div>
          </div>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Calendrier promotionnel -->
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h2 class="text-2xl font-semibold mb-4 text-indigo-600">Calendrier Promotionnel</h2>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2" for="promotion-type">Type de promotion</label>
            <select id="promotion-type" v-model="newPromotion.type" class="w-full p-2 border rounded">
              <option value="price">Réduction de prix</option>
              <option value="quantity">Offre quantitative</option>
              <option value="bundle">Pack promotionnel</option>
            </select>
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2" for="promotion-date">Date de la promotion</label>
            <input type="date" id="promotion-date" v-model="newPromotion.date" class="w-full p-2 border rounded">
          </div>
          <button @click="addPromotion" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
            <i class="fas fa-plus mr-2"></i>Ajouter la promotion
          </button>
          
          <ul class="mt-4 space-y-2">
            <li v-for="promo in promotions" :key="promo.id" class="flex justify-between items-center bg-gray-100 p-2 rounded">
             {{-- -<span>{{"promo.type" }} - {{ "promo.date" }}</span> --}} 
              <button @click="removePromotion(promo.id)" class="text-red-600 hover:text-red-800">
                <i class="fas fa-trash-alt"></i>
              </button>
            </li>
          </ul>
        </div>
        
        <!-- Règles de prix et de marge -->
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h2 class="text-2xl font-semibold mb-4 text-indigo-600">Règles de Prix et de Marge</h2>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2" for="supplier">Fournisseur</label>
            <select id="supplier" v-model="selectedSupplier" class="w-full p-2 border rounded">
              <option v-for="supplier in suppliers" {{--  :value="supplier.id">{{' supplier.name' }}--}}</option>
            </select>
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2" for="product">Produit</label>
            <select id="product" v-model="selectedProduct" class="w-full p-2 border rounded">
              <option v-for="product in products" {{-- -:value="product.id">{{ 'product.name'}}- --}}</option>
            </select>
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2" for="margin">Marge (%)</label>
            <input type="number" id="margin" v-model="margin" class="w-full p-2 border rounded">
          </div>
          <button @click="saveRule" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
            <i class="fas fa-save mr-2"></i>Enregistrer la règle
          </button>
        </div>
      </div>
      
      <!-- Génération d'étiquettes et affiches -->
      <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-indigo-600">Génération d'Étiquettes et Affiches</h2>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-2" for="promo-product">Produit en promotion</label>
          <select id="promo-product" v-model="selectedPromoProduct" class="w-full p-2 border rounded">
            <option v-for="product in products" {{-- :value="product.id">{{ product.name }} --}}</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-2" for="promo-text">Texte promotionnel</label>
          <input type="text" id="promo-text" v-model="promoText" class="w-full p-2 border rounded">
        </div>
        <button @click="generateLabels" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
          <i class="fas fa-tag mr-2"></i>Générer les étiquettes
        </button>
        <button @click="generatePosters" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition ml-2">
          <i class="fas fa-image mr-2"></i>Générer les affiches
        </button>
      </div>
      
      <!-- Rapports d'analyse -->
      <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-4 text-indigo-600">Rapports d'Analyse des Ventes Promotionnelles</h2>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-2" for="report-period">Période</label>
          <select id="report-period" v-model="reportPeriod" class="w-full p-2 border rounded">
            <option value="week">Cette semaine</option>
            <option value="month">Ce mois</option>
            <option value="quarter">Ce trimestre</option>
          </select>
        </div>
        <button @click="generateReport" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
          <i class="fas fa-chart-bar mr-2"></i>Générer le rapport
        </button>
        
        <div v-if="report" class="mt-4">
          <h3 class="text-xl font-semibold mb-2">Résultats</h3>
          <p>Chiffre d'affaires total : {{--{{ report.totalRevenue }}  --}} €</p>
          <p>Marge totale : {{--  {{ report.totalMargin }}--}} €</p>
          <p>Nombre de produits vendus : {{-- {{ report.productsSold }} --}}</p>
        </div>
      </div>
    </div>
    @include('fournisseur.footer')
    <script>
    new Vue({
      el: '#app',
      data: {
        newPromotion: { type: '', date: '' },
        promotions: [],
        selectedSupplier: null,
        selectedProduct: null,
        margin: 0,
        suppliers: [],
        products: [],
        selectedPromoProduct: null,
        promoText: '',
        reportPeriod: 'week',
        report: null
      },
      methods: {
        addPromotion() {
          // Ici, vous appelleriez votre API Laravel pour ajouter la promotion
          this.promotions.push({ ...this.newPromotion, id: Date.now() });
          this.newPromotion = { type: '', date: '' };
        },
        removePromotion(id) {
          // Ici, vous appelleriez votre API Laravel pour supprimer la promotion
          this.promotions = this.promotions.filter(promo => promo.id !== id);
        },
        saveRule() {
          // Appel à l'API Laravel pour sauvegarder la règle de prix et de marge
          console.log('Règle sauvegardée:', { supplier: this.selectedSupplier, product: this.selectedProduct, margin: this.margin });
        },
        generateLabels() {
          // Appel à l'API Laravel pour générer les étiquettes
          console.log('Génération d\'étiquettes pour:', { product: this.selectedPromoProduct, text: this.promoText });
        },
        generatePosters() {
          // Appel à l'API Laravel pour générer les affiches
          console.log('Génération d\'affiches pour:', { product: this.selectedPromoProduct, text: this.promoText });
        },
        generateReport() {
          // Simulation d'un appel à l'API Laravel pour générer le rapport
          setTimeout(() => {
            this.report = {
              totalRevenue: Math.floor(Math.random() * 100000),
              totalMargin: Math.floor(Math.random() * 50000),
              productsSold: Math.floor(Math.random() * 1000)
            };
          }, 1000);
        }
      },
      mounted() {
        // Simulation de chargement des données depuis l'API Laravel
        this.suppliers = [
          { id: 1, name: 'Fournisseur A' },
          { id: 2, name: 'Fournisseur B' }
        ];
        this.products = [
          { id: 1, name: 'Produit X' },
          { id: 2, name: 'Produit Y' }
        ];
      }
    });
    </script>
    
    </body></html>
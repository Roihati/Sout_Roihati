<?php $__env->startSection('content'); ?>
<html><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveaux Produits</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
      @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
      }
      .float-animation { animation: float 3s ease-in-out infinite; }
      .product-card { transition: all 0.3s ease; }
      .product-card:hover { transform: scale(1.05); box-shadow: 0 10px 20px rgba(0,0,0,0.2); }
      .bg-gradient { background: linear-gradient(45deg, #ff9a9e 0%, #fad0c4 99%, #fad0c4 100%); }
    </style>
    </head>
    <body class="bg-gradient text-gray-800">
      <div x-data="{ 
        products: [
          { id: 1, name: 'Crème Solaire Écologique', price: 15.99, image: 'https://replicate.delivery/yhqm/gbPOo8wPn7ogIZL9a1f7gMe4czpOMjQLhY9BsBOtK5jbgZRTA/out-0.webp', description: 'Protection solaire respectueuse des océans' },
          { id: 2, name: 'Smoothie Detox Bio', price: 4.50, image: 'https://replicate.delivery/yhqm/mnmIJupN7Bq3PFV2JqMSdiTODlMQDJ8IVD3taOveDnBhfaRTA/out-0.webp', description: 'Boost votre système immunitaire naturellement' },
          { id: 3, name: 'Robot Culinaire Intelligent', price: 199.99, image: 'https://replicate.delivery/yhqm/nLy5htbY2pJUEVWu5mfDYDpkBDmXaiLg0yOPgvsGenROxaRTA/out-0.webp', description: 'Votre assistant culinaire connecté' },
          { id: 4, name: 'Thé Matcha Cérémonial', price: 29.99, image: 'https://replicate.delivery/yhqm/mmRBAw9LeFSrHqPzKjULF0ManrrgolsD8Lf4WwEceHmai1imA/out-0.webp', description: 'L\'authenticité du Japon dans votre tasse' },
          { id: 5, name: 'Vélo Électrique Pliable', price: 899.99, image: 'https://replicate.delivery/yhqm/VahuabQVox63EtJfeWv49OnInQUGDrEmFluGJ95gGKHNxaRTA/out-0.webp', description: 'Mobilité urbaine écologique et pratique' },
          { id: 6, name: 'Huile d\'Olive Extra Vierge', price: 12.50, image: 'https://replicate.delivery/yhqm/VahuabQVox63EtJfeWv49OnInQUGDrEmFluGJ95gGKHNxaRTA/out-0.webp', description: 'Pressée à froid, saveur intense' }
        ],
        sortBy: 'date',
        sortProducts() {
          if (this.sortBy === 'date') {
            this.products.sort((a, b) => b.id - a.id);
          } else if (this.sortBy === 'price') {
            this.products.sort((a, b) => a.price - b.price);
          }
        }
      }" x-init="sortProducts">
        <header class="bg-gradient-to-r from-purple-500 to-pink-500 text-white p-6 shadow-lg">
          <h1 class="text-4xl font-bold text-center">SuperMarché - Nouveautés Exceptionnelles</h1>
        </header>
        
        <main class="container mx-auto mt-12 p-4">
          <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">
              Découvrez l'Exceptionnel
            </h2>
            <select x-model="sortBy" @change="sortProducts" class="p-2 border rounded-full bg-white text-gray-800">
              <option value="date">Trier par nouveauté</option>
              <option value="price">Trier par prix</option>
            </select>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <template x-for="product in products" :key="product.id">
              <div class="product-card bg-white rounded-xl shadow-xl overflow-hidden relative">
                <div class="absolute top-0 right-0 bg-red-500 text-white px-4 py-1 rounded-bl-xl z-10">Nouveau</div>
                <img :src="product.image" :alt="product.name" class="w-full h-64 object-cover">
                <div class="p-6">
                  <h3 x-text="product.name" class="text-2xl font-bold mb-2"></h3>
                  <p x-text="product.description" class="text-gray-600 mb-4"></p>
                  <div class="flex justify-between items-center">
                    <span x-text="`${product.price.toFixed(2)} €`" class="text-2xl font-bold text-purple-600"></span>
                    <button class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-2 rounded-full hover:from-purple-600 hover:to-pink-600 transition transform hover:scale-105">
                      Ajouter au panier
                    </button>
                  </div>
                </div>
              </div>
            </template>
          </div>
          
          <section class="mt-16">
            <h2 class="text-3xl font-extrabold text-center mb-8 text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
              Recommandations Personnalisées
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
              <div class="bg-white rounded-xl shadow-lg p-4 float-animation">
                <img src="https://replicate.delivery/yhqm/E9RfyvNNStR8CKoiBrrT7DNtcSpFaCsdyBEp3waGaYfnf0imA/out-0.webp" alt="Produit recommandé 1" class="w-full h-48 object-cover mb-4 rounded-lg">
                <h3 class="font-bold text-lg">Produit Magique 1</h3>
                <p class="text-sm text-gray-600">Parfait pour votre style unique</p>
              </div>
              <div class="bg-white rounded-xl shadow-lg p-4 float-animation" style="animation-delay: 0.5s;">
                <img src="https://replicate.delivery/yhqm/0bRyyRmShdpdHxJxZpuJP3AWhGKHncLAWweMB2xfwz9of0imA/out-0.webp" alt="Produit recommandé 2" class="w-full h-48 object-cover mb-4 rounded-lg">
                <h3 class="font-bold text-lg">Produit Magique 2</h3>
                <p class="text-sm text-gray-600">Basé sur vos achats précédents</p>
              </div>
              <div class="bg-white rounded-xl shadow-lg p-4 float-animation" style="animation-delay: 1s;">
                <img src="https://replicate.delivery/yhqm/ltmbLOeZdn2mCaShFZPeHxt3qDsf831cyPPHKESTO6QEerFNB/out-0.webp" alt="Produit recommandé 3" class="w-full h-48 object-cover mb-4 rounded-lg">
                <h3 class="font-bold text-lg">Produit Magique 3</h3>
                <p class="text-sm text-gray-600">Vous allez adorer cette nouveauté</p>
              </div>
              <div class="bg-white rounded-xl shadow-lg p-4 float-animation" style="animation-delay: 1.5s;">
                <img src="https://replicate.delivery/yhqm/3t1ReXSojxR6U60ZcRfEtd7Y0zpgkCj6Eos8igy1eNvXfpFNB/out-0.webp" alt="Produit recommandé 4" class="w-full h-48 object-cover mb-4 rounded-lg">
                <h3 class="font-bold text-lg">Produit Magique 4</h3>
                <p class="text-sm text-gray-600">Exclusivité pour nos clients fidèles</p>
              </div>
            </div>
          </section>
        </main>
        <?php $__env->stopSection(); ?>

      <script>
        // Ce script serait normalement dans un fichier séparé
        document.addEventListener('alpine:init', () => {
          Alpine.data('productData', () => ({
            // Logique supplémentaire si nécessaire
          }))
        })
      </script>
    </body>
    </html>
<?php echo $__env->make('client.deconnexion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('client.app_client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/client/order.blade.php ENDPATH**/ ?>
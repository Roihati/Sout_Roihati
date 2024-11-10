<html><head>
  <?php echo $__env->make('fournisseur.deconnexion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Catalogue </title>
  <style>
    .category-card, .product-card {
      transition: all 0.3s ease;
    }
    .category-card:hover, .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
  </style>
  </head>
  <body class="bg-gray-100 min-h-screen">
    <header class="bg-blue-600 text-white p-4">
      <h1 class="text-3xl font-bold text-center">Catalogue des Fournisseurs</h1>
    </header>
  
    <main class="container mx-auto mt-8 p-4">
      <div id="categoryList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
        <!-- Les catégories seront ajoutées ici dynamiquement -->
      </div>
  
      <div id="productList" class="grid1 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 hidden">
        <!-- Les produits seront ajoutés ici dynamiquement -->
      </div>
  
      <button id="backToCategories" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4 hidden">
        Retour aux catégories
      </button>


      <?php $__env->startSection('content'); ?>
    <div id="categoryList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="category-card bg-white p-6 rounded-lg shadow-md text-center cursor-pointer" data-id="<?php echo e($category->id); ?>">
                <div class="text-4xl mb-2"><?php echo e($category->icon ?? ''); ?></div>
                <h3 class="text-xl font-bold"><?php echo e($category->libele); ?></h3>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  
      <div id="addProductForm" class="mt-8 bg-white p-6 rounded-lg shadow-md hidden">
        <h2 class="text-2xl font-bold mb-4">Ajouter un nouveau produit</h2>
        <form id="productForm">
          <div class="mb-4">
            <label for="productName" class="block text-gray-700 text-sm font-bold mb-2">Nom du produit</label>
            <input type="text" id="productName" name="productName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
          </div>
          <div class="mb-4">
            <label for="productCategory" class="block text-gray-700 text-sm font-bold mb-2">Catégorie</label>
            <select id="productCategory" name="productCategory" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
              <!-- Les options seront ajoutées dynamiquement -->
            </select>
          </div>
          <div class="mb-4">
            <label for="productDescription" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea id="productDescription" name="productDescription" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3" required></textarea>
          </div>
          <div class="mb-4">
            <label for="productPrice" class="block text-gray-700 text-sm font-bold mb-2">Prix</label>
            <input type="number" id="productPrice" name="productPrice" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
          </div>
          <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
              Ajouter le produit
            </button>
          </div>
        </form>
      </div>
    </main>
   
    <script>
      // Références des éléments HTML
      const categoryList = document.getElementById('categoryList');
      const productList = document.getElementById('productList');
      const addProductForm = document.getElementById('addProductForm');
      const productForm = document.getElementById('productForm');
      const backToCategoriesBtn = document.getElementById('backToCategories');
      const productCategorySelect = document.getElementById('productCategory');
    
      // Données fictives des catégories et des produits (à remplacer par des données venant du backend)
      let categories = [
        { id: 1, name: "Électronique", icon: "📱" },
        { id: 2, name: "Alimentation", icon: "🍎" },
        { id: 3, name: "Vêtements", icon: "👕" },
        { id: 4, name: "Meubles", icon: "🪑" },
        { id: 5, name: "Livres", icon: "📚" },
        { id: 6, name: "Sports", icon: "⚽" },
        { id: 7, name: "Beauté", icon: "💄" },
        { id: 8, name: "Jouets", icon: "🧸" }
      ];
    
      let products = [
        { id: 1, name: "Smartphone XYZ", category: 1, description: "Dernier modèle avec caméra haute résolution", price: 699.99 },
        { id: 2, name: "Bananes Bio", category: 2, description: "Bananes fraîches et biologiques", price: 2.99 },
        { id: 3, name: "T-shirt en coton", category: 3, description: "T-shirt confortable 100% coton", price: 19.99 },
        { id: 4, name: "Canapé moderne", category: 4, description: "Canapé 3 places en cuir synthétique", price: 499.99 },
        { id: 5, name: "Roman bestseller", category: 5, description: "Le dernier roman à succès", price: 24.99 },
        { id: 6, name: "Ballon de football", category: 6, description: "Ballon officiel de compétition", price: 29.99 },
        { id: 7, name: "Rouge à lèvres", category: 7, description: "Couleur intense et longue tenue", price: 15.99 },
        { id: 8, name: "Peluche interactive", category: 8, description: "Peluche éducative pour enfants", price: 34.99 }
      ];
    
      // Affichage des catégories
      function displayCategories() {
        categoryList.innerHTML = '';
        categories.forEach(category => {
          const categoryCard = document.createElement('div');
          categoryCard.className = 'category-card bg-white p-6 rounded-lg shadow-md text-center cursor-pointer';
          categoryCard.innerHTML = `
            <div class="text-4xl mb-2">${category.icon}</div>
            <h3 class="text-xl font-bold">${category.name}</h3>
          `;
          categoryCard.addEventListener('click', () => displayProducts(category.id));
          categoryList.appendChild(categoryCard);
        });
      }
    
      // Affichage des produits d'une catégorie
      function displayProducts(categoryId) {
        productList.innerHTML = '';
        const filteredProducts = products.filter(p => p.category === categoryId);
    
        filteredProducts.forEach(product => {
          const productCard = document.createElement('div');
          productCard.className = 'product-card bg-white p-6 rounded-lg shadow-md';
          productCard.innerHTML = `
            <h3 class="text-xl font-bold mb-2">${product.name}</h3>
            <p class="text-gray-600 mb-4">${product.description}</p>
            <p class="text-lg font-semibold text-blue-600">${product.price.toFixed(2)} €</p>
          `;
          productList.appendChild(productCard);
        });
    
        categoryList.classList.add('hidden');
        productList.classList.remove('hidden');
        backToCategoriesBtn.classList.remove('hidden');
      }
    
      // Retour aux catégories
      backToCategoriesBtn.addEventListener('click', () => {
        categoryList.classList.remove('hidden');
        productList.classList.add('hidden');
        backToCategoriesBtn.classList.add('hidden');
      });
    
      // Remplir la liste déroulante des catégories
      function populateCategorySelect() {
        productCategorySelect.innerHTML = '<option value="">Sélectionner une catégorie</option>';
        categories.forEach(category => {
          const option = document.createElement('option');
          option.value = category.id;
          option.textContent = category.name;
          productCategorySelect.appendChild(option);
        });
      }
    
      // Gestion de l'ajout de produit via le formulaire
      productForm.addEventListener('submit', function(e) {
        e.preventDefault();
    
        // Création d'un nouvel objet produit
        const newProduct = {
          name: productForm.productName.value,
          description: productForm.productDescription.value,
          price: parseFloat(productForm.productPrice.value),
          category_id: parseInt(productForm.productCategory.value)
        };
    
        // Envoi des données au backend via AJAX
        const data = new FormData();
        data.append('name', newProduct.name);
        data.append('description', newProduct.description);
        data.append('price', newProduct.price);
        data.append('category_id', newProduct.category_id);
        data.append('_token', document.querySelector('meta[name="csrf-token"]').content);  // CSRF token pour Laravel
    
        fetch('/products', {
          method: 'POST',
          body: data
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert(data.message);  // Affichage du message de succès
            window.location.href = '/categories';  // Redirection vers la liste des catégories
          } else {
            alert('Une erreur est survenue.');
          }
        })
        .catch(error => console.error('Erreur:', error));
      });
    
      // Initialisation
      displayCategories();
      populateCategorySelect();
    
      // Affichage du formulaire d'ajout de produit
      const addProductBtn = document.createElement('button');
      addProductBtn.textContent = 'Ajouter un produit';
      addProductBtn.className = 'bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mt-4';
      addProductBtn.addEventListener('click', () => {
        addProductForm.classList.toggle('hidden');
        categoryList.classList.add('hidden');
        productList.classList.add('hidden');
        backToCategoriesBtn.classList.add('hidden');
      });
      document.querySelector('main').insertBefore(addProductBtn, addProductForm);
    </script>
    
  </body>
  </html><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/fournisseur/category.blade.php ENDPATH**/ ?>
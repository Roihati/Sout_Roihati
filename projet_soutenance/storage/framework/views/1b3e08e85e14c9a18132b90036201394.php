
<html><head>
    <title>Intégration des Fournisseurs</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
      @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
      }
      .fade-in {
        animation: fadeIn 0.5s ease-in-out;
      }
      .custom-shape-divider-top-1682452447 {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        transform: rotate(180deg);
      }
      .custom-shape-divider-top-1682452447 svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 94px;
      }
      .custom-shape-divider-top-1682452447 .shape-fill {
        fill: #4F46E5;
      }
    </style>
    </head>
    <body class="bg-gray-100 font-sans">
      <div class="custom-shape-divider-top-1682452447">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
          <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
      </div>
    
      <div class="container mx-auto px-4 py-12 relative">
        <h1 class="text-4xl font-extrabold mb-12 text-center text-indigo-700 tracking-tight">Intégration des Fournisseurs</h1>
        
        <!-- Formulaire d'ajout de fournisseur -->
        <div class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-8 fade-in transform hover:scale-105 transition duration-300">
          <h2 class="text-2xl font-semibold mb-6 text-indigo-600"><i class="fas fa-plus-circle mr-2"></i>Ajouter un nouveau fournisseur</h2>
          <form id="addSupplierForm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                  Nom
                </label>
                <input class="shadow-sm appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="name" type="text" placeholder="Nom du fournisseur" required>
              </div>
              <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                  Adresse
                </label>
                <input class="shadow-sm appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="address" type="text" placeholder="Adresse du fournisseur" required>
              </div>
              <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="contact">
                  Contact
                </label>
                <input class="shadow-sm appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="contact" type="text" placeholder="Nom du contact" required>
              </div>
              <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="paymentTerms">
                  Conditions de paiement
                </label>
                <input class="shadow-sm appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="paymentTerms" type="text" placeholder="Conditions de paiement" required>
              </div>
              <div class="md:col-span-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="products">
                  Produits fournis
                </label>
                <textarea class="shadow-sm appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="products" placeholder="Liste des produits fournis" rows="3" required></textarea>
              </div>
            </div>
            <div class="flex items-center justify-end mt-6">
              <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" type="submit">
                <i class="fas fa-plus mr-2"></i>Ajouter le fournisseur
              </button>
            </div>
          </form>
        </div>
        
        <!-- Tableau des fournisseurs existants -->
        <div class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 fade-in">
          <h2 class="text-2xl font-semibold mb-6 text-indigo-600"><i class="fas fa-list-alt mr-2"></i>Gestion des fournisseurs existants</h2>
          <div class="mb-4">
            <div class="relative">
              <input class="shadow-sm appearance-none border rounded-md w-full py-2 pl-10 pr-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="searchSupplier" type="text" placeholder="Rechercher un fournisseur...">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
              </div>
            </div>
          </div>
          <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg overflow-hidden">
              <thead class="bg-indigo-600 text-white">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                    Nom
                  </th>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                    Contact
                  </th>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                    Produits
                  </th>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody id="supplierTableBody" class="divide-y divide-gray-200">
                <!-- Les lignes du tableau seront ajoutées dynamiquement ici -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    
      <!-- Modal pour éditer un fournisseur -->
      <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
          <h3 class="text-lg font-semibold mb-4 text-indigo-600"><i class="fas fa-edit mr-2"></i>Modifier le fournisseur</h3>
          <form id="editSupplierForm">
            <input type="hidden" id="editSupplierId">
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="editName">
                Nom
              </label>
              <input class="shadow-sm appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="editName" type="text" required>
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="editContact">
                Contact
              </label>
              <input class="shadow-sm appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="editContact" type="text" required>
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="editProducts">
                Produits
              </label>
              <textarea class="shadow-sm appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500" id="editProducts" rows="3" required></textarea>
            </div>
            <div class="flex items-center justify-between">
              <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" type="submit">
                <i class="fas fa-save mr-2"></i>Sauvegarder
              </button>
              <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110" type="button" onclick="closeEditModal()">
                <i class="fas fa-times mr-2"></i>Annuler
              </button>
            </div>
          </form>
        </div>
      </div>
    <?php echo $__env->make('fournisseur.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <script>
        // Simuler une base de données avec un tableau d'objets
        let suppliers = [
          { id: 1, name: "Fournisseur A", contact: "Contact A", products: "Produit 1, Produit 2" },
          { id: 2, name: "Fournisseur B", contact: "Contact B", products: "Produit 3, Produit 4" },
          { id: 3, name: "Fournisseur C", contact: "Contact C", products: "Produit 5, Produit 6" }
        ];
    
        // Fonction pour afficher les fournisseurs dans le tableau
        function displaySuppliers(suppliersToDisplay = suppliers) {
          const tableBody = document.getElementById('supplierTableBody');
          tableBody.innerHTML = '';
          suppliersToDisplay.forEach(supplier => {
            const row = `
              <tr class="hover:bg-gray-100 transition-colors duration-200">
                <td class="px-6 py-4 whitespace-nowrap">
                  ${supplier.name}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  ${supplier.contact}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  ${supplier.products}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <button onclick="editSupplier(${supplier.id})" class="text-blue-600 hover:text-blue-900 mr-2 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button onclick="deleteSupplier(${supplier.id})" class="text-red-600 hover:text-red-900 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
            `;
            tableBody.innerHTML += row;
          });
        }
    
        // Afficher les fournisseurs initiaux
        displaySuppliers();
    
        // Fonction pour ajouter un nouveau fournisseur
        document.getElementById('addSupplierForm').addEventListener('submit', function(e) {
          e.preventDefault();
          const newSupplier = {
            id: suppliers.length + 1,
            name: document.getElementById('name').value,
            contact: document.getElementById('contact').value,
            products: document.getElementById('products').value
          };
          suppliers.push(newSupplier);
          displaySuppliers();
          this.reset();
          showNotification('Fournisseur ajouté avec succès !');
        });
    
        // Fonction de recherche
        document.getElementById('searchSupplier').addEventListener('input', function(e) {
          const searchTerm = e.target.value.toLowerCase();
          const filteredSuppliers = suppliers.filter(supplier => 
            supplier.name.toLowerCase().includes(searchTerm) ||
            supplier.contact.toLowerCase().includes(searchTerm) ||
            supplier.products.toLowerCase().includes(searchTerm)
          );
          displaySuppliers(filteredSuppliers);
        });
    
        // Fonction pour éditer un fournisseur
        function editSupplier(id) {
          const supplier = suppliers.find(s => s.id === id);
          document.getElementById('editSupplierId').value = supplier.id;
          document.getElementById('editName').value = supplier.name;
          document.getElementById('editContact').value = supplier.contact;
          document.getElementById('editProducts').value = supplier.products;
          document.getElementById('editModal').classList.remove('hidden');
        }
    
        // Fonction pour fermer le modal d'édition
        function closeEditModal() {
          document.getElementById('editModal').classList.add('hidden');
        }
    
        // Gestion du formulaire d'édition
        document.getElementById('editSupplierForm').addEventListener('submit', function(e) {
          e.preventDefault();
          const id = parseInt(document.getElementById('editSupplierId').value);
          const supplierIndex = suppliers.findIndex(s => s.id === id);
          if (supplierIndex !== -1) {
            suppliers[supplierIndex] = {
              id: id,
              name: document.getElementById('editName').value,
              contact: document.getElementById('editContact').value,
              products: document.getElementById('editProducts').value
            };
            displaySuppliers();
            closeEditModal();
            showNotification('Fournisseur modifié avec succès !');
          }
        });
    
        // Fonction pour supprimer un fournisseur
        function deleteSupplier(id) {
          if (confirm('Êtes-vous sûr de vouloir supprimer ce fournisseur ?')) {
            suppliers = suppliers.filter(s => s.id !== id);
            displaySuppliers();
            showNotification('Fournisseur supprimé avec succès !');
          }
        }
    
        // Fonction pour afficher une notification
        function showNotification(message) {
          const notification = document.createElement('div');
          notification.textContent = message;
          notification.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg fade-in';
          document.body.appendChild(notification);
          setTimeout(() => {
            notification.remove();
          }, 3000);
        }
      </script>
    </body>
    </html>
<?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/suppermarche/add.blade.php ENDPATH**/ ?>
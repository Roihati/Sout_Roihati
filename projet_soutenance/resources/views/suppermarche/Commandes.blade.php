<html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Gestion des Commandes - Supermarché</title><script src="https://cdn.tailwindcss.com">
</script><script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js">
</script><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"></head><body class="bg-gradient-to-r from-blue-100 to-purple-100">
    <div id="app" class="container mx-auto p-4">
      <nav class="bg-white shadow-lg rounded-lg mb-6">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
          <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
              <div class="flex-shrink-0 flex items-center">
                <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
              </div>
              <div class="hidden sm:block sm:ml-6">
                <div class="flex space-x-4">
                  <a href="#" class="text-gray-700 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Tableau de bord</a>
                  <a href="#" class="text-gray-700 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Commandes</a>
                  <a href="#" class="text-gray-700 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Livraisons</a>
                  <a href="#" class="text-gray-700 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Réceptions</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    
      <h1 class="text-4xl font-extrabold mb-6 text-center text-indigo-600">Gestion des Commandes Supermarché</h1>
      
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Passer une commande -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
          <h2 class="text-2xl font-semibold mb-4 text-indigo-500">
            <i class="fas fa-shopping-cart mr-2"></i>Passer une commande
          </h2>
          <form @submit.prevent="passerCommande" class="space-y-4">
            <div>
              <label class="block text-gray-700 text-sm font-bold mb-2" for="fournisseur">
                Fournisseur
              </label>
              <select v-model="nouvelleCommande.fournisseur" id="fournisseur" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                <option value="">Sélectionner un fournisseur</option>
                <option v-for="fournisseur in fournisseurs" :key='fournisseur.id' :value='fournisseur.id'>
                  {{ 'fournisseur.nom'}}
                </option>
              </select>
            </div>
            <div>
              <label class="block text-gray-700 text-sm font-bold mb-2" for="produit">
                Produit
              </label>
              <input v-model="nouvelleCommande.produit" type="text" id="produit" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Nom du produit">
            </div>
            <div>
              <label class="block text-gray-700 text-sm font-bold mb-2" for="quantite">
                Quantité
              </label>
              <input v-model="nouvelleCommande.quantite" type="number" id="quantite" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Quantité">
            </div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Passer la commande
            </button>
          </form>
        </div>
        
        <!-- Suivi des livraisons -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
          <h2 class="text-2xl font-semibold mb-4 text-green-500">
            <i class="fas fa-truck mr-2"></i>Suivi des livraisons
          </h2>
          <ul class="divide-y divide-gray-200">
            <li v-for="livraison in livraisons" :key='livraison.id' class="py-4">
              <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                  <span :class="{'bg-yellow-100 text-yellow-800': 'livraison.status' === 'En cours', 'bg-green-100 text-green-800': livraison.status === 'Livrée'}" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full">
                    {{ 'livraison.status' }}
                  </span>
                </div>
                <div class="flex-1 min-w-0">
                  <p class="text-sm font-medium text-gray-900 truncate">
                    {{ 'livraison.produit '}}
                  </p>
                  <p class="text-sm text-gray-500 truncate">
                    Fournisseur: {{ 'livraison.fournisseur' }}
                  </p>
                </div>
                <div>
                  <button @click="afficherDetails(livraison)" class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-5 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Détails
                  </button>
                </div>
              </div>
            </li>
          </ul>
        </div>
        
        <!-- Gestion des réceptions -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
          <h2 class="text-2xl font-semibold mb-4 text-purple-500">
            <i class="fas fa-box-open mr-2"></i>Gestion des réceptions
          </h2>
          <ul class="divide-y divide-gray-200">
            <li v-for="reception in receptions" :key='reception.id' class="py-4">
              <div class="flex items-center justify-between">
                <div>
                  <p class="text-sm font-medium text-gray-900">{{ 'reception.produit' }}</p>
                  <p class="text-sm text-gray-500">Quantité: {{ 'reception.quantite' }}</p>
                </div>
                <button @click="validerReception(reception.id)" class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-5 font-medium rounded-full shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                  Valider
                </button>
              </div>
            </li>
          </ul>
        </div>
      </div>
      
      <!-- Modal pour les détails de livraison -->
      <div v-if="livraisonSelectionnee" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                Détails de la livraison
              </h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">Produit: {{ 'livraisonSelectionnee.produit' }}</p>
                <p class="text-sm text-gray-500">Fournisseur: {{ 'livraisonSelectionnee.fournisseur' }}</p>
                <p class="text-sm text-gray-500">Statut: {{ 'livraisonSelectionnee.status' }}</p>
                <p class="text-sm text-gray-500">Date de commande: {{ 'livraisonSelectionnee.dateCommande '}}</p>
                <p class="text-sm text-gray-500">Date de livraison estimée: {{ 'livraisonSelectionnee.dateLivraisonEstimee '}}</p>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
              <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="fermerModal">
                Fermer
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('fournisseur.footer')
    <script>
    const { createApp, ref } = Vue
    
    createApp({
      setup() {
        const fournisseurs = ref([])
        const nouvelleCommande = ref({
          fournisseur: '',
          produit: '',
          quantite: null
        })
        const livraisons = ref([])
        const receptions = ref([])
        const livraisonSelectionnee = ref(null)
    
        // Charger les données initiales
        function chargerDonnees() {
          axios.get('/api/fournisseurs')
            .then(response => {
              fournisseurs.value = response.data
            })
            .catch(error => console.error('Erreur lors du chargement des fournisseurs:', error))
    
          axios.get('/api/livraisons')
            .then(response => {
              livraisons.value = response.data
            })
            .catch(error => console.error('Erreur lors du chargement des livraisons:', error))
    
          axios.get('/api/receptions')
            .then(response => {
              receptions.value = response.data
            })
            .catch(error => console.error('Erreur lors du chargement des réceptions:', error))
        }
    
        chargerDonnees()
    
        function passerCommande() {
          axios.post('/api/commandes', nouvelleCommande.value)
            .then(response => {
              console.log('Commande passée:', response.data)
              nouvelleCommande.value = { fournisseur: '', produit: '', quantite: null }
              alert('Commande passée avec succès!')
              chargerDonnees() // Recharger les données pour refléter les changements
            })
            .catch(error => {
              console.error('Erreur lors de la création de la commande:', error)
              alert('Erreur lors de la création de la commande. Veuillez réessayer.')
            })
        }
    
        function afficherDetails(livraison) {
          livraisonSelectionnee.value = livraison
        }
    
        function fermerModal() {
          livraisonSelectionnee.value = null
        }
    
        function validerReception(id) {
          axios.post(`/api/receptions/${id}/valider`)
            .then(response => {
              console.log('Réception validée:', response.data)
              alert('Réception validée avec succès!')
              chargerDonnees() // Recharger les données pour refléter les changements
            })
            .catch(error => {
              console.error('Erreur lors de la validation de la réception:', error)
              alert('Erreur lors de la validation de la réception. Veuillez réessayer.')
            })
        }
    
        return {
          fournisseurs,
          nouvelleCommande,
          livraisons,
          receptions,
          livraisonSelectionnee,
          passerCommande,
          afficherDetails,
          fermerModal,
          validerReception
        }
      }
    }).mount('#app')
    </script>
    </body></html>
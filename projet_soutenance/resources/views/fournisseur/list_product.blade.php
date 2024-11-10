<!-- resources/views/fournisseur/product_list.blade.php -->
@include('fournisseur.deconnexion')
@extends('fournisseur.Style')
@section('title', 'Liste des Produits')
<body class="bg-gray-100">
    <br>
    <div class="content">
        <div class="container mx-auto p-6">
            
            
    <d class="bg-white shadow-md rounded-lg p-4">
                
               
    <!-- En-tête contenant le titre, le formulaire de recherche et le bouton de retour alignés sur une seule ligne -->
                
                
    <div class="flex items-center justify-between mb-4">
                    <!-- Titre -->
                    <h2 class="text-xl font-semibold text-gray-700">Liste des Produits</h2>
    
                    
    
     
    <!-- Formulaire de recherche -->
                    <form method="GET" action="{{('fournisseur.search') }}" class="flex items-center space-x-2">
                        
                       
    
       
    <input type="text" name="search" placeholder="Rechercher par nom" 
                               class="border border-gray-300 rounded-lg py-1 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               value="{{ request('search') }}">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-3 rounded-lg">
                            
                      
    <i class="fa fa-search"></i> Rechercher
                        
          
    </button>
                    </form>
    
                    <!-- Bouton de retour -->
                    
      
    <button onclick="history.back()" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg">
                        
                       
    &larr; Retour
    </button>          
        
          </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg"> 
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">ID</th>
                                <th class="py-3 px-6 text-left">Nom</th>
                                <th class="py-3 px-6 text-left">Description</th>
                                <th class="py-3 px-6 text-left">Prix</th>
                                <th class="py-3 px-6 text-left">Stock</th>
                                <th class="py-3 px-6 text-left">Catégorie</th>
                                <th class="py-3 px-6 text-left">Image</th>
                                <th class="py-3 px-6 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($products as $product)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-3 px-6">{{ $product->id }}</td>
                                <td class="py-3 px-6">{{ $product->name }}</td>
                                <td class="py-3 px-6">{{ $product->description }}</td>
                                <td class="py-3 px-6">{{ $product->price }} €</td>
                                <td class="py-3 px-6">{{ $product->stock }}</td>
                                <td class="py-3 px-6">{{ $product->category }}</td>
                                <td class="py-3 px-6">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Image du produit" class="max-w-xs rounded-lg shadow-md" width="100">
                                    @else
                                        Aucune image
                                    @endif
                                </td>
                                <!-- Boutons d'action -->
                                <td class="py-3 px-6 flex space-x-2">
                                    <!-- Bouton show -->
                                    <form action="{{ route('fournisseur.show', $product->id) }}" method="get">
                                        @csrf
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">Show</button>
                                    </form>

                                    <!-- Bouton Modifier -->
                                    <form action="{{ route('fournisseur.update', $product->id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded">Modifier</button>
                                    </form>

                                    <!-- Bouton Supprimer -->
                                    <form action="{{ route('fournisseur.delete', $product->id) }}" method="POST" onsubmit="return confirmDelete();">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded">Supprimer</button>
                                    </form>
                                </td>

                                <!-- Message de confirmation de suppression -->
                                @if(session('success'))
                                    <div x-data="{ show: true }" x-show.transition.opacity.duration.300ms.show x-init="setTimeout(() => show = false, 3000)" 
                                         class="absolute top-right mt-4 mr-4 bg-green-500 text-white p-2 rounded" x-show.transition.opacity.duration.300ms.show>{{ session('success') }}</div>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <!-- Liens de pagination -->
        <div class="mt-4">
          {{ $products->links('pagination::tailwind') }}
         </div>
                </div> 
            </div> 
        </div>   
    </div>

    <!-- Script de confirmation de suppression -->
    <script>
        function confirmDelete() {
            return confirm("Êtes-vous sûr de vouloir supprimer ce produit ?");
        }
    </script>
    <script>
$(document).ready(function() {
    $('.search-input').on('input', function() {
        let query = $(this).val();
        $.ajax({
            url: "{{('fournisseur.search') }}",
            method: "GET",
            data: { search: query },
            success: function(data) {
                // Mettez à jour l'affichage des résultats ici
            }
        });
    });
});
    </script>

</body>
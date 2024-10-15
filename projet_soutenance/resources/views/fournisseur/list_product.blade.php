<!-- resources/views/fournisseur/product_list.blade.php -->
@include('fournisseur.deconnexion')
@extends('fournisseur.Style')
<br> 

@section('title')
<div class="mt-6 flex justify-start">
    <a href="{{ route('fournisseur.product') }}" class="flex items-center text-indigo-600 hover:text-indigo-800 px-4 py-2 rounded-md bg-white shadow-sm">
        <i class="fas fa-plus mr-2"></i> Ajouter un produit
    </a>
</div>

<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div  class="btn btn-info">Liste des produits</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Prix</th>
                                    <th>Stock</th>
                                    <th>Catégorie</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id}}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>
                                           <!-- Image du produit -->
                                            @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="Image du produit" class="max-w-xs rounded-lg shadow-md" width="100">
                                    
                                        @else
                                            Aucune image
                                        @endif
                                        </td>
                                  <!-- Bouton show -->
                                        <td>
                                            <form action="{{ route('fournisseur.show', $product->id) }}" method="get">
                                                @csrf
                                                <button type="submit" class="btn btn-info">show</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('fournisseur.update', $product->id) }}" method="GET">
                                                @csrf
                                            
                                                <button type="submit" class="btn btn-primary">Modifier</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('fournisseur.delete', $product->id) }}" method="POST" onsubmit="return confirmDelete();">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </td>
                                        
                                   
                                          <!-- message de confirmation de suppression-->
                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
     <script>
                                            function confirmDelete() {
                                                return confirm("Êtes-vous sûr de vouloir supprimer ce produit ?");
                                            }
                                        </script>
</html>

@include('fournisseur.deconnexion')
@extends('fournisseur.Style')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>
<body>
    <div class="mt-6 flex justify-start">
        <a href="{{ route('fournisseur.product') }}" class="flex items-center text-indigo-600 hover:text-indigo-800 px-4 py-2 rounded-md bg-white shadow-sm">
            <i class="fas fa-plus mr-2"></i> retour
        </a>
     
    </div>
    <br>
    <div class="col-md-12">
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div  class="btn btn-info">
                            Détails des produits
                        </div>
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
                                                @if ($product->image)
                                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Image du produit" width="100">
                                                @else
                                                    Aucune image
                                                @endif
                                            </td>
                                        </tr>
                                </tbody>
                                @endforeach
                                </table>
    
                                    <form action="{{ route('fournisseur.show', $product->id) }}" method="">
                                        @csrf
                                        <button type="submit" class="btn btn-info">Read More</button>
                                    </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>   
</body>
</html>


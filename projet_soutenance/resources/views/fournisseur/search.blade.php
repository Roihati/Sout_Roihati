@extends('fournisseur.Style')

<h2 class="text-xl font-semibold text-gray-700">Résultats de la recherche</h2>
<ul>
    @foreach($produits as $produit)
        <li>{{ $produit->search }}</li>
    @endforeach
</ul>

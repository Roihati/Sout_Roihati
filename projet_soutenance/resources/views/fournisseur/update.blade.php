
@include('fournisseur.deconnexion')
@include('fournisseur.Style')
<br>
@section('content')
<!DOCTYPE html>
<html lang="fr">
<head>
 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <title>Mettre à jour un produit</title>
  
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-section, .info-section {
            width: 48%;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2; /* Couleur de fond pour les en-têtes */
        }
        .modified {
            background-color: #e7f3fe; /* Couleur pour les données modifiées */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-section">
        <h1 class="flex items-center text-2xl font-semibold text-gray-800 border-b-2 border-gray-300 pb-2 mb-4">
            <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4l4 4-8 8H8v-4l8-8z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 20h16" />
            </svg>
            Mettre à jour le produit
        </h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('fournisseur.update', $product->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('POST')
  <div>
  
        <label for="name" class="block text-sm font-medium text-gray-700">Nom du produit</label>
        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required   x-model="product.stock" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
  </div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="description" name="description">{{ old('description', $product->description) }}</textarea>

        <label for="price" class="block text-sm font-medium text-gray-700">Prix</label>
        <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" required  x-model="product.stock" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

        <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
        <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required  x-model="product.stock" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"> 

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image du produit</label>
            <input type="file" id="image" name="image" onchange="handleImageUpload(event)" accept="image/*" class="mt-1 block w-full">
        </div>
        
        <div x-show="imagePreview" class="mt-4">
            <img :src="imagePreview" alt="Aperçu de l'image du produit" class="max-w-xs rounded-lg shadow-md">
        </div>
        <button type="submit" class="btn btn-info "  class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Mettre à jour</button>
    </form>
</div>
<div class="info-section " class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    <center><h1>Product  Modifiées avec succés</h1></center>
</div>
<div class="block text-sm font-medium text-gray-700">
    <table>
      <tr class="modified">
          <th>Champ</th>
          <th>Valeur Actuelle</th>
      </tr>
      <tr>
          <td><strong>Nom :</strong></td>
          <td>{{ $product->name }}</td>
      </tr>
      <tr class="modified">
          <td><strong>Description :</strong></td>
          <td>{{ $product->description }}</td>
      </tr>
      <tr>
          <td><strong>Prix :</strong></td>
          <td>{{ $product->price }} €</td>
      </tr>
      <tr class="modified">
          <td><strong>Stock :</strong></td>
          <td>{{ $product->stock }}</td>
      </tr>

      @if($product->image)
          <tr class="modified">
              <td><strong>Image modifie :</strong></td>
              <td><img src="{{ asset('storage/' . $product->image) }}" alt="Image du produit" class="max-w-xs rounded-lg shadow-md"></td>
          </tr>
      @else
          <tr class="modified">
              <td><strong>Image Actuelle :</strong></td>
              <td>Aucune image disponible.</td>
          </tr>
      @endif
  </table>
</div>
</div>
</div>    
<script>
    
    function handleImageUpload(event) {
        const input = event.target;
        const preview = document.querySelector('[x-show="imagePreview"] img');
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>
</body>
</html>


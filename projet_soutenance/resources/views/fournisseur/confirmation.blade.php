@include('fournisseur.deconnexion')

@include('fournisseur.Style')

@section('title', 'Confirmation')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @section('content')
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg border border-gray-300">
        <h1 class="text-3xl font-semibold text-center text-indigo-700 mb-4">Confirmation</h1>
        <p class="text-gray-600 text-center text-lg">{{ session('success') }}</p>

        <div class="mt-6 flex justify-between">
            <a href="{{ route('fournisseur.product') }}" class="flex items-center bg-indigo-600 text-white hover:bg-indigo-700 transition duration-300 px-4 py-2 rounded-md shadow-md">
                <i class="fas fa-plus mr-2"></i> Ajouter un autre produit
            </a>

            <a href="{{ route('fournisseur.list_product') }}" class="flex items-center text-indigo-600 hover:text-indigo-800 transition duration-300">
                <i class="fas fa-list mr-1"></i> Détails
            </a>
        </div>
    </div>

</body>
</html>

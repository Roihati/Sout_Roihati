<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    @vite('resources/css/app.css') <!-- Assurez-vous que Tailwind CSS est inclus -->
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-gray-800">404</h1>
        <p class="text-xl text-gray-600">Oups ! La page que vous recherchez n'existe pas.</p>
        <a href="{{ url('/') }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">Retour à l'accueil</a>
        
        <div x-data="{ open: false }">
            <button @click="open = !open" class="mt-4 inline-block bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition">Aide</button>
            <div x-show="open" class="mt-2 p-4 bg-white border border-gray-300 rounded shadow-lg">
                <p>Essayez de vérifier l'URL ou utilisez le bouton ci-dessus pour revenir à la page d'accueil.</p>
            </div>
        </div>
    </div>
</body>
</html>

<head>
<!-- Fonts -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<style>
.search-form {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px; /* Espace au-dessus du formulaire */
}

.search-input {
    width: 300px; /* Largeur du champ de recherche */
    padding: 10px; /* Espacement interne */
    border: 2px solid #ccc; /* Bordure */
    border-radius: 5px; /* Coins arrondis */
    font-size: 16px; /* Taille de la police */
    transition: border-color 0.3s; /* Effet de transition */
}

.search-input:focus {
    border-color: #007BFF; /* Couleur de la bordure au focus */
    outline: none; /* Supprimer le contour par défaut */
}

.search-button {
    background-color: #007BFF; /* Couleur de fond du bouton */
    color: white; /* Couleur du texte */
    padding: 10px 15px; /* Espacement interne */
    border: none; /* Pas de bordure */
    border-radius: 5px; /* Coins arrondis */
    cursor: pointer; /* Curseur pointer au survol */
    font-size: 16px; /* Taille de la police */
    transition: background-color 0.3s; /* Effet de transition */
}

.search-button:hover {
    background-color: #0056b3; /* Couleur au survol */
}
</style>
<style>

.loader {
    border: 2px solid transparent;
    border-radius: 50%;
    border-top: 2px solid #3490dc;
    width: 16px;
    height: 16px;
    -webkit-animation: spin 0.5s linear infinite;
    animation: spin 0.5s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>

<!-- Scripts -->

<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/fournisseur/Style.blade.php ENDPATH**/ ?>
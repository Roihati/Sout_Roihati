<html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .content {
        flex: 1 0 auto;
    }
    .footer {
        flex-shrink: 0;
        background-color: #343a40;
        color: #ffffff;
        padding: 40px 0;
    }
    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .footer-section {
        flex: 1;
        margin: 0 15px 20px;
        min-width: 200px;
    }
    .footer-section h3 {
        color: #3498db;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
        margin-bottom: 15px;
    }
    .footer-section ul {
        list-style-type: none;
        padding: 0;
    }
    .footer-section ul li {
        margin-bottom: 10px;
    }
    .footer-section ul li a {
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .footer-section ul li a:hover {
        color: #d4d4d4;
    }
    .social-icons {
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    .social-icons a {
        color: #ffffff;
        font-size: 24px;
        margin-right: 15px;
        transition: color 0.3s ease;
    }
    .social-icons a:hover {
        color: #3498db;
    }
    .payment-methods {
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
    }
    .payment-methods img {
        height: 30px;
        margin: 5px;
    }
    .bottom-footer {
        text-align: center;
        padding-top: 20px;
        margin-top: 20px;
        border-top: 1px solid #ecf0f1;
    }
    </style>
    </head>
    <body>
    <div class="content">
        <!-- Le contenu principal de la page irait ici -->
    </div>
    
    <footer class="bg-gray-800 text-white mt-12">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
              <h3 class="text-lg font-semibold mb-4">À propos de nous</h3>
              <p class="text-gray-400">Notre boutique en ligne s'engage à offrir une expérience d'achat exceptionnelle à nos clients.</p>
            </div>
            <div>
              <h3 class="text-lg font-semibold mb-4">Liens rapides</h3>
              <ul class="space-y-2">
                <li><a href="#" class="text-gray-400 hover:text-white">Accueil</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">Produits</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">À propos</a></li>
                <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
              </ul>
            </div>
            <div>
              <h3 class="text-lg font-semibold mb-4">Suivez-nous</h3>
              <div class="flex space-x-4">
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>
          </div>
          <div class="mt-8 border-t border-gray-700 pt-8 text-center">
            <p class="text-gray-400">&copy; 2024 Votre Boutique En Ligne. Tous droits réservés.</p>
          </div>
        </div>
      </footer>
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Afficher/cacher les sections du footer sur mobile
        const footerTitles = document.querySelectorAll('.footer-section h3');
        footerTitles.forEach(title => {
            title.addEventListener('click', () => {
                const content = title.nextElementSibling;
                content.style.display = content.style.display === 'none' ? 'block' : 'none';
            });
        });
    });
    </script>
    </body></html><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/fournisseur/footer.blade.php ENDPATH**/ ?>
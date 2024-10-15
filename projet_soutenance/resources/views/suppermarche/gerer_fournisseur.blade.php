<html><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Avancée des Fournisseurs - Supermarché</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
      :root {
        --primary-color: #3498db;
        --secondary-color: #2ecc71;
        --accent-color: #e74c3c;
        --text-color: #34495e;
        --bg-color: #ecf0f1;
        --card-bg: #ffffff;
      }
    
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
    
      body {
        font-family: 'Roboto', sans-serif;
        background-color: var(--bg-color);
        color: var(--text-color);
        line-height: 1.6;
      }
    
      .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
      }
    
      header {
        background-color: var(--primary-color);
        color: white;
        padding: 1.5rem 0;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      }
    
      h1 {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
      }
    
      .logo {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 1rem;
      }
    
      .logo svg {
        width: 50px;
        height: 50px;
        margin-right: 1rem;
      }
    
      .dashboard {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
      }
    
      .card {
        background-color: var(--card-bg);
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
      }
    
      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
      }
    
      .card h2 {
        color: var(--primary-color);
        margin-bottom: 1rem;
        font-size: 1.5rem;
        border-bottom: 2px solid var(--primary-color);
        padding-bottom: 0.5rem;
      }
    
      .btn {
        display: inline-block;
        background-color: var(--secondary-color);
        color: white;
        padding: 0.7rem 1.2rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-transform: uppercase;
        font-weight: bold;
        letter-spacing: 1px;
      }
    
      .btn:hover {
        background-color: #27ae60;
        transform: translateY(-2px);
      }
    
      .btn-danger {
        background-color: var(--accent-color);
      }
    
      .btn-danger:hover {
        background-color: #c0392b;
      }
    
      #fournisseur-list {
        margin-top: 2rem;
      }
    
      .fournisseur-item {
        background-color: var(--card-bg);
        border-radius: 5px;
        padding: 1.5rem;
        margin-bottom: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s ease;
      }
    
      .fournisseur-item:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transform: translateY(-3px);
      }
    
      .fournisseur-info h3 {
        color: var(--primary-color);
        margin-bottom: 0.5rem;
      }
    
      .fournisseur-actions {
        display: flex;
        gap: 0.5rem;
      }
    
      input[type="text"],
      input[type="email"],
      input[type="tel"],
      input[type="date"] {
        width: 100%;
        padding: 0.7rem;
        margin-bottom: 1rem;
        border: 1px solid #bdc3c7;
        border-radius: 5px;
        font-size: 1rem;
      }
    
      @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
      }
    
      .fade-in {
        animation: fadeIn 0.5s ease-out;
      }
    
      .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
      }
    
      .modal-content {
        background-color: var(--card-bg);
        margin: 15% auto;
        padding: 2rem;
        border-radius: 10px;
        width: 50%;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        animation: fadeIn 0.3s ease-out;
      }
    
      .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
      }
    
      .close:hover,
      .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
      }

      .back-link {
        display: inline-block;
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        padding: 0.5rem 1rem;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
        transition: background-color 0.3s ease;
      }

      .back-link:hover {
        background-color: rgba(255, 255, 255, 0.3);
      }

      .back-link i {
        margin-right: 0.5rem;
      }

      .toggle-list {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        margin-bottom: 1rem;
        transition: background-color 0.3s ease;
      }

      .toggle-list:hover {
        background-color: #2980b9;
      }

      .hidden {
        display: none;
      }
    </style>
    </head>
    <body>
      <header>
        <div class="container">
          <a href="/suppermarche/supermaket" class="back-link">
            <i class="fas fa-arrow-left"></i>Retour au tableau de bord
          </a>
          <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white">
              <path d="M3 3h18v2H3V3zm0 8h18v2H3v-2zm0 8h18v2H3v-2zm0-4h18v2H3v-2zm0-8h18v2H3V7z"/>
            </svg>
            <h1>Gestion Avancée des Fournisseurs</h1>
          </div>
        </div>
      </header>
    
      <main class="container">
        <div class="dashboard">
          <div class="card fade-in">
            <h2><i class="fas fa-plus-circle"></i> Ajouter un Fournisseur</h2>
            <form id="add-fournisseur-form">
              <input type="text" id="fournisseur-name" placeholder="Nom du fournisseur" required>
              <input type="email" id="fournisseur-email" placeholder="Email" required>
              <input type="tel" id="fournisseur-phone" placeholder="Téléphone" required>
              <input type="date" id="fournisseur-contract-start" placeholder="Début du contrat" required>
              <input type="date" id="fournisseur-contract-end" placeholder="Fin du contrat" required>
              <button type="submit" class="btn"><i class="fas fa-save"></i> Ajouter</button>
            </form>
          </div>
          <div class="card fade-in">
            <h2><i class="fas fa-chart-pie"></i> Statistiques</h2>
            <p>Nombre total de fournisseurs: <span id="total-fournisseurs">0</span></p>
            <p>Fournisseurs actifs: <span id="active-fournisseurs">0</span></p>
            <p>Contrats à renouveler: <span id="contracts-to-renew">0</span></p>
          </div>
        </div>
    
        <div id="fournisseur-list">
          <button class="toggle-list" id="toggle-fournisseur-list">
            <i class="fas fa-list"></i> Afficher/Masquer la Liste des Fournisseurs
          </button>
          <div id="fournisseur-list-content" class="hidden">
            <!-- La liste des fournisseurs sera générée dynamiquement ici -->
          </div>
        </div>
      </main>
    
      <div id="editModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <h2>Modifier le Fournisseur</h2>
          <form id="edit-fournisseur-form">
            <input type="hidden" id="edit-fournisseur-id">
            <input type="text" id="edit-fournisseur-name" placeholder="Nom du fournisseur" required>
            <input type="email" id="edit-fournisseur-email" placeholder="Email" required>
            <input type="tel" id="edit-fournisseur-phone" placeholder="Téléphone" required>
            <input type="date" id="edit-fournisseur-contract-start" placeholder="Début du contrat" required>
            <input type="date" id="edit-fournisseur-contract-end" placeholder="Fin du contrat" required>
            <button type="submit" class="btn"><i class="fas fa-save"></i> Sauvegarder</button>
          </form>
        </div>
      </div>
    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
      <script>
        // Données des fournisseurs (simulées)
        let fournisseurs = [
          { id: 1, name: 'Fruits & Co', email: 'contact@fruitsandco.com', phone: '01 23 45 67 89', active: true, contractStart: '2023-01-01', contractEnd: '2023-12-31' },
          { id: 2, name: 'Légumes Frais', email: 'info@legumesfrais.com', phone: '01 98 76 54 32', active: true, contractStart: '2023-01-15', contractEnd: '2023-10-15' },
          { id: 3, name: 'Boulangerie Artisanale', email: 'contact@boulangerie-artisanale.com', phone: '01 11 22 33 44', active: false, contractStart: '2022-08-01', contractEnd: '2023-08-01' }
        ];
    
        // Fonction pour afficher la liste des fournisseurs
        function displayFournisseurs() {
          const listElement = document.getElementById('fournisseur-list-content');
          listElement.innerHTML = '';
    
          fournisseurs.forEach(fournisseur => {
            const fournisseurElement = document.createElement('div');
            fournisseurElement.classList.add('fournisseur-item', 'fade-in');
            const contractStatus = moment(fournisseur.contractEnd).isBefore(moment()) ? 'Expiré' : 'Actif';
            const contractClass = contractStatus === 'Expiré' ? 'text-danger' : 'text-success';
            fournisseurElement.innerHTML = `
              <div class="fournisseur-info">
                <h3>${fournisseur.name}</h3>
                <p><i class="fas fa-envelope"></i> ${fournisseur.email}</p>
                <p><i class="fas fa-phone"></i> ${fournisseur.phone}</p>
                <p><i class="fas fa-calendar-alt"></i> Début du contrat: ${fournisseur.contractStart}</p>
                <p><i class="fas fa-calendar-alt"></i> Fin du contrat: ${fournisseur.contractEnd}</p>
                <p class="${contractClass}"><i class="fas fa-file-contract"></i> Statut du contrat: ${contractStatus}</p>
              </div>
              <div class="fournisseur-actions">
                <button class="btn" onclick="openEditModal(${fournisseur.id})"><i class="fas fa-edit"></i> Modifier</button>
                <button class="btn ${fournisseur.active ? '' : 'btn-danger'}" onclick="toggleFournisseurStatus(${fournisseur.id})">
                  ${fournisseur.active ? '<i class="fas fa-toggle-on"></i> Désactiver' : '<i class="fas fa-toggle-off"></i> Activer'}
                </button>
                <button class="btn btn-danger" onclick="deleteFournisseur(${fournisseur.id})"><i class="fas fa-trash"></i> Supprimer</button>
              </div>
            `;
            listElement.appendChild(fournisseurElement);
          });
    
          updateStats();
        }
    
        // Fonction pour ajouter un nouveau fournisseur
        function addFournisseur(event) {
          event.preventDefault();
          const name = document.getElementById('fournisseur-name').value;
          const email = document.getElementById('fournisseur-email').value;
          const phone = document.getElementById('fournisseur-phone').value;
          const contractStart = document.getElementById('fournisseur-contract-start').value;
          const contractEnd = document.getElementById('fournisseur-contract-end').value;
    
          const newFournisseur = {
            id: fournisseurs.length + 1,
            name,
            email,
            phone,
            active: true,
            contractStart,
            contractEnd
          };
    
          fournisseurs.push(newFournisseur);
          displayFournisseurs();
          event.target.reset();
        }
    
        // Fonction pour changer le statut d'un fournisseur
        function toggleFournisseurStatus(id) {
          const fournisseur = fournisseurs.find(f => f.id === id);
          if (fournisseur) {
            fournisseur.active = !fournisseur.active;
            displayFournisseurs();
          }
        }
    
        // Fonction pour supprimer un fournisseur
        function deleteFournisseur(id) {
          if (confirm('Êtes-vous sûr de vouloir supprimer ce fournisseur ?')) {
            fournisseurs = fournisseurs.filter(f => f.id !== id);
            displayFournisseurs();
          }
        }
    
        // Fonction pour ouvrir le modal d'édition
        function openEditModal(id) {
          const fournisseur = fournisseurs.find(f => f.id === id);
          if (fournisseur) {
            document.getElementById('edit-fournisseur-id').value = fournisseur.id;
            document.getElementById('edit-fournisseur-name').value = fournisseur.name;
            document.getElementById('edit-fournisseur-email').value = fournisseur.email;
            document.getElementById('edit-fournisseur-phone').value = fournisseur.phone;
            document.getElementById('edit-fournisseur-contract-start').value = fournisseur.contractStart;
            document.getElementById('edit-fournisseur-contract-end').value = fournisseur.contractEnd;
            document.getElementById('editModal').style.display = 'block';
          }
        }
    
        // Fonction pour fermer le modal
        function closeModal() {
          document.getElementById('editModal').style.display = 'none';
        }
    
        // Fonction pour modifier un fournisseur
        function editFournisseur(event) {
          event.preventDefault();
          const id = parseInt(document.getElementById('edit-fournisseur-id').value);
          const name = document.getElementById('edit-fournisseur-name').value;
          const email = document.getElementById('edit-fournisseur-email').value;
          const phone = document.getElementById('edit-fournisseur-phone').value;
          const contractStart = document.getElementById('edit-fournisseur-contract-start').value;
          const contractEnd = document.getElementById('edit-fournisseur-contract-end').value;
    
          const fournisseur = fournisseurs.find(f => f.id === id);
          if (fournisseur) {
            fournisseur.name = name;
            fournisseur.email = email;
            fournisseur.phone = phone;
            fournisseur.contractStart = contractStart;
            fournisseur.contractEnd = contractEnd;
            displayFournisseurs();
            closeModal();
          }
        }
    
        // Fonction pour mettre à jour les statistiques
        function updateStats() {
          document.getElementById('total-fournisseurs').textContent = fournisseurs.length;
          document.getElementById('active-fournisseurs').textContent = fournisseurs.filter(f => f.active).length;
          document.getElementById('contracts-to-renew').textContent = fournisseurs.filter(f => moment(f.contractEnd).isBefore(moment().add(30, 'days'))).length;
        }
    
        // Initialisation
        document.addEventListener('DOMContentLoaded', () => {
          displayFournisseurs();
          document.getElementById('add-fournisseur-form').addEventListener('submit', addFournisseur);
          document.getElementById('edit-fournisseur-form').addEventListener('submit', editFournisseur);
          document.querySelector('.close').addEventListener('click', closeModal);
          document.getElementById('toggle-fournisseur-list').addEventListener('click', () => {
            const listContent = document.getElementById('fournisseur-list-content');
            listContent.classList.toggle('hidden');
          });
          window.onclick = function(event) {
            if (event.target == document.getElementById('editModal')) {
              closeModal();
            }
          }
        });
      </script>
    </body>
    </html>
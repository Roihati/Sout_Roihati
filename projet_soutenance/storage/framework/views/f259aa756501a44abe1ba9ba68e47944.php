<html><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système d'Alerte - Supermarché</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
      @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
      }
      .pulse-animation {
        animation: pulse 2s infinite;
      }
    </style>
    </head>
    <body class="bg-gray-100 font-sans">
      <div class="container mx-auto px-4 py-8">
        <header class="flex justify-between items-center mb-8">
          <a href="/suppermarche/supermaket" class="text-blue-600 hover:text-blue-800 transition-colors duration-300">
            <i class="fas fa-home text-2xl"></i>
          </a>
          <h1 class="text-4xl font-bold text-center text-blue-600">Système d'Alerte - Supermarché</h1>
          <div></div> <!-- Élément vide pour centrer le titre -->
        </header>
        
        <p class="text-center text-xl text-gray-600 italic mb-8">"Vigilance constante, sécurité permanente"</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-blue-500 text-white py-3 px-4 text-xl font-semibold flex items-center">
              <i class="fas fa-exclamation-triangle mr-2"></i>
              Alertes Système
            </div>
            <div id="system-alerts" class="p-4 space-y-4 max-h-96 overflow-y-auto"></div>
          </div>
          
          <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-yellow-500 text-white py-3 px-4 text-xl font-semibold flex items-center">
              <i class="fas fa-shield-alt mr-2"></i>
              Alertes Sécurité
            </div>
            <div id="security-alerts" class="p-4 space-y-4 max-h-96 overflow-y-auto"></div>
          </div>
        </div>
    
        <div class="mt-8 bg-white rounded-lg shadow-lg p-4">
          <h2 class="text-2xl font-bold mb-4 flex items-center">
            <i class="fas fa-chart-bar mr-2 text-blue-500"></i>
            Statistiques des Alertes
          </h2>
          <canvas id="alertChart" width="400" height="200"></canvas>
        </div>
      </div>
    
      <div id="notification" class="fixed top-4 right-4 bg-green-500 text-white py-2 px-4 rounded shadow-lg transform transition-transform duration-300 translate-x-full flex items-center">
        <i class="fas fa-bell mr-2"></i>
        Nouvelle alerte reçue !
      </div>
    <?php echo $__env->make('fournisseur.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <script>
        let alertsData = {
          system: [],
          security: []
        };
    
        function addAlert(alert) {
          const alertElement = document.createElement('div');
          alertElement.className = `bg-gray-50 p-4 rounded-lg shadow transition-all duration-300 hover:shadow-md ${alert.type === 'system' ? 'border-l-4 border-red-500' : 'border-l-4 border-yellow-500'}`;
          alertElement.innerHTML = `
            <h3 class="text-lg font-semibold mb-2 ${alert.type === 'system' ? 'text-red-600' : 'text-yellow-600'} flex items-center">
              <i class="fas ${alert.type === 'system' ? 'fa-desktop' : 'fa-user-shield'} mr-2"></i>
              ${alert.title}
            </h3>
            <p class="text-gray-600 mb-2">${alert.description}</p>
            <small class="text-gray-500 flex items-center">
              <i class="far fa-clock mr-1"></i>
              ${moment(alert.timestamp).fromNow()}
            </small>
          `;
          
          const targetContainer = alert.type === 'system' ? 'system-alerts' : 'security-alerts';
          const container = document.getElementById(targetContainer);
          container.insertBefore(alertElement, container.firstChild);
          
          alertsData[alert.type].push(alert);
          updateChart();
          showNotification();
        }
    
        function showNotification() {
          const notification = document.getElementById('notification');
          notification.classList.remove('translate-x-full');
          notification.classList.add('pulse-animation');
          setTimeout(() => {
            notification.classList.add('translate-x-full');
            notification.classList.remove('pulse-animation');
          }, 3000);
        }
    
        // Initialisation du graphique
        const ctx = document.getElementById('alertChart').getContext('2d');
        const chart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Alertes Système', 'Alertes Sécurité'],
            datasets: [{
              label: 'Nombre d\'alertes',
              data: [0, 0],
              backgroundColor: ['rgba(239, 68, 68, 0.5)', 'rgba(245, 158, 11, 0.5)'],
              borderColor: ['rgb(239, 68, 68)', 'rgb(245, 158, 11)'],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true,
                ticks: {
                  stepSize: 1
                }
              }
            }
          }
        });
    
        function updateChart() {
          chart.data.datasets[0].data = [alertsData.system.length, alertsData.security.length];
          chart.update();
        }
    
        // Simule la réception d'alertes initiales
        const initialAlerts = [
          { type: 'system', title: 'Panne du système de caisse', description: 'Le système de caisse principal est hors service. Veuillez utiliser le système de secours.', timestamp: new Date() },
          { type: 'security', title: 'Tentative d\'intrusion détectée', description: 'Une tentative d\'intrusion a été détectée à l\'entrée arrière du magasin.', timestamp: new Date(Date.now() - 1800000) },
          { type: 'system', title: 'Problème de connexion réseau', description: 'La connexion au réseau est instable. L\'équipe IT a été notifiée.', timestamp: new Date(Date.now() - 3600000) },
        ];
    
        initialAlerts.forEach(addAlert);
    
        // Simule la réception de nouvelles alertes
        setInterval(() => {
          const alertTypes = ['system', 'security'];
          const randomType = alertTypes[Math.floor(Math.random() * alertTypes.length)];
          const newAlert = {
            type: randomType,
            title: randomType === 'system' ? 'Nouvelle alerte système' : 'Nouvelle alerte de sécurité',
            description: `Ceci est une nouvelle alerte ${randomType === 'system' ? 'système' : 'de sécurité'} générée automatiquement.`,
            timestamp: new Date()
          };
          addAlert(newAlert);
        }, 15000); // Ajoute une nouvelle alerte toutes les 15 secondes
    
        // Met à jour les timestamps relatifs
        setInterval(() => {
          document.querySelectorAll('#system-alerts small, #security-alerts small').forEach(timeElement => {
            const timestamp = moment(timeElement.textContent, 'YYYY-MM-DD HH:mm:ss');
            timeElement.textContent = timestamp.fromNow();
          });
        }, 60000); // Met à jour toutes les minutes
      </script>
    </body>
    </html><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/suppermarche/alert.blade.php ENDPATH**/ ?>
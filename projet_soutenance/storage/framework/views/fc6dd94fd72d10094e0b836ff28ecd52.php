<?php $__env->startSection('content'); ?>
<html>
<head>
    <base href="." />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
        }
        
        .stat-card {
            transition: transform 0.2s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .chart {
            transition: all 0.3s ease;
        }
        
        .chart:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="p-6 bg-slate-50" x-data="{ showDetails: false }">

<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="stat-card bg-blue-500 rounded-xl p-6 shadow-lg" @click="showDetails = !showDetails">
        <div class="text-3xl font-bold text-white mb-2">133</div>
        <div class="text-white font-medium">Utilisateurs enregistrés</div>
        <div class="text-blue-100 text-sm mt-2">407 messages envoyés récemment</div>
    </div>
    <div class="stat-card bg-emerald-500 rounded-xl p-6 shadow-lg" @click="showDetails = !showDetails">
        <div class="text-3xl font-bold text-white mb-2">1,031</div>
        <div class="text-white font-medium">Articles</div>
        <div class="text-emerald-100 text-sm mt-2">La croissance ne s'arrête jamais</div>
    </div>
    <div class="stat-card bg-amber-500 rounded-xl p-6 shadow-lg" @click="showDetails = !showDetails">
        <div class="text-3xl font-bold text-white mb-2">29 jours</div>
        <div class="text-white font-medium">Depuis la dernière mise à jour</div>
        <div class="text-amber-100 text-sm mt-2">Publiez un article tous les 2 à 3 jours</div>
    </div>
    <div class="stat-card bg-rose-500 rounded-xl p-6 shadow-lg" @click="showDetails = !showDetails">
        <div class="text-3xl font-bold text-white mb-2">210</div>
        <div class="text-white font-medium">Produits</div>
        <div class="text-rose-100 text-sm mt-2">Essayez de rester sous 75 produits</div>
    </div>
</div>

<div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <div class="chart bg-white rounded-xl p-6 shadow-lg">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Nouveaux utilisateurs des 7 derniers jours</h2>
        <canvas id="barChart"></canvas>
    </div>
    <div class="chart bg-white rounded-xl p-6 shadow-lg">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Nouvelles entrées</h2>
        <canvas id="lineChart"></canvas>
    </div>
</div>

<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
    <template x-if="showDetails">
      <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
          <h2 class="text-lg font-semibold text-gray-800 mb-3">Titre de la carte</h2>
          <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis non mi nec orci euismod venenatis.</p>
      </div>
      <!-- Ajoutez d'autres cartes ici si nécessaire -->
    </template>  
</div>

<script>
// Configuration du graphique à barres
const barCtx = document.getElementById('barChart').getContext('2d');
new Chart(barCtx, {
    type: 'bar',
    data: {
        labels: ['Il y a 6 jours', 'Il y a 5 jours', 'Il y a 4 jours', 'Il y a 3 jours', 'Il y a 2 jours', 'Hier', 'Aujourd\'hui'],
        datasets: [{
            label: 'Utilisateurs créés',
            data: [15, 15, 14, 16, 15, 22, 25],
            backgroundColor: 'rgb(16, 185, 129)',
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    display: false
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});

// Configuration du graphique linéaire
const lineCtx = document.getElementById('lineChart').getContext('2d');
new Chart(lineCtx, {
    type: 'line',
    data: {
        labels: Array.from({length: 30}, (_, i) => `Jour ${i+1}`),
        datasets: [{
            label: 'Utilisateurs',
            data: Array.from({length: 30}, () => Math.floor(Math.random() * 20) + 10),
            borderColor: 'rgb(16, 185, 129)',
            tension: 0.4,
            fill: true,
            backgroundColor: 'rgba(16, 185, 129, 0.1)'
        }, {
            label: 'Articles',
            data: Array.from({length: 30}, () => Math.floor(Math.random() * 40) + 20),
            borderColor: 'rgb(168, 85, 247)',
            tension: 0.4,
            fill: true,
            backgroundColor: 'rgba(168, 85, 247, 0.1)'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top'
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    display: false
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});
</script>

</body></html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(backpack_view('blank'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/vendor/backpack/ui/dashboard.blade.php ENDPATH**/ ?>
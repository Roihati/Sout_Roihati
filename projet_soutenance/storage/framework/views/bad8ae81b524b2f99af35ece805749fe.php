<html><head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Mise en Garde Amélioré</title>
    <script src="https://cdn.tailwindcss.com">
    </script><script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">
    </script><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.1;
        }
    </style>
    </head>
    <body class="bg-gradient-to-br from-indigo-100 to-purple-100 min-h-screen">
        <!-- Ajout de l'animation de fond -->
        <div class="background-animation">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" viewBox="0 0 1920 1080">
                <defs>
                    <radialGradient id="rgrad" cx="50%" cy="50%" r="70%">
                        <stop offset="0%" stop-color="#4338CA" stop-opacity="1"/>
                        <stop offset="100%" stop-color="#3730A3" stop-opacity="0"/>
                    </radialGradient>
                </defs>
                <g fill="none" stroke-linecap="round">
                    <g transform="translate(960 540)" stroke-width="2">
                        <circle r="900" stroke="url(#rgrad)">
                            <animateTransform attributeName="transform" type="rotate" dur="35s" repeatCount="indefinite" values="0 0 0;360 0 0"/>
                        </circle>
                        <circle r="750" stroke="url(#rgrad)">
                            <animateTransform attributeName="transform" type="rotate" dur="30s" repeatCount="indefinite" values="360 0 0;0 0 0"/>
                        </circle>
                        <circle r="600" stroke="url(#rgrad)">
                            <animateTransform attributeName="transform" type="rotate" dur="25s" repeatCount="indefinite" values="0 0 0;-360 0 0"/>
                        </circle>
                        <circle r="450" stroke="url(#rgrad)">
                            <animateTransform attributeName="transform" type="rotate" dur="20s" repeatCount="indefinite" values="-360 0 0;0 0 0"/>
                        </circle>
                        <circle r="300" stroke="url(#rgrad)">
                            <animateTransform attributeName="transform" type="rotate" dur="15s" repeatCount="indefinite" values="0 0 0;360 0 0"/>
                        </circle>
                    </g>
                </g>
            </svg>
        </div>
    
        <div x-data="alertSystem()" class="container mx-auto p-6">
            <h1 class="text-4xl font-bold mb-8 text-center text-indigo-800 flex items-center justify-center">
                <i class="fas fa-exclamation-triangle mr-4 text-yellow-500"></i>
                Système de Mise en Garde
            </h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Alertes de stock faible -->
                <div class="bg-white p-6 rounded-lg shadow-lg border border-indigo-200 transform hover:scale-105 transition duration-300">
                    <h2 class="text-2xl font-semibold mb-4 text-indigo-700 flex items-center">
                        <i class="fas fa-box-open mr-3 text-red-500"></i>
                        Alertes de stock faible
                    </h2>
                    <ul class="space-y-3">
                        <template x-for="alert in lowStockAlerts" :key="alert.id">
                            <li class="flex items-center justify-between bg-red-50 p-4 rounded-md border-l-4 border-red-500">
                                <span class="font-medium" x-text="alert.product"></span>
                                <span class="text-red-600 font-bold" x-text="'Stock: ' + alert.stock"></span>
                            </li>
                        </template>
                    </ul>
                </div>
                
                <!-- Alertes de non-conformité -->
                <div class="bg-white p-6 rounded-lg shadow-lg border border-indigo-200 transform hover:scale-105 transition duration-300">
                    <h2 class="text-2xl font-semibold mb-4 text-indigo-700 flex items-center">
                        <i class="fas fa-exclamation-circle mr-3 text-yellow-500"></i>
                        Alertes de non-conformité
                    </h2>
                    <ul class="space-y-3">
                        <template x-for="alert in nonComplianceAlerts" :key="alert.id">
                            <li class="flex items-center justify-between bg-yellow-50 p-4 rounded-md border-l-4 border-yellow-500">
                                <span class="font-medium" x-text="alert.product"></span>
                                <span class="text-yellow-600 font-bold" x-text="alert.issue"></span>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
            
            <!-- Miroir réfléchissant -->
            <div class="mt-12 mb-8 relative">
                <div class="w-full h-1 bg-gradient-to-r from-transparent via-indigo-300 to-transparent"></div>
                <div class="absolute inset-x-0 top-0 h-20 bg-gradient-to-b from-white to-transparent opacity-30"></div>
            </div>
    
            <!-- Bouton pour simuler de nouvelles alertes -->
            <div class="mt-8 text-center">
                <button @click="simulateNewAlert" class="bg-indigo-600 text-white px-8 py-3 rounded-full hover:bg-indigo-700 transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 shadow-lg">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Simuler une nouvelle alerte
                </button>
            </div>
        </div>
    <?php echo $__env->make('fournisseur.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <script>
            function alertSystem() {
                return {
                    lowStockAlerts: [
                        { id: 1, product: "Pommes", stock: 5 },
                        { id: 2, product: "Bananes", stock: 3 },
                    ],
                    nonComplianceAlerts: [
                        { id: 1, product: "Lait", issue: "Date de péremption proche" },
                        { id: 2, product: "Viande", issue: "Température de stockage non conforme" },
                    ],
                    simulateNewAlert() {
                        const alertTypes = ['stock', 'compliance'];
                        const randomType = alertTypes[Math.floor(Math.random() * alertTypes.length)];
                        
                        if (randomType === 'stock') {
                            const newAlert = {
                                id: this.lowStockAlerts.length + 1,
                                product: "Nouveau produit " + (this.lowStockAlerts.length + 1),
                                stock: Math.floor(Math.random() * 5) + 1
                            };
                            this.lowStockAlerts.push(newAlert);
                            this.showNotification('Alerte de stock faible', `Le produit ${newAlert.product} a un stock bas de ${newAlert.stock} unités.`);
                        } else {
                            const issues = ['Qualité non conforme', 'Emballage endommagé', 'Étiquetage incorrect'];
                            const newAlert = {
                                id: this.nonComplianceAlerts.length + 1,
                                product: "Produit " + (this.nonComplianceAlerts.length + 1),
                                issue: issues[Math.floor(Math.random() * issues.length)]
                            };
                            this.nonComplianceAlerts.push(newAlert);
                            this.showNotification('Alerte de non-conformité', `Le produit ${newAlert.product} présente un problème : ${newAlert.issue}.`);
                        }
                    },
                    showNotification(title, message) {
                        Swal.fire({
                            title: title,
                            text: message,
                            icon: 'warning',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'bg-indigo-600 text-white px-4 py-2 rounded-full hover:bg-indigo-700 transition duration-300'
                            },
                            buttonsStyling: false
                        });
                    }
                }
            }
        </script>
    </body></html><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/suppermarche/important.blade.php ENDPATH**/ ?>
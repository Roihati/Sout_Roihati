<html><head>
    <?php echo $__env->make('fournisseur.deconnexion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Suivi des Commandes - Tableau de Bord</title><style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f4f8;
}
.dashboard {
    max-width: 1200px;
    margin: 2rem auto;
    padding: 2rem;
    background-color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}
h1 {
    color: #2c3e50;
    text-align: center;
    margin-bottom: 2rem;
}
.status-cards {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
}
.status-card {
    flex: 1;
    min-width: 200px;
    padding: 1.5rem;
    border-radius: 8px;
    color: #ffffff;
    text-align: center;
    transition: transform 0.3s ease;
}
.status-card:hover {
    transform: translateY(-5px);
}
.status-card h2 {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
}
.status-card p {
    font-size: 2rem;
    font-weight: bold;
    margin: 0;
}
.received { background-color: #3498db; }
.processing { background-color: #f39c12; }
.shipped { background-color: #2ecc71; }
.delivered { background-color: #9b59b6; }
.chart-container {
    margin-top: 2rem;
    height: 300px;
}
.input-form {
    margin-top: 2rem;
    padding: 1rem;
    background-color: #ecf0f1;
    border-radius: 8px;
}
.input-form h2 {
    color: #2c3e50;
    margin-bottom: 1rem;
}
.input-group {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
}
.input-group label {
    flex: 1;
    margin-right: 1rem;
}
.input-group input {
    flex: 2;
    padding: 0.5rem;
    border: 1px solid #bdc3c7;
    border-radius: 4px;
}
button {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
button:hover {
    background-color: #2980b9;
}
.print-button {
    display: block;
    margin: 1rem auto;
    background-color: #2ecc71;
}
.print-button:hover {
    background-color: #27ae60;
}
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<body>
    <div class="dashboard">
        <h1>Tableau de Bord - Suivi des Commandes</h1>
        <div class="status-cards">
            <div class="status-card received">
                <h2>Reçues</h2>
                <p id="received-count">0</p>
            </div>
            <div class="status-card processing">
                <h2>En Traitement</h2>
                <p id="processing-count">0</p>
            </div>
            <div class="status-card shipped">
                <h2>Expédiées</h2>
                <p id="shipped-count">0</p>
            </div>
            <div class="status-card delivered">
                <h2>Livrées</h2>
                <p id="delivered-count">0</p>
            </div>
        </div>
        <div class="chart-container">
            <canvas id="ordersChart"></canvas>
        </div>
        <div class="input-form">
            <h2>Mise à jour des commandes</h2>
            <form id="update-form">
                <div class="input-group">
                    <label for="received">Reçues:</label>
                    <input type="number" id="received" name="received" min="0" required>
                </div>
                <div class="input-group">
                    <label for="processing">En Traitement:</label>
                    <input type="number" id="processing" name="processing" min="0" required>
                </div>
                <div class="input-group">
                    <label for="shipped">Expédiées:</label>
                    <input type="number" id="shipped" name="shipped" min="0" required>
                </div>
                <div class="input-group">
                    <label for="delivered">Livrées:</label>
                    <input type="number" id="delivered" name="delivered" min="0" required>
                </div>
                <button type="submit">Mettre à jour</button>
            </form>
        </div>
        <button class="print-button" onclick="generatePDF()">Imprimer le reçu en PDF</button>
    </div>
    <?php echo $__env->make('fournisseur.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
    let orderData = {
        received: 0,
        processing: 0,
        shipped: 0,
        delivered: 0
    };

    let chart;

    function updateDisplay() {
        document.getElementById('received-count').textContent = orderData.received;
        document.getElementById('processing-count').textContent = orderData.processing;
        document.getElementById('shipped-count').textContent = orderData.shipped;
        document.getElementById('delivered-count').textContent = orderData.delivered;

        chart.data.datasets[0].data = [orderData.received, orderData.processing, orderData.shipped, orderData.delivered];
        chart.update();
    }

    document.getElementById('update-form').addEventListener('submit', function(e) {
        e.preventDefault();
        orderData.received = parseInt(document.getElementById('received').value);
        orderData.processing = parseInt(document.getElementById('processing').value);
        orderData.shipped = parseInt(document.getElementById('shipped').value);
        orderData.delivered = parseInt(document.getElementById('delivered').value);
        updateDisplay();
    });

    // Create chart
    const ctx = document.getElementById('ordersChart').getContext('2d');
    chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Reçues', 'En Traitement', 'Expédiées', 'Livrées'],
            datasets: [{
                label: 'Nombre de Commandes',
                data: [orderData.received, orderData.processing, orderData.shipped, orderData.delivered],
                backgroundColor: [
                    '#3498db',
                    '#f39c12',
                    '#2ecc71',
                    '#9b59b6'
                ],
                borderColor: [
                    '#2980b9',
                    '#d35400',
                    '#27ae60',
                    '#8e44ad'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });

    function generatePDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        doc.setFontSize(18);
        doc.text('Reçu de Commandes', 105, 20, null, null, 'center');
        doc.setFontSize(12);
        doc.text(`Reçues: ${orderData.received}`, 20, 40);
        doc.text(`En Traitement: ${orderData.processing}`, 20, 50);
        doc.text(`Expédiées: ${orderData.shipped}`, 20, 60);
        doc.text(`Livrées: ${orderData.delivered}`, 20, 70);
        doc.text(`Date: ${new Date().toLocaleDateString()}`, 20, 90);
        doc.save('recu-commandes.pdf');
    }
    </script>
</body></html><?php /**PATH C:\wamp64\www\Sout_Roihati\projet_soutenance\resources\views/fournisseur/suivicommande.blade.php ENDPATH**/ ?>
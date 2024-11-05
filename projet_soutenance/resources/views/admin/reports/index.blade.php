<!-- resources/views/admin/reports/index.blade.php -->

@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            Rapports et Statistiques
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ backpack_url() }}">Tableau de bord</a></li>
            <li class="active">Rapports</li>
        </ol>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>Ventes Mensuelles</h3>
            <canvas id="salesChart"></canvas>
        </div>
        
        <div class="col-md-6">
            <h3>Statistiques des Produits</h3>
            <canvas id="productChart"></canvas>
        </div>
    </div>
@endsection

@push('after_scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Exemple de données pour le graphique des ventes
        const salesData = @json($salesData);
        const salesChart = new Chart(document.getElementById('salesChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: Object.keys(salesData),
                datasets: [{
                    label: 'Ventes',
                    data: Object.values(salesData),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    fill: false
                }]
            }
        });

        // Exemple de données pour le graphique des produits
        const productStats = @json($productStats);
        const productChart = new Chart(document.getElementById('productChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: Object.keys(productStats),
                datasets: [{
                    label: 'Quantité Vendue',
                    data: Object.values(productStats),
                    backgroundColor: 'rgba(153, 102, 255, 0.5)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            }
        });
    </script>
@endpush

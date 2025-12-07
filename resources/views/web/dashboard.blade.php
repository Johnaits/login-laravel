@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div>
        <!-- Cabeçalho -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Bem-vindo, {{ Auth::user()->name ?? 'Usuário' }}!</h1>
            <p class="text-gray-600">Aqui está um resumo da sua atividade.</p>
        </div>

        <!-- Grid de Cards de Resumo -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            <!-- Card 1: Usuários -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-gray-500 text-sm font-medium mb-2">Total de Usuários</h3>
                <p class="text-3xl font-bold text-gray-800">1,257</p>
                <p class="text-green-500 text-sm mt-1">+12% desde o último mês</p>
            </div>
            <!-- Card 2: Vendas -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-gray-500 text-sm font-medium mb-2">Vendas (Mês)</h3>
                <p class="text-3xl font-bold text-gray-800">R$ 28,450</p>
                <p class="text-green-500 text-sm mt-1">+8.2% desde o último mês</p>
            </div>
            <!-- Card 3: Taxa de Conversão -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-gray-500 text-sm font-medium mb-2">Taxa de Conversão</h3>
                <p class="text-3xl font-bold text-gray-800">3.58%</p>
                <p class="text-red-500 text-sm mt-1">-0.5% desde o último mês</p>
            </div>
        </div>

        <!-- Grid de Gráficos -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Gráfico de Barras -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="font-semibold text-lg mb-4">Vendas por Categoria</h3>
                <canvas id="barChart"></canvas>
            </div>
            <!-- Gráfico de Pizza -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="font-semibold text-lg mb-4">Distribuição de Usuários</h3>
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart.js CDN e Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Gráfico de Barras - Vendas por Categoria
        const ctxBar = document.getElementById('barChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Software', 'Serviços', 'Hardware', 'Assinaturas'],
                datasets: [{
                    label: 'Vendas (R$)',
                    data: [15000, 9000, 7000, 10300],
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.7)',
                        'rgba(16, 185, 129, 0.7)',
                        'rgba(249, 115, 22, 0.7)',
                        'rgba(139, 92, 246, 0.7)'
                    ],
                    borderColor: [
                        'rgba(59, 130, 246, 1)',
                        'rgba(16, 185, 129, 1)',
                        'rgba(249, 115, 22, 1)',
                        'rgba(139, 92, 246, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: { y: { beginAtZero: true } }
            }
        });

        // Gráfico de Pizza - Distribuição de Usuários
        const ctxPie = document.getElementById('pieChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: ['Brasil', 'Portugal', 'Angola', 'Outros'],
                datasets: [{
                    data: [58, 18, 9, 15],
                    backgroundColor: [
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(249, 115, 22, 0.8)',
                        'rgba(107, 114, 128, 0.8)'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'bottom' } }
            }
        });
    });
    </script>
@endsection
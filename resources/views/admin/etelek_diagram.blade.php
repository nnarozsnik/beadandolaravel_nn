@extends('frontend.master')

@section('title', 'Ételek diagram')

@section('content')
<div class="container" style="padding-top:120px; max-width:700px;">
    <div class="card shadow-sm p-4">
        <h3 class="text-center mb-4">Ételek száma kategóriánként</h3>
        <div style="height:400px;">
            <canvas id="etelekChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('etelekChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($labels),
        datasets: [{
            label: 'Ételek száma',
            data: @json($data),
            backgroundColor: 'rgba(252, 149, 196, 0.5)',
            borderColor: 'rgba(252, 149, 196, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>
@endsection
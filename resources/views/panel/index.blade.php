@extends('layouts.plantilla')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<h1>PANEL</h1>

<div class="cardsContainerUp d-flex">
    <div class="card">
        <div class="card-header">
            ESTADÍSTICAS GENERALES
        </div>
       <div>
         <!-- <p>Usuarios registrados: {{ $totalUsers }}</p>
        <p>Roles registrados: {{ $totalroles }}</p> -->
        <p>Usuarios registrados: {{ $totalUsers }}</p>
        <p>Instalaciones registradas: {{ $totalfacilities }}</p>
        <p>Administrativos registrados: {{ $totalAdmnistratives }}</p>
        <p>Trabajadores de muelle registrados: {{ $totalDockWorkers }}</p>
        <p>Pantalanes registrados: {{ $totalPantalanes }}</p>
        <p>Número total de Plazas Base: {{ $totalPlazasBase }}</p>
        <p>amarres Operativos: {{$amarresOperativos}}</p>
        <p>amarres No Operativos: {{$amarresNoOperativos}}</p>
        <p>Plazas Base que expiran en 1 mes: {{$plazasBaseExpiran1mes}}</p>
       </div>

    </div>
    <div class="card">
        <div class="card-header">
            ROLES REGISTRADOS
        </div>
        <canvas id="barChart2"></canvas>
    </div>
    <div class="card">
        <canvas id="barChart3"></canvas>
    </div>
</div>
<div class="cardsContainerDown d-flex">
    <div class="card">
        <canvas id="barChart4"></canvas>

    </div>
    <div class="card">
        <canvas id="barChart5"></canvas>
    </div>
    <div class="card">
        <canvas id="barChart6"></canvas>
    </div>
</div>

<script>
    var ctx2 = document.getElementById('barChart2').getContext('2d');
    var myChart2 = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: @json($data['labels']),
            datasets: [{
                label: 'Data',
                data: @json($data['data']),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    var ctx3 = document.getElementById('barChart3').getContext('2d');
    var myChart3 = new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: @json($data['labels']),
            datasets: [{
                label: 'Data',
                data: @json($data['data']),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    var ctx4 = document.getElementById('barChart4').getContext('2d');
    var myChart4 = new Chart(ctx4, {
        type: 'bar',
        data: {
            labels: @json($data['labels']),
            datasets: [{
                label: 'Data',
                data: @json($data['data']),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    var ctx5 = document.getElementById('barChart5').getContext('2d');
    var myChart5 = new Chart(ctx5, {
        type: 'bar',
        data: {
            labels: @json($data['labels']),
            datasets: [{
                label: 'Data',
                data: @json($data['data']),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    var ctx6 = document.getElementById('barChart6').getContext('2d');
    var myChart6 = new Chart(ctx6, {
        type: 'bar',
        data: {
            labels: @json($data['labels']),
            datasets: [{
                label: 'Data',
                data: @json($data['data']),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<style>
    @import url("https://fonts.googleapis.com/css?family=Questrial&display=swap");
    @import url('https://fonts.googleapis.com/css?family=Inter:400,700&display=swap');

    .card {
        width: 310px;
        height: 230px;
        flex-shrink: 0;
        border-radius: 20px;
        background: #fff;
        box-shadow: 4px 4px 4px 0px rgba(0, 0, 0, 0.25);
        color: #000;
        font-family: Inter;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        justify-content: space-around;
        margin: 10px;

    }

    .card-header {
        border-radius: 30px 30px 0px 0px;
        background: var(--Wedgewood-600, #426787);
        color: #fff;
        font-family: Questrial;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .cardDown {
        margin-top: 20px;
    }
</style>

@endsection
@extends('layouts.plantilla')
@section('title', 'Panel de control')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- <h1>PANEL</h1> -->

<div class="d-flex flex-column align-items-center cardsContainer">
    <div class="cardsContainerUp d-flex">
        <div class="card">
            <div class="card-header text-center">
                ESTADÍSTICAS GENERALES
            </div>
            <div class="card-content overflow-auto d-flex justify-content-around">

                <div>
                    <p><b>Usuarios registrados:</b> {{ $totalUsers }}</p>
                    <p><b>Instalaciones registradas:</b> {{ $totalfacilities }}</p>
                    <p><b>Administrativos registrados:</b> {{ $totalAdmnistratives }}</p>
                    <p><b>Trabajadores de muelle registrados:</b> {{ $totalDockWorkers }}</p>
                    <p><b>Pantalanes registrados:</b> {{ $totalPantalanes }}</p>
                    <p><b>Número total de Plazas Base:</b> {{ $totalPlazasBase }}</p>
                    <p><b>amarres Operativos:</b> {{$amarresOperativos}}</p>
                    <p><b>amarres No Operativos:</b> {{$amarresNoOperativos}}</p>
                    <p><b>Plazas Base que expiran en 1 mes:</b> {{$plazasBaseExpiran1mes}}</p>
                </div>
                <div class="d-flex flex-column">
                    <div class="scrollUpContainer">
                        <img alt="scroll-up" src="/image/scrollUp.svg" class="scrollIcon" id="scrollUp" />
                    </div>
                    <div class="scrollDownContainer">
                        <img alt="scroll-down" src="/image/scrollDown.svg" class="scrollIcon" id="scrollDown" />
                    </div>
                </div>
            </div>

        </div>
        <div class="card">
            <div class="card-header text-center">
                ROLES REGISTRADOS
            </div>
            <div class="card-content overflow-auto">
                <canvas id="barChart2"></canvas>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <canvas id="barChart3"></canvas>
            </div>
        </div>
    </div>
    <div class="cardsContainerDown d-flex">
        <div class="card">
            <div class="card-content">
                <canvas id="barChart4"></canvas>
            </div>

        </div>
        <div class="card">
            <div class="card-content">
                <canvas id="barChart5"></canvas>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <canvas id="barChart6"></canvas>
            </div>
        </div>
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
    const scrollUp = document.getElementById('scrollUp');
    const scrollDown = document.getElementById('scrollDown');

    scrollUp.addEventListener('click', () => {
        // Desplaza el contenido hacia arriba
        document.querySelector('.card-content').scrollTop -= 10; // Ajusta la cantidad de desplazamiento según sea necesario
    });

    scrollDown.addEventListener('click', () => {
        // Desplaza el contenido hacia abajo
        document.querySelector('.card-content').scrollTop += 10; // Ajusta la cantidad de desplazamiento según sea necesario
    });
</script>
<style>
    @import url("https://fonts.googleapis.com/css?family=Questrial&display=swap");
    @import url('https://fonts.googleapis.com/css?family=Inter:400,700&display=swap');

    .cardsContainer {
        max-width: 1200px;
        /* Ajusta el valor según tus necesidades */
        margin: 0 auto;
        /* Esto centrará horizontalmente el contenedor */
        height: 100%;
        /* O ajusta la altura según sea necesario */
        justify-content: center;
        /* Esto centrará verticalmente el contenedor */
    }

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

        /* Agrega desplazamiento vertical */
        /* position: relative; */
        /* Establece la posición relativa para los elementos internos */
    }

    .card-header {
        position: sticky;
        /* Establece la posición fija */
        top: 0;
        /* Fija la posición en la parte superior */
        z-index: 1;
        /* Asegura que el encabezado esté por encima del contenido */
        background: var(--Wedgewood-600, #426787);
        color: #fff;
        font-family: Questrial;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        border-radius: 20px 20px 0px 0px;
        /* Ajusta según sea necesario */
        padding: 10px;

        /* Ajusta el relleno según sea necesario */
    }

    .card-content {
        padding: 10px;
        height: 100%;
        /* overflow-y: auto; */
        /* Ajusta el relleno según sea necesario */
    }


    .cardDown {
        margin-top: 20px;
    }

    .card-content.overflow-auto::-webkit-scrollbar {
        width: 0px;


        /* Ancho de la barra de desplazamiento */
    }

    .card-content.overflow-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 6px;

        /* Color de fondo de la pista de la barra de desplazamiento */
    }

    .card-content.overflow-auto::-webkit-scrollbar-thumb {
        background: #888;
        /* Color del pulgar de la barra de desplazamiento */
        border-radius: 6px;
        /* Radio de borde del pulgar */
    }

    .card-content.overflow-auto::-webkit-scrollbar-thumb:hover {
        background: #555;
        /* Color del pulgar de la barra de desplazamiento al pasar el mouse sobre él */
    }

    .scrollUpContainer {
        position: absolute;
        right: 10px;
        /* Ajusta la posición del contenedor según sea necesario */
        top: 40px;
        /* Ajusta la posición del contenedor según sea necesario */
        z-index: 2;
        /* Asegura que el contenedor esté por encima del contenido */
    }

    /* Estilo para el contenedor del icono de scroll hacia abajo */
    .scrollDownContainer {
        position: absolute;
        right: 10px;
        /* Ajusta la posición del contenedor según sea necesario */
        bottom: 10px;
        /* Ajusta la posición del contenedor según sea necesario */
        z-index: 2;
        /* Asegura que el contenedor esté por encima del contenido */
    }

    /* Estilo para ambos iconos */
    .scrollIcon {
        width: 20px;
        /* Ajusta el tamaño del icono según sea necesario */
        cursor: pointer;
        /* Cambia el cursor al pasar sobre el icono */
    }
</style>

@endsection
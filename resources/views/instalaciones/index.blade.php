@extends('layouts.plantilla')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<div class="d-flex flex-row-reverse mb-2 mt-3"><a href="{{ route('instalaciones.create') }}" class="enlaceCreateEmb">INSTALACIONES</a></div>


@foreach ($instalaciones as $instalacion)
<h2 > <a href="{{ route('pantalanes.create') }}" class="cabecera-tabla-link">
        <img src="/Image/add_solid.svg" alt="Icon">
      </a>{{ $instalacion->Ubicacion }}</h2>
<div class="container" >
    @foreach ($instalacion->pantalanes as $pantalan)
    <table class="table table-hover table-custom-hover rounded-3 overflow-hidden table-striped" style="width:100%" > 
        <thead>
            <tr>
                <th class="cabeceraTabla" colspan="4">{{ $pantalan->Nombre }}  <a href="{{ route('amarres.create') }}" class="cabecera-tabla-link">
        <img src="/Image/add_solid.svg" alt="Icon">
      </a></th>
            </tr>
            <tr class="cabeceraDatos">
                <th>Numero de amarre</th>
                <th>Estado</th>
                <th>Tipo de Plaza</th>
                <th>Año</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pantalan->plazas as $plaza)
            <tr>
                <td>{{ $plaza->Numero }}</td>
                <td>{{ $plaza->Estado }}</td>
                <td>{{ $plaza->TipoPlaza }}</td>
                <td>{{ $plaza->Anio }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach

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
</div>
@endforeach

<script type="text/javascript">
    $(document).ready(function() {
        new DataTable('.table');
    });
</script>

@endsection

<style>
    .tablaRoles {
        padding: 50px;
    }
    table {
        box-shadow: 10px 5px 10px rgba(0, 0, 0, 0.5);
    }
    
    th {
        background-color: #426787!important;
        color: #f5f7fa!important;
        font-family: "Questrial", sans-serif;

    }
    .cabeceraTabla {
        font-size: 30px;
        font-weight: lighter;
      /* background-image: url(/Image/add_solid.svg);*/
        background-size: 30px;
        background-repeat: no-repeat;
        background-position: right 10px center;
        
    }

    .cabeceraDatos>th {
        background-color: #a6bed3!important;
        color: black!important;
        font-weight: bold;
        
    }
    .cabecera-tabla-link {
  display: flex;
  align-items: center;
  justify-content: flex-end;
}

.cabecera-tabla-link img {
  margin-left: auto;
}
    th {
        background-color: #a6bed3;
        
        color: black;
        font-weight: bold;
    }

    .table-striped>tbody>tr:nth-child(odd)>td {
        background-color: #d0dce7;
    }

    .enlaceCreateEmb {
        display: flex;
        width: 202px;
        height: 48px;
        flex-direction: column;
        justify-content: center;
        flex-shrink: 0;
        color: #fff;
        font-family: "Inter", sans-serif;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        text-decoration: none;
        background-color: #426787;
        text-align: center;
        font-family: "Inter", sans-serif;
        border-radius: 5px;
        background-image: url(/Image/add_solid.svg);
        background-size: 30px;
        background-repeat: no-repeat;
        background-position: left 10px center;
    }

    td {
        font-family: "Inter", sans-serif;
        font-size: 16px;
        font-style: normal;
        font-weight: normal;
        line-height: normal;
        text-decoration: none;
        color: #000000;
    }

    h2 {

        background-color: #426787!important;
        color: #f5f7fa!important;
        font-family: "Questrial", sans-serif;

        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        margin-top: 10px;
      /*background-image: url(/Image/add_solid.svg);*/
        background-size: 30px;
        background-repeat: no-repeat;
        background-position: right 10px center;
    }

    .container {
        background-color: #f5f7fa!important;
        margin-top: 0px;
    }

</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

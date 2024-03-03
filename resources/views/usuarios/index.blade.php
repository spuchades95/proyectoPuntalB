@extends('layouts.plantilla')
@section('title', 'Mostrar usuarios')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<div class="tablaRoles">
    <div class="d-flex flex-row-reverse mb-2"><a href="{{ route('usuarios.create') }}" class="enlaceCreateEmb">USUARIOS</a></div>
    <table id="example" class="table table-hover table-custom-hover rounded-3 overflow-hidden table-striped" style="width:100%">
        <thead>
            <tr>
                <th class="cabeceraTabla" colspan="10"> USUARIOS</th>
            </tr>
            <tr class="cabeceraDatos">
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Instalación</th>
                <th>Email</th>
                <th>Habilitado</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Perfil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $user)
            <tr data-id="{{ $user->id }}">
                <td>{{ $user->NombreUsuario }}</td>
                <td>{{ $user->NombreCompleto }}</td>
                <td>
                    @if(isset($Instalacion[$user->id]))
                    {{ $Instalacion[$user->id]->Ubicacion }}
                    @else
                    No se encontró instalación
                    @endif
                </td>
                <td>{{ $user->email }}</td>
                <td> {{ $user->Habilitado == 1 ? 'Habilitado' : 'Deshabilitado' }} </td>
                <td>{{ $user->Telefono }}</td>
                <td>{{ $user->Direccion }}</td>
                <td>
                    @if(isset($Roles[$user->id]))
                    {{ $Roles[$user->id]->NombreRol }}
                    @else
                    No se encontró rol
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example tbody').on('click', 'tr', function() {
            var userId = $(this).data('id');

            window.location.href = "{{ route('usuarios.show', ['usuario' => ':id']) }}".replace(':id', userId);
        });


        new DataTable('#example');
    });
</script>

<style>
    .tablaRoles {
        padding: 50px;
    }

    table {
        box-shadow: 10px 5px 10px rgba(0, 0, 0, 0.5);
    }

    th {
        background-color: #426787 !important;
        color: #f5f7fa !important;
        font-family: "Questrial", sans-serif;

    }

    .cabeceraTabla {
        font-size: 30px;
        font-weight: lighter;
    }

    .cabeceraDatos>th {
        background-color: #a6bed3 !important;
        color: black !important;
        font-weight: bold;
    }

    th {
        background-color: #a6bed3;
        ;
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
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

@endsection
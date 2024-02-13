@extends('layouts.plantilla')

@section('content')

<div class="tablaRoles">
     <table id="example" class="table table-hover table-custom-hover rounded-3 overflow-hidden table-striped" style="width:100%">
        <thead>
            <tr>
                     </tr>
            <tr class="cabeceraDatos">
                <th>Título</th>
                <th>Autor</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

      
        </tbody>
    </table>
</div>


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
    }

    .cabeceraDatos>th {
        background-color: #a6bed3!important;
        color: black!important;
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
        background-image: url(/assets/img/add_solid.svg);
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

@endsection
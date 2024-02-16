@extends('layouts.plantilla')

@section('content')
<div class="formularioRoles">
    <div class="formHeader">
        <h5>ALTA EMBARCACIÓN</h5>
    </div>
    <form action="{{ route('embarcaciones.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="Matricula" class="form-label">Matrícula</label>
            <input type="text" class="form-control" id="Matricula" name="Matricula" required>
        </div>
        <div class="mb-3">
            <label for="Manga" class="form-label">Manga</label>
            <input type="text" class="form-control" id="Manga" name="Manga" required>
        </div>
        <div class="mb-3">
            <label for="Eslora" class="form-label">Eslora</label>
            <input type="text" class="form-control" id="Eslora" name="Eslora" required>
        </div>
        <div class="mb-3">
            <label for="Origen" class="form-label">Origen</label>
            <input type="text" class="form-control" id="Origen" name="Origen" required>
        </div>
        <div class="mb-3">
            <label for="Titular" class="form-label">Titular</label>
            <input type="text" class="form-control" id="Titular" name="Titular" required>
        </div>
        <div class="mb-3">
            <label for="Imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="Imagen" name="Imagen">
        </div>
        <div class="mb-3">
            <label for="Numero_Registro" class="form-label

</div>

<style>
    .formHeader {
        padding: 6px;
        font-weight: bold;
        font-family: 'Questrial', sans-serif;
        color: #ffffff;
        background-color: #1d2834;
        border-radius: 5px 5px 0px 0px;
    }

    .formularioRoles {
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
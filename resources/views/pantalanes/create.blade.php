@extends('layouts.plantilla')
@section('title', 'Crear pantalán')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<div class="formularioRoles">
    <div class="formHeader">
        <h5>ALTA PANTALÁN</h5>
    </div>
    <form id="createForm" class="form-container" method="POST" action="{{ route('pantalanes.store') }}">
        @csrf
        <div class="mb-3 d-flex">
            <label for="Nombre" class="form-label">Nombre:</label>
            <input name="Nombre" type="text" class="form-control mt-4" placeholder="Nombre" required />
        </div>
        <div class="mb-3 d-flex">
            <label for="Ubicacion" class="form-label">Ubicación:</label>
            <input name="Ubicacion" type="text" class="form-control mt-4" placeholder="Ubicación" required />
        </div>
        <div class="mb-3 d-flex">
            <label for="Descripcion" class="form-label">Descripción:</label>
            <input name="Descripcion" type="text" class="form-control mt-4" placeholder="Descripción" required />
        </div>
        <div class="mb-3 d-flex">
            <label for="Capacidad" class="form-label">Capacidad:</label>
            <input name="Capacidad" type="text" class="form-control mt-4" placeholder="Capacidad" required />
        </div>
        <div class="mb-3 d-flex">
            <label for="FechaCreacion" class="form-label">Fecha de creación:</label>
            <input name="FechaCreacion" type="datetime" value="{{ now()->format('Y-m-d') }} " class="form-control mt-4" required />
        </div>
        <div class="mb-3 d-flex">

            <label for="Instalacion_id/ubicacion">Instalación</label>
            <input type="hidden" name="Instalacion_id" value="{{ $Instalacion_id }}" required>
            <input type="text" value="{{ $instalacion_ubicacion }}" class="form-control" readonly>
        </div>
        <div style='text-align:right' class='mt-4'>
            <button class="btn btnCancelar">CANCELAR</button>
            <button type="submit" class="btn btnAdd">CREAR</button>
        </div>
    </form>





</div>
@endsection



<style>
    .btnAdd {
        background-color: #3f2d85 !important;
        color: #f5f6fd !important;
        margin-left: 10px;
    }

    .btn {
        text-align: center;
        -webkit-text-stroke: 1.5px;
        font-family: Questrial;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .btnCancelar {
        text-decoration: none;
        background-color: #ffc745 !important;
        color: #7a2e0d !important;
    }

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
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    form {
        background-color: #ffffff;
        padding: 15px;
        border-radius: 0px 0px 5px 5px;
        box-shadow: 10px 5px 10px rgba(0, 0, 0, 0.5);
    }

    input[type="text"],
    input[type="date"],
    textarea {
        box-sizing: border-box;
        border: 1px solid #ccc;
        padding: 3px;
        font-size: 14px;
        line-height: 1.5;
        height: 28px;
        width: calc(100% - 75px);
    }

    .label-checkbox {
        font-weight: bold;
        display: inline-block;
        width: 200px;
        margin-right: 10px;
    }

    label {
        width: 200px;
        font-weight: bold;
    }
</style>
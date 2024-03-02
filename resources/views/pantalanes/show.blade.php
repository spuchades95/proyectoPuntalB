@extends('layouts.plantilla')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="formulario">
    <div class="formHeader">
        <h5>PANTALÁN {{ $pantalan->Nombre }} </h5>
    </div>
    <form class="form-container">
        <div class="mb-3 d-flex">
            <label for="Nombre" class="form-label">Nombre:</label>
            <input name="Nombre" type="text" class="form-control mt-4" value="{{ $pantalan->Nombre }}" readonly />
        </div>
        <div class="mb-3 d-flex">
            <label for="Ubicacion" class="form-label">Ubicación:</label>
            <input name="Ubicacion" type="text" class="form-control mt-4" value="{{ $pantalan->Ubicacion }}" readonly />
        </div>
        <div class="mb-3 d-flex">
            <label for="Descripcion" class="form-label">Descripción:</label>
            <textarea name="Descripcion" class="form-control mt-4" readonly>{{ $pantalan->Descripcion }}</textarea>
        </div>
        <div class="mb-3 d-flex">
            <label for="Capacidad" class="form-label">Capacidad:</label>
            <input name="Capacidad" type="text" class="form-control mt-4" value="{{ $pantalan->Capacidad }}" readonly />
        </div>
        <div class="mb-3 d-flex">
            <label for="FechaCreacion" class="form-label">Fecha de creación:</label>
            <input name="FechaCreacion" type="text" class="form-control mt-4" value="{{ $pantalan->FechaCreacion }}" readonly />
        </div>
    
        <!-- <div class="mb-3 d-flex">
            <label for="Instalacion" class="form-label">Instalación:</label>
            <input name="Instalacion" type="text" class="form-control mt-4" value="{{ $pantalan->Instalacion_id }}" readonly />
        </div> -->
        <div class="mb-3">
            <div style='text-align:right' class='mt-4'>

                <a href="{{ route('instalaciones.index') }}" class="btn btnDelete">VOLVER</a>

                <a href="{{ route('pantalanes.edit', $pantalan->id) }}" class="btn btnVista">EDITAR</a>
            </div>
        </div>
    </form>
</div>

<style>
  .btnVista {
    background-color: #add8e6 !important;
    color: #162f3b!important;
    margin-left: 10px;
}

.btn{
    text-align: center;
    -webkit-text-stroke: 1.5px ;
    font-family: Questrial;
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.btnDelete {
    text-decoration: none;
    background-color:#ffd700!important;
    color: #442604!important;
}

.formHeader {
    padding: 6px;
    font-weight: bold;
    font-family: 'Questrial', sans-serif;
    color: #ffffff;
    background-color: #1d2834;
    border-radius: 5px 5px 0px 0px;
}

.formulario {
    padding: 50px;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

form {
    background-color: #FFFFFF;
    padding: 15px;
    border-radius: 0px 0px 5px 5px;
    box-shadow: 10px 5px 10px rgba(0, 0, 0, 0.5);
}

input[type="text"],
textarea,
input[type="checkbox"] {
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

@endsection
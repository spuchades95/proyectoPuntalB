@extends('layouts.plantilla')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="formularioRoles">
    <div class="formHeader">
        <h5>PANTALÁN {{ $pantalan->Nombre }} </h5>
    </div>
    <form class="form-container" method="POST" action="{{ route('pantalanes.update', ['pantalane' => $pantalan->id]) }}">
        @csrf
        @method('PUT')
        <div class="mb-3 d-flex">
            <label for="Nombre" class="form-label">Nombre:</label>
            <input name="Nombre" type="text" class="form-control mt-4" placeholder="Nombre" value="{{ $pantalan->Nombre }}" required />
        </div>
        <div class="mb-3 d-flex">
            <label for="Ubicacion" class="form-label">Ubicación:</label>
            <input name="Ubicacion" type="text" class="form-control mt-4" placeholder="Ubicación" value="{{ $pantalan->Ubicacion }}" required />
        </div>
        <div class="mb-3 d-flex">
            <label for="Descripcion" class="form-label">Descripción:</label>
            <input name="Descripcion" type="text" class="form-control mt-4" placeholder="Descripción" value="{{ $pantalan->Descripcion }}" required />
        </div>
        <div class="mb-3 d-flex">
            <label for="Capacidad" class="form-label">Capacidad:</label>
            <input name="Capacidad" type="text" class="form-control mt-4" placeholder="Capacidad" value="{{ $pantalan->Capacidad }}" required />
        </div>
        <div class="mb-3 d-flex">
            <label for="FechaCreacion" class="form-label">Fecha de creación:</label>
            <input name="FechaCreacion" type="datetime" class="form-control mt-4" value="{{ $pantalan->FechaCreacion }}" required />
        </div>
        <!-- <div class="mb-3 d-flex">
            <label for="Instalacion_id" class="form-label">Instalación:</label>
            <input name="Instalacion_id" type="text" class="form-control mt-4" placeholder="ID de instalación" value="{{ $pantalan->Instalacion_id }}" required />
        </div> -->
        <div style='text-align:right' class='mt-4'>
            <button type="button" class="btn btnCancelar" data-toggle="modal" data-target="#myModal">
                ELIMINAR
            </button>
            <button type="submit" class="btn btnAdd">EDITAR</button>
        </div>
    </form>
</div>

<!-- Modal para confirmar la eliminación -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Cabecera del Modal -->
            <div class="modal-header">
                <h4 class="modal-title">BAJA DE PANTALÁN</h4>
            </div>
            <!-- Cuerpo del Modal -->
            <div class="modal-body">
                <div class="mb-3 d-flex">
                    <label for="NombrePantalan">Nombre del pantalán:</label>
                    <input name="NombrePantalan" type="text" class="form-control mt-4" placeholder="Ubicación del pantalán" value="{{ $pantalan->Nombre }}" readonly />
                </div>
                <div class="mb-3 d-flex">
                    <label for="Causa" class="form-label">Causa de la baja:</label>
                    <textarea name="Causa" class="form-control mt-4"></textarea>
                </div>
            </div>
            <!-- Pie del Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btnCancelar" data-dismiss="modal">CANCELAR</button>
                <form id="delete-form" action="{{ route('pantalanes.destroy', ['pantalane' => $pantalan->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btnAdd">ELIMINAR</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.btnAdd {
    background-color: #3f2d85!important;
    color: #f5f6fd!important;
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

.btnCancelar {
    text-decoration: none;
    background-color:#ffc745!important;
    color: #7a2e0d!important;
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

.modal-content {
    background-color: #F7F7F7;
    border: 1px solid #888;
    border-radius: 10px;
}

.modal-header {
    background-color: #1D2834;
    color: #fff;
    border-bottom: 1px solid #007bff;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.modal-footer {
    border-top: none;
}

.modal-footer .btn {
    border-radius: 5px;
}

label {
    width: 200px;
    font-weight: bold;
    text-align: left;
}

</style>

@endsection
@extends('layouts.plantilla')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="formularioRoles">
    <div class="formHeader">
        <h5>VISTA AMARRE {{ $amarre->Numero }}</h5>
    </div>
    <form class="form-container" method="POST" action="{{ route('amarres.update', ['amarre' => $amarre->id]) }}">
        @csrf
        @method('PUT')
        <div class="mb-3 d-flex">
            <label for="Numero" class="form-label">Numero del amarre:</label>
            <input name="Numero" type="text" class="form-control mt-4" value="{{ $amarre->Numero }}" readonly />
        </div>
        <div class="mb-3 d-flex">
            <label for="Estado" class="form-label">Estado:</label>
            <select name="Estado" id="Estado" class="form-control" required>
                <option value="">Selecciona un tipo de estado</option>
                <option value="Disponible" @if($amarre->Estado === 'Disponible') selected @endif>Disponible</option>
                <option value="Mantenimiento" @if($amarre->Estado === 'Mantenimiento') selected @endif>Mantenimiento</option>
                <option value="Ocupada" @if($amarre->Estado === 'Ocupada') selected @endif>Ocupada</option>
            </select>
        </div>
        <div class="mb-3 d-flex">
            <label for="TipoPlaza">Tipo de plaza</label>
            <select name="TipoPlaza" id="TipoPlaza" class="form-control" required>
                <option value="">Selecciona un tipo de plaza</option>
                <option value="Transito" @if($amarre->TipoPlaza === 'Transito') selected @endif>Tránsito</option>
                <option value="Plaza Base" @if($amarre->TipoPlaza === 'Plaza Base') selected @endif>Plaza Base</option>
                <option value="Undefined" @if($amarre->TipoPlaza === 'Undefined') selected @endif>Sin definir</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="Anio" class="form-label">Año de creacion del amarre:</label>
            <input name="Anio" type="text" class="form-control mt-4" value="{{ date('Y', strtotime($amarre->Anio)) }}" readonly />
        </div>
        <div class="form-group">
            <label for="Pantalan_id/nombre">Pantalán</label>
            <input type="text" value="{{ $pantalanNombre }}" class="form-control" readonly>
        </div>

        <div style='text-align:right' class='mt-4'>
            <button type="button" class="btn btnCancelar" data-toggle="modal" data-target="#myModal">
                ELIMINAR
            </button>
            <button type="submit" class="btn btnAdd">EDITAR</button>
        </div>
        </form>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">BAJA DE AMARRE </h4>
                </div>
                <form id="delete-form" action="{{ route('amarres.destroy', ['amarre' => $amarre->id]) }}" method="POST">
                <div class="modal-body">
                    <div class="mb-3 d-flex">
                        <label for="Numero"> Numero del amarre:</label>
                        <input name="Numero" type="text" class="form-control mt-4" placeholder="Numero del amarre " value="{{ $amarre->Numero }}" readonly />
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="Causa" class="form-label">Causa de la baja:</label>
                        <textarea id="Causa" name="Causa" class="form-control mt-4"> </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnCancelar" data-dismiss="modal">CANCELAR</button>
                   
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btnAdd">ELIMINAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
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
        background-color: #FFFFFF;
        padding: 15px;
        border-radius: 0px 0px 5px 5px;
        box-shadow: 10px 5px 10px rgba(0, 0, 0, 0.5);
    }

    .chec div {
        margin-bottom: 5px;
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

<link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">

@endsection
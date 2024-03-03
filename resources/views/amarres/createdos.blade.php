@extends('layouts.plantilla')
@section('title', 'Crear amarres')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="formularioRoles">
    <div class="formHeader">
        <h5>ALTA AMARRE</h5>
    </div>
    <form class="form-container" method="POST" action="{{ route('amarres.storedos') }}">
        @csrf
        <input type="hidden" name="Pantalan_id" value="{{ $Pantalan_id }}">
        <label for="cantidad">Cantidad de amarres a crear:</label>
        <input type="number" id="cantidad" name="cantidad" required min="1">

        <button type="submit" class="btn btnAdd">Crear Amarres</button>

    <button type="submit" class="btn btnAdd">Crear Amarres</button>
    <a href="{{ route('instalaciones.index') }}" class="btn btnCancelar">Ir a inicio</a>
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
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
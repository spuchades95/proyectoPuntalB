@extends('layouts.plantilla')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
<div class="formularioRoles">
    <div class="formHeader">
        <h5>VISTA AMARRE {{ $amarre->Numero }} </h5>
    </div>
    <form class="form-container">
        @csrf
        <div class="mb-3 d-flex">
            <label for="Numero" class="form-label">Numero del amarre:</label>
            <input name="Numero" type="text" class="form-control mt-4" " value=" {{ $amarre->Numero }}" readonly />
        </div>
        <div class="mb-3 d-flex">
            <label for="Estado" class="form-label">Estado:</label>
            <input name="Estado" type="text" class="form-control mt-4" " value=" {{ $amarre->Estado }}" readonly />
        </div>
        <div class="mb-3 d-flex">
            <label for="TipoPlaza" class="form-label">Tipo de amarre:</label>
            <input name="TipoPlaza" type="text" class="form-control mt-4" " value=" {{ $amarre->TipoPlaza }}" readonly />
        </div>
        <div class="mb-3">
            <label for="Anio" class="form-label">Año de creacion del amarre:</label>
            <input name="Anio" type="text" class="form-control mt-4" " value="{{ date('Y', strtotime($amarre->Anio)) }}" readonly />
        </div>
        <div class="form-group">
            <label for="Pantalan_id/nombre">Pantalán</label>
            <input type="text" value="{{ $pantalanNombre }}"" class="form-control" readonly >
        </div>
    
            <div style='text-align:right' class='mt-4'>
                <a href="{{ route('instalaciones.index') }}" class="btn btnDelete">VOLVER</a>

                <a href="{{ route('amarres.edit', $amarre->id) }}" class="btn btnVista">EDITAR</a>
            </div>
        </div>
    </form>
</div>
@endsection



<script type="text/javascript">


</script>

<style>
    .btnVista {
        background-color: #add8e6 !important;
        color: #162f3b !important;
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

    .btnDelete {
        text-decoration: none;
        background-color: #ffd700 !important;
        color: #442604 !important;
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
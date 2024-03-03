@extends('layouts.plantilla')
@section('title', 'Crear amarres')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="card p-5">
        <h2 class="mb-4 text-center">¿Quieres crear amarres para este pantalán?</h2>
        <div class="d-flex justify-content-center">

            <a href="{{ route('instalaciones.index') }}" class="btn btnCancelar btn-lg mr-3">No</a>
            <a href="{{ route('amarres.createdos') }}" class="btn btnAdd btn-lg">Sí</a>
        </div>
    </div>
</div>

@endsection

<style>
    .btn-lg {
        padding: 10px 20px;
        font-size: 20px;
        border-radius: 15px;
    }

    .btnAdd {
        background-color: #3f2d85 !important;
        color: #f5f6fd !important;
    }

    .btnCancelar {
        background-color: #ffc745 !important;
        color: #7a2e0d !important;
    }

    .card {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-size: 24px;
        font-weight: bold;
    }
</style>
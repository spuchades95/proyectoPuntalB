@extends('layouts.plantilla')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
<div class="formularioUsuarios">
    <div class="formHeader">
        <h5>{{ $usuario->NombreUsuario }}  </h5>
    </div>
    <form class="form-container">
        @csrf
        <div class=form-left>
            <div class="mb-3 d-flex">
                <label for="Usuario" class="form-label">Usuario:</label>
                <input name="Usuario" type="text" class="form-control mt-4" placeholder="Nombre del usuario " value="{{ $usuario->NombreUsuario }}" readonly />
            </div>
            <div class="mb-3 d-flex">
                <label for="NombreCompleto" class="form-label">Nombre completo:</label>
                <input name="NombreCompleto" type="text" class="form-control mt-4" placeholder="Nombre completo " value="{{ $usuario->NombreCompleto }}" readonly />
            </div>
            <div class="mb-3 d-flex">
                <label for="Dni" class="form-label">Dni:</label>
                <input name="Dni" type="text" class="form-control mt-4" placeholder="Dni " value="{{ $usuario->DNI }}" readonly />
            </div>
            <div class="mb-3 d-flex">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input name="telefono" type="text" class="form-control mt-4" placeholder="Teléfono " value="{{ $usuario->Telefono }}" readonly />
            </div>
            <div class="mb-3 d-flex">
                <label for="email" class="form-label">Email:</label>
                <input name="email" type="text" class="form-control mt-4" placeholder="Email " value="{{ $usuario->email }}" readonly />
            </div>
         


        </div>
      
        <div class=form-right>
        <div class="mb-3 d-flex">
                <label for="direccion" class="form-label">Dirección:</label>
                <input name="direccion" type="text" class="form-control mt-4" placeholder="Dirección" value="{{ $usuario->Direccion }}" readonly />
            </div>
            <div class="mb-3 d-flex">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input name="descripcion" type="text" class="form-control mt-4" placeholder="Descripción " value="{{ $usuario->Descripcion }}" readonly />
            </div>
            <div class="mb-3 d-flex">
                <label for="perfil" class="form-label">Perfil:</label>
                <input name="perfil" type="text" class="form-control mt-4" placeholder="Perfil " value="{{ $Roles->NombreRol }}" readonly />
            </div>
            <div class="mb-3 d-flex">
                <label for="instalacion" class="form-label">Instalaciones:</label>
                <input name="instalacion" type="text" class="form-control mt-4" placeholder="Instalaciones " value="{{ $Instalacion->Ubicacion }}" readonly />
            </div>

            <div class="mb-3 d-flex">
                <label for="habilitado" class="form-label">Habilitado:</label>
                <input name="Habilitado" type="text" class="form-control mt-4" placeholder="Habilitado " value="{{ $usuario->Habilitado == 1 ? 'Habilitado' : 'Deshabilitado' }}" readonly />
            </div>

            <div style='text-align:right' class=' botones mt-4'>
                <a href="{{ route('usuarios.index') }}" class="btn btnDelete">VOLVER</a>

                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btnVista">EDITAR</a>
            </div>
        </div>
    </form>
    </div>


    @endsection



    <script type="text/javascript">




    </script>

    <style>
        
       /*.botones {
        position: absolute;
        bottom:90px;
        right:60px;
        margin: 20px;
    }*/
        .form-container {

            width: 100%;
            height: 100%;
        }

        .form-left {
            float: left;
            margin-top: 10px;



        }

        .form-right {
            float: right;
            margin-right: 150px;
            margin-top: 10px;


        }

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


<<<<<<< HEAD
        .formHeader {
             padding: 6px;
=======
    .formHeader {
        padding: 6px;
>>>>>>> 658346a8e251b6bccbcb3475b5e6bdee72dffd09
        font-weight: bold;
        font-family: 'Questrial', sans-serif;
        color: #ffffff;
        background-color: #1d2834;
        border-radius: 5px 5px 0px 0px;
<<<<<<< HEAD
        }

        .formularioUsuarios {
            padding: 50px;
=======
    }

    .formularioRoles {
        padding: 50px;
>>>>>>> 658346a8e251b6bccbcb3475b5e6bdee72dffd09
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
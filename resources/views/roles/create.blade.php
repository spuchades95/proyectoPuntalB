@extends('layouts.plantilla')

@section('content')
<div class="formularioRoles">
    <div class="formHeader">
        <h5>ALTA ROL</h5>
    </div>
    <form class="form-container" method="POST" action="{{ route('roles.store') }}">
        @csrf
        <div class="mb-3 d-flex">
            <label for="NombreRol" class="form-label">Nombre del rol:</label>
            <input name="NombreRol" type="text" class="form-control mt-4" placeholder="Nombre del rol "required />
        </div>
        <div class="mb-3 d-flex">
            <label for="Descripcion" class="form-label">Descipcion:</label>
            <textarea name="Descripcion" class="form-control mt-4" placeholder="Descipcion"required> </textarea>
        </div>
        <div class="mb-3">
            <label for="Permisos" class="form-label">Permisos:</label>
            <div>
                <label class="label-checkbox" for="lectura">Lectura</label><br>
                <input type="checkbox" id="lectura" name="Permisos[]" value="lectura" required>

            </div>
            <div>
                <label class="label-checkbox" for="modificacion">Modificación</label><br>
                <input type="checkbox" id="modificacion" name="Permisos[]" value="modificacion">

            </div>
            <div>
                <label class="label-checkbox" for="eliminacion">Eliminación</label><br>
                <input type="checkbox" id="eliminacion" name="Permisos[]" value="eliminacion">

            </div>
            <div style='text-align:right' class='mt-4'>
                <button class="btn btnCancelar"> CANCELAR </button>
                <button type="submit" class="btn btnAdd">AÑADIR</button>
            </div>
        </div>
    </form>
</div>
    @endsection
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
    </style><link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">

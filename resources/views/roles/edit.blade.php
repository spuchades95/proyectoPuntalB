@extends('layouts.plantilla')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="formularioRoles">
    <div class="formHeader">
        <h5>VISTA ROL {{ $rol->NombreRol }} </h5>
    </div>
    <form class="form-container" method="POST" action="{{ route('roles.update', ['role' => $rol->id])}}">
        @csrf
        @method('PUT')
        <div class="mb-3 d-flex">
            <label for="NombreRol" class="form-label">Nombre del rol:</label>
            <input name="NombreRol" type="text" class="form-control mt-4" placeholder="Nombre del rol " value="{{ $rol->NombreRol }}" />
        </div>
        <div class="mb-3 d-flex">
            <label for="Descripcion" class="form-label">Descipcion:</label>
            <textarea name="Descripcion" class="form-control mt-4"> {{ $rol->Descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label for="Permisos" class="form-label">Permisos:</label>
            <div>
                <label class="label-checkbox" for="lectura">Lectura</label><br>
                <input type="checkbox" id="lectura" name="Permisos[]" value="lectura" @if(in_array('lectura', $permisosSeleccionados)) checked @endif>
            </div>
            <div>
                <label class="label-checkbox" for="modificacion">Modificación</label><br>
                <input type="checkbox" id="modificacion" name="Permisos[]" value="modificacion" @if(in_array('modificacion', $permisosSeleccionados)) checked @endif>
            </div>
            <div>
                <label class="label-checkbox" for="eliminacion">Eliminación</label><br>
                <input type="checkbox" id="eliminacion" name="Permisos[]" value="eliminacion" @if(in_array('eliminacion', $permisosSeleccionados)) checked @endif>
            </div>
            <div style='text-align:right' class='mt-4'>
                <button type="button" class="btn btnCancelar" data-toggle="modal" data-target="#myModal">
                   ELIMINAR
                </button>

                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Cabecera del Modal -->
                            <div class="modal-header">
                                <h4 class="modal-title">BAJA DE ROL </h4>
                            </div>

                            <!-- Cuerpo del Modal -->
                            <div class="modal-body">
                                <div class="mb-3 d-flex">
                                    <label for="NombreRol">Nombre del rol:</label>
                                    <input name="NombreRol" type="text" class="form-control mt-4" placeholder="Nombre del rol " value="{{ $rol->NombreRol }} " readonly />


                                </div>

                                <div class="mb-3 d-flex">
                                    <label for="Causa" class="form-label">Causa de la baja:</label>
                                    <textarea name="Causa" class="form-control mt-4" > </textarea>
                                </div>

                            </div>

                            <!-- Pie del Modal -->
                            <div class="modal-footer">
                        
                            

                            <button type="button" class="btn btnCancelar" data-dismiss="modal">CANCELAR</button>
                <form id="delete-form" action="{{ route('roles.destroy', ['role' => $rol->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btnAdd">ELIMINAR</button>
                </form>
                        
                        
                        
                        
                        </div>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btnAdd">EDITAR</button>
            </div>
        </div>
    </form>
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
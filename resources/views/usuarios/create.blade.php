@extends('layouts.plantilla')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="formularioRoles">
    <div class="formHeader">
        <h5>ALTA USUARIO</h5>
    </div>
    <form class="form-container" method="POST" >
        <div class="form-left" >
        @csrf
        <div class="mb-3 d-flex">
            <label for="Usuario" class="form-label">Usuario:</label>
            <input name="Usuario" type="text" class="form-control mt-4" placeholder="Nombre Usuario "required />
        </div>
        <div class="mb-3 d-flex">
            <label for="NombreCompleto" class="form-label">Nombre Completo:</label>
            <input type="text" name="NombreCompleto" class="form-control mt-4" placeholder="Nombre Completo"required> </input>
        </div>
        
        <div class="mb-3 d-flex">
            <label for="Dni" class="form-label">Dni:</label>
            <input name="Dni" type="text"  class="form-control mt-4" placeholder="Dni"required> </input>
        </div>
        <div class="mb-3 d-flex">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input name="telefono" type="text"  class="form-control mt-4" placeholder="telefono"required> </input>
        </div>
        <div class="mb-3 d-flex">
            <label for="email" class="form-label">Email:</label>
            <input name="email" type="text"  class="form-control mt-4" placeholder="email"required> </input>
        </div>
        <div class="mb-3 d-flex">
            <label for="direccion" class="form-label">Dirección:</label>
            <input name="direccion" type="text"  class="form-control mt-4" placeholder="direccion"required> </input>
        </div>
        <div class="mb-3 d-flex">
            <label for="contraseña" class="form-label">Contraseña:</label>
            <input name="contraseña" type="text"  class="form-control mt-4" placeholder="contraseña"required> </input>
        </div>
        <div class="mb-3 d-flex">
            <label for="confirmarContraseña" class="form-label">Confirmar contraseña:</label>
            <input name="confirmarContraseña" type="text"  class="form-control mt-4" placeholder="confirmar contraseña"required> </input>
        </div>
        </div>
       
   <div class=form-right >
        <div class="mb-3 d-flex">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input name="descripcion" type="text"  class="form-control mt-4" placeholder="descripcion"required> </input>
        </div>
        <div class="mb-3 d-flex">
            <label for="perfil" class="form-label">Perfil:</label>
            <input name="perfil" type="text"  class="form-control mt-4" placeholder="perfil"required> </input>
        </div>
        <div class="mb-3 d-flex">
            <label for="instalacion" class="form-label">Instalaciones:</label>
            <input name="instalacion" type="text"  class="form-control mt-4" placeholder="instalacion"required> </input>
        </div>
        
            <div style='text-align:right' class=' botones mt-4'>
                <button class="btn btnCancelar"> CANCELAR </button>
                <button type="submit" class="btn btnAdd">AÑADIR</button>
            </div>
       
    </div>
    
    </div>
    </form>
</div>
    @endsection
    <style>

.botones
    {
        text-align: right;
        position: relative;   
        
        left:200px;
        top:200px;
     }
    .form-container
    {

        width:100%;
        height: 100%;
    }
  .form-left {
    float: left;
    margin-top:10px;
   
  
    
}

.form-right {
    float: right;
    margin-right:150px;
    margin-top:10px;
   
    
}
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

@extends('layouts.plantilla')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="formularioUsuario">
    <div class="formHeader">
        <h5>EDITAR USUARIO</h5>
    </div>

    <form class="form-container" method="POST" action="{{ route('usuarios.update', ['usuario' => $usuario->id]) }}">
        @csrf
        @method('PUT')
        
        <div class="row">
            <!-- Formulario izquierdo -->
            <div class="col-md-6">
                <div class="form-left">
                    <div class="mb-3 d-flex">
                        <label for="Usuario" class="form-label">Nombre Usuario:</label>
                        <input name="NombreUsuario" type="text" class="form-control mt-4" placeholder="Nombre Usuario" value="{{ $usuario->NombreUsuario }}" />
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="NombreCompleto" class="form-label">Descripción:</label>
                        <input name="NombreCompleto" type="text" class="form-control mt-4" placeholder="Descripción" value="{{ $usuario->NombreCompleto }}" />
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="DNI" class="form-label">DNI:</label>
                        <input name="DNI" type="text" class="form-control mt-4" placeholder="DNI" value="{{ $usuario->DNI }}" />
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="Telefono" class="form-label">Teléfono:</label>
                        <input name="Telefono" type="text" class="form-control mt-4" placeholder="Teléfono" value="{{ $usuario->Telefono }}" />
                    </div>
                </div>
            </div>
            
            <!-- Formulario derecho -->
            <div class="col-md-6">
                <div class="form-right">
                    <div class="mb-3 d-flex">
                        <label for="Email" class="form-label">Email:</label>
                        <input name="email" type="text" class="form-control mt-4" placeholder="Email" value="{{ $usuario->email }}" />
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="Direccion" class="form-label">Dirección:</label>
                        <input name="Direccion" type="text" class="form-control mt-4" placeholder="Dirección" value="{{ $usuario->Direccion }}" />
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input name="password" type="text" class="form-control mt-4" placeholder="Contraseña" value="{{ $usuario->password }}" />
                    </div>
                   
                    <div class="mb-3 d-flex">
                        <label for="Descripcion" class="form-label">Descripción:</label>
                        <input name="Descripcion" type="text" class="form-control mt-4" placeholder="Descripción" value="{{ $usuario->Descripcion }}" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Selector de perfil -->
        <div class="mb-3 d-flex">
            <label for="perfil" class="form-label">Perfil:</label>
            <select name="Rol_id" class="form-control mt-4" required>
                @foreach($Roles as $roles)
                    <option value="{{ $roles->id }}">{{ $roles->NombreRol }}</option>
                @endforeach  
            </select>      
        </div>
        
        <!-- Selector de instalaciones -->
        <div class="mb-3 d-flex">
            <label for="instalacion" class="form-label">Instalaciones:</label>
            <select name="Instalacion_id" class="form-control mt-4" required>
                @foreach($Instalacion as $instalacion)
                    <option value="{{ $instalacion->id }}">{{ $instalacion->Ubicacion }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 d-flex">
            <label for="habilitado" class="form-label">Habilitado:</label>
            <select name="Habilitado" class="form-control mt-4" required>
                
            <option value="1" {{ $usuario->Habilitado == 1 ? 'selected' : '' }}>Habilitado</option>
        <option value="0" {{ $usuario->Habilitado == 0 ? 'selected' : '' }}>Deshabilitado</option>
                
            </select>        </div>
        
        <!-- Botones -->
        <div class="mt-3 d-flex">
            <button type="button" class="btn btnCancelar" data-toggle="modal" data-target="#myModal">ELIMINAR</button>
            <!-- Modal de eliminación -->
            <div class="modal" id="myModal">
                <!-- Contenido del modal -->
            </div>
            <button type="submit" class="btn btnAdd">EDITAR</button>
        </div>
    </form>
</div>

<style>
.botones
    {
        text-align: right;
        position: absolute;   
        
        right:100px;
        top:800px;
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
</style>


@endsection

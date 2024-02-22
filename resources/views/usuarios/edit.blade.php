<form action="{{route('usuarios.update', ['usuario'=>$usuario->id])}}" method="POST">

    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="Nombre">Nombre Completo</label>
        <input type="text" name="NombreCompleto" id="NombreCompleto" class="form-control" value="{{$usuario->NombreCompleto}}" required>
    </div>
    <div class="form-group">
        <label for="Habilitado">Habilitado</label>
        <input type="text" name="Habilitado" id="Habilitado" class="form-control" value="{{$usuario->Habilitado}}" required>
    </div>
    <div class="form-group">
        <label for="NombreUsuario">Nombre usuario</label>
        <input type="text" name="NombreUsuario" id="NombreUsuario" class="form-control" value="{{$usuario->NombreUsuario}}" required>
    </div>
    <div class="form-group">
        <label for="Instalacion_id">Instalación</label>
        <input type="text" name="Instalacion_id" id="Instalacion_id" class="form-control" value="{{$usuario->Instalacion_id}}" required>
    </div>
    <div class="form-group">
        <label for="DNI">DNI</label>
        <input type="text" name="DNI" id="DNI" class="form-control" value="{{$usuario->DNI}}" required>
    </div>
    <div class="form-group">
        <label for="Telefono">Telefono</label>
        <input type="text" name="Telefono" id="Telefono" class="form-control" value="{{$usuario->Telefono}}" required>
    </div>
    <div class="form-group">
        <label for="Direccion">Dirección</label>
        <input type="text" name="Direccion" id="Direccion" class="form-control" value="{{$usuario->Direccion}}" required>
    </div>
    <div class="form-group">
        <label for="Imagen">Imagen</label>
        <input type="file" name="Imagen" id="Imagen" class="form-control">
    </div>
    <div class="form-group">
        <label for="Descripcion">Descripción</label>
        <input type="text" name="Descripcion" id="Descripcion" class="form-control" value="{{$usuario->Descripcion}}" required>
    </div>
    <div class="form-group">
        <label for="Rol">Rol</label>
        <input type="text" name="Rol" id="Rol" class="form-control" value="{{$usuario->Rol_id}}" required>
    </div>
    <div class="form-group">
        <label for="Causa">Causa</label>
        <input type="text" name="Causa" id="Causa" class="form-control" value="{{$usuario->Causa}}">
    </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="text" name="email" id="Email" class="form-control" value="{{$usuario->email}}" required>
    </div>
    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" name="password" id="Password" class="form-control" required>
        <!-- <input type="password" name="password" id="Password" class="form-control" value="{{$usuario->password}}" required> //Viene --> 
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

<a href="{{ route('usuarios.index') }}">Volver</a>
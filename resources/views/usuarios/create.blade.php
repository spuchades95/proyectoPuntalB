<form action="{{route('usuarios.store')}}" method="POST">

    @csrf
    <div class="form-group">
        <label for="Nombre">Nombre Completo</label>
        <input type="text" name="NombreCompleto" id="NombreCompleto" class="form-control" required>
        @error('NombreCompleto')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Habilitado">Habilitado</label>
        <input type="text" name="Habilitado" id="Habilitado" class="form-control" required>
        @error('Habilitado')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="NombreUsuario">Nombre usuario</label>
        <input type="text" name="NombreUsuario" id="NombreUsuario" class="form-control" required>
        @error('NombreUsuario')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Instalacion_id">Instalación</label>
        <input type="text" name="Instalacion_id" id="Instalacion_id" class="form-control" required>
        @error('Instalacion_id')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="DNI">DNI</label>
        <input type="text" name="DNI" id="DNI" class="form-control" required>
        @error('DNI')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Telefono">Telefono</label>
        <input type="text" name="Telefono" id="Telefono" class="form-control" required>
        @error('Telefono')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Direccion">Dirección</label>
        <input type="text" name="Direccion" id="Direccion" class="form-control" required>
        @error('Direccion')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Imagen">Imagen</label>
        <input type="file" name="Imagen" id="Imagen" class="form-control">
        @error('Imagen')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Descripcion">Descripción</label>
        <input type="text" name="Descripcion" id="Descripcion" class="form-control" required>
        @error('Descripcion')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Rol">Rol</label>
        <input type="text" name="Rol_id" id="Rol" class="form-control" required>
        @error('Rol')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Causa">Causa</label>
        <input type="text" name="Causa" id="Causa" class="form-control">
        @error('Causa')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Email">Email</label>
        <input type="text" name="email" id="Email" class="form-control" required>
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group">
        <label for="Password">Password</label>
        <input type="password" name="password" id="Password" class="form-control" required>
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>
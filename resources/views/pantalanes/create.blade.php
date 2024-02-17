<form action="{{route('pantalanes.store')}}" method="POST">

    @csrf
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Ubicacion">Ubicación</label>
        <input type="text" name="Ubicacion" id="Ubicacion" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Descripcion">Descripción</label>
        <input type="text" name="Descripcion" id="Descripcion" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Capacidad">Capacidad</label>
        <input type="text" name="Capacidad" id="Capacidad" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="FechaCreacion">Fecha de creación</label>
        <input type="date" name="FechaCreacion" id="FechaCreacion" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Causa">Causa</label>
        <input type="text" name="Causa" id="Causa" class="form-control">
    </div>
    <div class="form-group">
        <label for="Instalacion_id">Instalación</label>
        <input type="text" name="Instalacion_id" id="Instalacion_id" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

<a href="{{ route('pantalanes.index') }}">Volver</a>
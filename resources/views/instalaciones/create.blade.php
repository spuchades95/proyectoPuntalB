<form action="{{route('instalaciones.store')}}" method="POST">

    @csrf
    <div class="form-group">
        <label for="Ubicacion">Ubicación</label>
        <input type="text" name="Ubicacion" id="Ubicacion" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Dimensiones">Dimensiones</label>
        <input type="text" name="Dimensiones" id="Dimensiones" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Descripcion">Descripción</label>
        <input type="text" name="Descripcion" id="Descripcion" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Estado">Estado</label>
        <input type="text" name="Estado" id="Estado" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="FechaCreacion">Fecha de creación</label>
        <input type="date" name="FechaCreacion" id="FechaCreacion" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Causa">Causa</label>
        <input type="text" name="Causa" id="Causa" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

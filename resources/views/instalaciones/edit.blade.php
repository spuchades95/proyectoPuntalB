<form action="{{route('instalaciones.update', ['instalacione'=>$instalacion->id])}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="Ubicacion">Ubicación</label>
        <input type="text" name="Ubicacion" id="Ubicacion" class="form-control" value="{{$instalacion->Ubicacion}}" required>
    </div>
    <div class="form-group">
        <label for="Dimensiones">Dimensiones</label>
        <input type="text" name="Dimensiones" id="Dimensiones" class="form-control" value="{{$instalacion->Dimensiones}}" required>
    </div>
    <div class="form-group">
        <label for="Descripcion">Descripción</label>
        <input type="text" name="Descripcion" id="Descripcion" class="form-control" value="{{$instalacion->Descripcion}}" required>
    </div>
    <div class="form-group">
        <label for="Estado">Estado</label>
        <input type="text" name="Estado" id="Estado" class="form-control" value="{{$instalacion->Estado}}" required>
    </div>
    <div class="form-group">
        <label for="FechaCreacion">Fecha de creación</label>
        <input type="date" name="FechaCreacion" id="FechaCreacion" class="form-control" value="{{$instalacion->FechaCreacion}}" required>
    </div>
    <div class="form-group">
        <label for="Causa">Causa</label>
        <input type="text" name="Causa" id="Causa" class="form-control" value="{{$instalacion->Causa}}">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
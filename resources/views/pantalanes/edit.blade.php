<form action="{{route('pantalanes.update', ['pantalane'=>$pantalan->id])}}" method="POST">

    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{$pantalan->Nombre}}" required>
    </div>
    <div class="form-group">
        <label for="Ubicacion">Ubicación</label>
        <input type="text" name="Ubicacion" id="Ubicacion" class="form-control" value="{{$pantalan->Ubicacion}}" required>
    </div>
    <div class="form-group">
        <label for="Descripcion">Descripción</label>
        <input type="text" name="Descripcion" id="Descripcion" class="form-control" value="{{$pantalan->Descripcion}}" required>
    </div>
    <div class="form-group">
        <label for="Capacidad">Capacidad</label>
        <input type="text" name="Capacidad" id="Capacidad" class="form-control" value="{{$pantalan->Capacidad}}" required>
    </div>
    <div class="form-group">
        <label for="FechaCreacion">Fecha de creación</label>
        <input type="date" name="FechaCreacion" id="FechaCreacion" class="form-control" value="{{$pantalan->FechaCreacion}}" required>
    </div>
    <div class="form-group">
        <label for="Causa">Causa</label>
        <input type="text" name="Causa" id="Causa" class="form-control" value="{{$pantalan->Causa}}">
    </div>
    <div class="form-group">
        <label for="Instalacion_id">Instalación</label>
        <input type="text" name="Instalacion_id" id="Instalacion_id" class="form-control" value="{{$pantalan->Instalacion_id}}" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>

</form>
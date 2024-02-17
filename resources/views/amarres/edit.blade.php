<form action="{{route("amarres.update", ['amarre'=>$amarre->id])}}" method="POST">

    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="Numero">Número</label>
        <input type="number" name="Numero" id="Numero" class="form-control" value="{{$amarre->Numero}}" required>
    </div>
    <div class="form-group">
        <label for="Estado">Estado</label>
        <input type="text" name="Estado" id="Estado" class="form-control" value="{{$amarre->Estado}}" required>
    </div>
    <div class="form-group">
        <label for="TipoPlaza">Tipo de plaza</label>
        <input type="text" name="TipoPlaza" id="TipoPlaza" class="form-control" value="{{$amarre->TipoPlaza}}" required>
    </div>
    <div class="form-group">
        <label for="Anio">Año</label>
        <input type="datetime-local" name="Anio" id="Anio" class="form-control" value="{{$amarre->Anio}}" required>
    </div>
    <div class="form-group">
        <label for="Causa">Causa</label>
        <input type="text" name="Causa" id="Causa" class="form-control" value="{{$amarre->Causa}}">
    </div>
    <div class="form-group">
        <label for="Pantalan_id">Pantalán</label>
        <input type="text" name="Pantalan_id" id="Pantalan_id" class="form-control" value="{{$amarre->Pantalan_id}}" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
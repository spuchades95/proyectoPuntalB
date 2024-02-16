<form action="{{route('amarres.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="Numero">Número</label>
        <input type="number" name="Numero" id="Numero" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Estado">Estado</label>
        <input type="text" name="Estado" id="Estado" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="TipoPlaza">Tipo de plaza</label>
        <input type="text" name="TipoPlaza" id="TipoPlaza" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Anio">Año</label>
        <input type="datetime-local" name="Anio" id="Anio" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Causa">Causa</label>
        <input type="text" name="Causa" id="Causa" class="form-control">
    </div>
    <div class="form-group">
        <label for="Pantalan_id">Pantalán</label>
        <input type="text" name="Pantalan_id" id="Pantalan_id" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>

</form>
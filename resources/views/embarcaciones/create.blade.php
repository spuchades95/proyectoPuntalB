<form action="{{route('embarcaciones.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="Matricula">Matrícula</label>
        <input type="text" name="Matricula" id="Matricula" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Manga">Manga</label>
        <input type="text" name="Manga" id="Manga" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Eslora">Eslora</label>
        <input type="text" name="Eslora" id="Eslora" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Origen">Origen</label>
        <input type="text" name="Origen" id="Origen" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Titular">Titular</label>
        <input type="text" name="Titular" id="Titular" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Imagen">Imagen</label>
        <input type="file" name="Imagen" id="Imagen" class="form-control">
    </div>
    <div class="form-group">
        <label for="Numero_Registro">Número de registro</label>
        <input type="text" name="Numero_Registro" id="Numero_Registro" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Datos_tecnicos">Datos técnicos</label>
        <input type="text" name="Datos_tecnicos" id="Datos_tecnicos" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Modelo">Modelo</label>
        <input type="text" name="Modelo" id="Modelo" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="Causa">Causa</label>
        <input type="text" name="Causa" id="Causa" class="form-control">
    </div>
    <div class="form-group">
        <label for="Tipo">Tipo</label>
        <input type="text" name="Tipo" id="Tipo" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

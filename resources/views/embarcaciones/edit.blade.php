<form action="{{route('embarcaciones.update', ['embarcacione'=>$embarcacion->id])}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="Matricula">Matrícula</label>
        <input type="text" name="Matricula" id="Matricula" class="form-control" value="{{$embarcacion->Matricula}}" required>
    </div>
    <div class="form-group">
        <label for="Manga">Manga</label>
        <input type="text" name="Manga" id="Manga" class="form-control" value="{{$embarcacion->Manga}}" required>
    </div>
    <div class="form-group">
        <label for="Eslora">Eslora</label>
        <input type="text" name="Eslora" id="Eslora" class="form-control" value="{{$embarcacion->Eslora}}" required>
    </div>
    <div class="form-group">
        <label for="Origen">Origen</label>
        <input type="text" name="Origen" id="Origen" class="form-control" value="{{$embarcacion->Origen}}" required>
    </div>
    <div class="form-group">
        <label for="Titular">Titular</label>
        <input type="text" name="Titular" id="Titular" class="form-control" value="{{$embarcacion->Titular}}" required>
    </div>
    <div class="form-group">
        <label for="Imagen">Imagen</label>
        <input type="file" name="Imagen" id="Imagen" class="form-control">
    </div>
    <div class="form-group">
        <label for="Numero_Registro">Número de registro</label>
        <input type="text" name="Numero_Registro" id="Numero_Registro" class="form-control" value="{{$embarcacion->Numero_Registro}}" required>
    </div>

    <div class="form-group">
        <label for="Datos_tecnicos">Datos técnicos</label>
        <input type="text" name="Datos_tecnicos" id="Datos_tecnicos" class="form-control" value="{{$embarcacion->Datos_tecnicos}}" required>
    </div>
    <div class="form-group">
        <label for="Modelo">Modelo</label>
        <input type="text" name="Modelo" id="Modelo" class="form-control" value="{{$embarcacion->Modelo}}" required>
    </div>
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{$embarcacion->Nombre}}" required>
    </div>
    <div class="form-group">
        <label for="Causa">Causa</label>
        <input type="text" name="Causa" id="Causa" class="form-control" value="{{$embarcacion->Causa}}">
    </div>
    <div class="form-group">
        <label for="Tipo">Tipo</label>
        <input type="text" name="Tipo" id="Tipo" class="form-control" value="{{$embarcacion->Tipo}}" required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>


</form>
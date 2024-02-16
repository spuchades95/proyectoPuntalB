<h1>Amarres</h1>
<a href="{{ route('amarres.create') }}">Crear Amarre</a>
<table>
    <thead>
        <tr>
            <th class="cabeceraTabla" colspan="2">Amarres</th>
        </tr>
        <tr class="cabeceraDatos">
            <th>Número</th>
            <th>Estado</th>
            <th>Tipo de plaza</th>
            <th>Año</th>
            <th>Causa</th>
            <th>Pantalán</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($amarres as $amarre)
        <tr>
            <td>{{$amarre->Numero}}</td>
            <td>{{$amarre->Estado}}</td>
            <td>{{$amarre->TipoPlaza}}</td>
            <td>{{$amarre->Anio}}</td>
            <td>{{$amarre->Causa}}</td>
            <td>{{$amarre->Pantalan_id}}</td>
            <td>
                <a href="{{ route('amarres.show', $amarre->id) }}">Ver</a>
                <a href="{{ route('amarres.edit', $amarre->id) }}">Editar</a>
                <form action="{{ route('amarres.destroy', $amarre->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Borrar</button>
                </form>
        </tr>
        @endforeach
    </tbody>
</table>
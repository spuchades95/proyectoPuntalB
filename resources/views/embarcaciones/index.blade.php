<h1>INDEX EMBARCACIONES</h1>
<a href="{{ route('embarcaciones.create') }}">Crear Embarcación</a>
<table>
    <thead>
        <tr>
            
            <th>Matrícula</th>
            <th>Manga</th>
            <th>Eslora</th>
            <th>Origen</th>
            <th>Titular</th>
            <th>Imagen</th>
            <th>Número de registro</th>
            <th>Datos técnicos</th>
            <th>Modelo</th>
            <th>Nombre</th>
            <th>Causa</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($embarcaciones as $embarcacion)
            <tr>
                <td>{{ $embarcacion->Matricula }}</td>
                <td>{{ $embarcacion->Manga }}</td>
                <td>{{ $embarcacion->Eslora }}</td>
                <td>{{ $embarcacion->Origen }}</td>
                <td>{{ $embarcacion->Titular }}</td>
                <td>{{ $embarcacion->Imagen }}</td>
                <td>{{ $embarcacion->Numero_Registro }}</td>
                <td>{{ $embarcacion->Datos_tecnicos }}</td>
                <td>{{ $embarcacion->Modelo }}</td>
                <td>{{ $embarcacion->Nombre }}</td>
                <td>{{ $embarcacion->Causa }}</td>
                <td>{{ $embarcacion->Tipo }}</td>
                <td><a href="{{ route('embarcaciones.show', $embarcacion->id) }}">Ver</a></td>
                <td><a href="{{ route('embarcaciones.edit', $embarcacion->id) }}">Editar</a></td>
                <td>
                    <form action="{{ route('embarcaciones.destroy', $embarcacion->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Borrar</button>
                    </form>
            </tr>
        @endforeach
    </tbody>
    

</table>
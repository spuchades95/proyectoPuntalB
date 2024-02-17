<table>
    <tr>
        <th>Ubicación</th>
        <td>{{ $instalacion->Ubicacion }}</td>
    </tr>
    <tr>
        <th>Dimensiones</th>
        <td>{{ $instalacion->Dimensiones }}</td>
    </tr>
    <tr>
        <th>Descripción</th>
        <td>{{ $instalacion->Descripcion }}</td>
    </tr>
    <tr>
        <th>Estado</th>
        <td>{{ $instalacion->Estado }}</td>
    </tr>
    <tr>
        <th>Fecha de creación</th>
        <td>{{ $instalacion->FechaCreacion }}</td>
    </tr>
    <tr>
        <th>Causa</th>
        <td>{{ $instalacion->Causa }}</td>
    </tr>
    <tr>
        <th>Acciones</th>
        <td>
            <a href="{{ route('instalaciones.edit', $instalacion->id) }}">Editar</a>
            <form action="{{ route('instalaciones.destroy', $instalacion->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </td>
    </tr>
</table>
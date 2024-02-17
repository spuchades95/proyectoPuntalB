<h1>INSTALACIONES</h1>
<a href="{{ route('instalaciones.create') }}">Crear nueva instalación</a>
<table>
    <tr>
        <th>Ubicación</th>
        <th>Dimensiones</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Fecha de creación</th>
        <th>Causa</th>
        <th>Acciones</th>
    </tr>
    @foreach($instalaciones as $instalacion)
    <tr>
        <td>{{ $instalacion->Ubicacion }}</td>
        <td>{{ $instalacion->Dimensiones }}</td>
        <td>{{ $instalacion->Descripcion }}</td>
        <td>{{ $instalacion->Estado }}</td>
        <td>{{ $instalacion->FechaCreacion }}</td>
        <td>{{ $instalacion->Causa }}</td>
        
        <td>
            <a href="{{ route('instalaciones.show', $instalacion->id) }}">Ver</a>
            <a href="{{ route('instalaciones.edit', $instalacion->id) }}">Editar</a>
            <form action="{{ route('instalaciones.destroy', $instalacion->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach

<h1>PANTALANES</h1>
<a href="{{ route('pantalanes.create') }}">Crear nuevo pantalan</a>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Ubicación</th>
            <th>Descripción</th>
            <th>Capacidad</th>
            <th>Fecha de creación</th>
            <th>Causa</th>
            <th>Instalación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pantalanes as $pantalan)
            <tr>
                <td>{{ $pantalan->Nombre }}</td>
                <td>{{ $pantalan->Ubicacion }}</td>
                <td>{{ $pantalan->Descripcion }}</td>
                <td>{{ $pantalan->Capacidad }}</td>
                <td>{{ $pantalan->FechaCreacion }}</td>
                <td>{{ $pantalan->Causa }}</td>
                <td>{{ $pantalan->Instalacion_id }}</td>
                <td>
                    <a href="{{ route('pantalanes.show', $pantalan->id) }}">Ver</a>
                    <a href="{{ route('pantalanes.edit', $pantalan->id) }}">Editar</a>
                    <form action="{{ route('pantalanes.destroy', $pantalan->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
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
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $pantalan->Nombre }}</td>
            <td>{{ $pantalan->Ubicacion }}</td>
            <td>{{ $pantalan->Descripcion }}</td>
            <td>{{ $pantalan->Capacidad }}</td>
            <td>{{ $pantalan->FechaCreacion }}</td>
            <td>{{ $pantalan->Causa }}</td>
            <td>{{ $pantalan->Instalacion_id }}</td>
        </tr>
    </tbody>
</table>
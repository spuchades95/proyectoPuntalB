<h1>USUARIOS</h1>
<a href="{{ route('usuarios.create') }}">Crear Usuario</a>

<table>
    <thead>
        <tr>

            <th>Nombre Completo</th>
            <th>Habilitado</th>
            <th>Nombre usuario</th>
            <th>Instalación</th>
            <th>DNI</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th>Imagen</th>
            <th>Descripción</th>
            <th>Rol</th>
            <th>Causa</th>
            <th>Email</th>

            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->NombreCompleto }}</td>
            <td>{{ $usuario->Habilitado }}</td>
            <td>{{ $usuario->NombreUsuario }}</td>
            <td>{{ $usuario->Instalacion_id }}</td>
            <td>{{ $usuario->DNI }}</td>
            <td>{{ $usuario->Telefono }}</td>
            <td>{{ $usuario->Direccion }}</td>
            <td>{{ $usuario->Imagen }}</td>
            <td>{{ $usuario->Descripcion }}</td>
            <td>{{ $usuario->Rol_id }}</td>
            <td>{{ $usuario->Causa }}</td>
            <td>{{ $usuario->email }}</td>

            <td><a href="{{ route('usuarios.show', $usuario->id) }}">Ver</a></td>
            <td><a href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a></td>
            <td>
                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Borrar</button>
                </form>
        </tr>
        @endforeach
    </tbody>
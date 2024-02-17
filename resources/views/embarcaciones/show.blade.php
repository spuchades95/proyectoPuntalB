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
        </tr>
    </tbody>
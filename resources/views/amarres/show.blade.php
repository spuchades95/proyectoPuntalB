<table>
    <thead>

        <tr>
            <th>Número</th>
            <th>Estado</th>
            <th>Tipo de plaza</th>
            <th>Año</th>
            <th>Causa</th>
            <th>Pantalán</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <td>{{$amarre->Numero}}</td>
            <td>{{$amarre->Estado}}</td>
            <td>{{$amarre->TipoPlaza}}</td>
            <td>{{$amarre->Anio}}</td>
            <td>{{$amarre->Causa}}</td>
            <td>{{$amarre->Pantalan_id}}</td>
        </tr>
    
    </tbody>
</table>

<a href="{{ route('amarres.index') }}">Volver</a>
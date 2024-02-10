@extends('layouts.plantilla')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<div>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($roles as $rol)
            <tr>
                <td>{{ $rol->NombreRol }}</td>
                <td>{{ $rol->Permisos }}</td>
                <td>
                    <a href="{{ route('roles.show',['role' => $rol->id]) }}">Ver</a> |

                </td>
                <td>

                    <form action="{{ route('roles.destroy',['role' => $rol->id])}}" method='post'>
                        @csrf
                        @method('DELETE')
                        <input type='submit' value='Eliminar' onclick='return confirm("¿Desea eliminarlo?")' class='btn btn-secondary btn-sm'>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        new DataTable('#example');
    });
</script>



@endsection
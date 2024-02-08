<div>
        <div style='float:right'><a href="{{ route('roles.create')}}">Insertar nuevo</a></div>
				<table cellspacing=2 cellpadding=2>   
				 @foreach ($roles as $rol)
        
            <tr>
                    <td>{{ $rol->title }}</td>
                    <td><a href="{{ route('roles.show',['rol' => $rol->id]) }}">Ver</a></td>
                    <td><a href="{{ route('roles.edit',['rol' => $rol->id]) }}">Editar</a></td>
                    <td>
                        <form action="{{ route('roles.destroy',['rol' => $rol->id])}}" method='post'>
                        @csrf
                        @method('DELETE')
                        <input type='submit' value='Eliminar' onclick='return confirm("¿Desea eliminarlo?")' class='btn btn-secondary btn-sm'>
                        </form>
                        
                    </td>
            </tr>
			    @endforeach
				</table> 
    </div>
@endsection
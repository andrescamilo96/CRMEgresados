@extends('layout')

@section('Contenido')


<h1>TODOS LOS MENSAJES</h1>

<table class ="table"width="100%" border="1">
	<caption>TABLA DE MENSAJES</caption>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Email</th>
			<th>Mensaje</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
		
			@foreach($messages as $message )
			<tr>
			<td>
				<a href="{{ route('mensajes.show',$message->id) }}">
				   {{ $message->nombre }}
				</a>
			</td>
			<td>{{ $message->email }}</td>
			<td>{{ $message->mensaje }}</td>
			<td >
				<a class="btn btn-info btn-xs" href="{{ route('mensajes.edit',$message->id) }}">
				   Editar
				</a>
			</td>
			<td >
				<form method="POST" action="{{ route('mensajes.destroy',$message->id) }}">
					{!! csrf_field() !!}
					{!! method_field('DELETE') !!}
					<button class ="btn btn-danger btn-xs " type="submit">Eliminar</button>
					
				</form>
			</td>

		</tr>
		@endforeach
	</tbody>
</table>
@stop
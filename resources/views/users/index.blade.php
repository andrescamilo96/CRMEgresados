@extends('layout')

@section('Contenido')

<h1>Usuarios</h1>
<table class ="table"width="100%" border="1">
	<caption>TABLA DE MENSAJES</caption>
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Email</th>
			<th>Rol</th>
			<th>Editar</th>
			<th>Eliminar</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{ $user->name }} </td>
			<td >{{ $user->email }}</td>
			<td >{{ $user->role->display_name }}</td>
		</tr>
		@endforeach
		
	</tbody>
</table>

@stop
@extends('layout')
@section('Contenido')
<h1>Editar Mensaje</h1>
<form action="{{ route('mensajes.update',$message->id) }}" method="POST">
	{!! method_field('PUT') !!}
	{!! csrf_field() !!}
	<p><label for ="nombre">
		nombre
		<input  class = "form-control" type="text" name="nombre" value ="{{ $message->nombre }}">
		{!! $errors->first('nombre','<span class =error>:message</span>') !!}
	</label></p>
	<p><label for ="email">
		Email
		<input class = "form-control"  type="text" name="email" value="{{ $message->email }}">
		{!! $errors->first('email','<span class=error>:message</span>') !!}
	</label></p>
	<p><label for ="mensaje">
		Mensaje
		<textarea class = "form-control"  name="mensaje">{{ $message->mensaje }}</textarea> 
		{!! $errors->first('mensaje','<span class=error>:message</span>') !!}
	</label></p>
	<input class="btn btn-primary" type="submit" value="Enviar">
</form>
@stop
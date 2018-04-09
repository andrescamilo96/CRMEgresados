@extends('layout')


@section('Contenido')
<h1> Contacto</h1>
<H2>Escribeme</H2>
@if(session()->has('info'))
		<h3>{{ session('info') }}</h3>
@else
<form action="{{ route('mensajes.store') }}" method="post">
	{!! csrf_field() !!}
	<p><label for ="nombre">
		nombre
		<input class="form-control" type="text" name="nombre" value ="{{ old('nombre') }}">
		{!! $errors->first('nombre','<span class =error>:message</span>') !!}
	</label></p>
	<p><label for ="email">
		Email
		<input class="form-control" type="text" name="email" value="{{ old('email') }}">
		{!! $errors->first('email','<span class=error>:message</span>') !!}
	</label></p>
	<p><label for ="mensaje">
		Mensaje
		<textarea class="form-control" name="mensaje">{{ old('mensaje') }}</textarea> 
		{!! $errors->first('mensaje','<span class=error>:message</span>') !!}
	</label></p>
	<input class ="btn btn-primary" type="submit" value="Enviar">
</form>
@endif
@stop
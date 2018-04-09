@extends('layout')

@section('Contenido')

	<h1>saludos</h1>
	
	<ul>
		@forelse($consolas as $consola)
			<li>{{ $consola}}</li>
		@empty
			<p>No hay consolas :(</p>
		@endforelse
	</ul>
	@if (count($consolas)===1)
		<p>Solo tienes una consola</p>
		@elseif(count($consolas)>1)
		<p>Tienes mas de una consola</p>
		@else
		<p>No tienes niguna consola</p>
	@endif
	<h2>Bienvenido Graduado <?php echo "$nombre"; ?></h2>
	<h3>welcome graduado {{ $nombre }}</h3>
@stop

@extends('template')

@section('title')
	Meu título feliz
@stop

@section('content')

<h1>Notas</h1>

<ul>
	@foreach($todasNotas as $nota)
		<li>{{$nota}}</li>
	@endforeach
</ul>

@stop
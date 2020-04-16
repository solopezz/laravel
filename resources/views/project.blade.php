@extends('layout')

@section('title', 'Projectos')

@section('content')


<h1>Projectos</h1>
@auth
<a href="{{ route('projects.create') }}">Crear Proyecto</a>
<br>
<br>
@endauth
@include('partials.msg')

<ul class="list-group">
	@forelse($project as $item)
	<li class="list-group-item"><a href="{{ route('projects.show', $item) }}">
		{{$item->title}} <span> {{ $item->description }}</span>
	</a></li>
	@empty
	<li>
		No hay proyectos
	</li>
	@endforelse
</ul>


@endsection
@extends('layout')

@section('content')

<h1>Porta folio</h1>

@forelse($portafolio as $item)
	<li class="list-group-item">
		{{$item['title']}}
	</li>
	@empty
	<li class="list-group-item">
		No hay proyectos
	</li>
@endforelse


@endsection
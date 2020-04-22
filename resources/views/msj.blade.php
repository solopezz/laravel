@extends('layout')

@section('title', 'Mensajes')

@section('content')


<div class="container">
	<h1 class="p-3">Mensajes</h1>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nombre</th>
				<th scope="col">Emai</th>
				<th scope="col">Mensaje</th>
				<th scope="col">Notas</th>
				<th scope="col">Tags</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@forelse($messages as  $index => $item)
			<tr>
				<th scope="row">{{$item->id}}</th>
				<td>
					{{-- Aqui se usa view presents inicia todo --}}
					{{ $item->present()->userName()}}
				</td>
				<td>
					{{ $item->present()->userEmail()}}
				</td>
				<td>{{$item->msj}}</td>
				<td>{{$item->present()->userNote()}}</td>
				<td>{{$item->tags->pluck('name')->implode(', ')}}</td>
				<td>
					x
				</td>
			</tr>
			@empty
			<li>
				No hay proyectos
			</li>
			@endforelse
		</tbody>
	</table>
	{!! $messages->links() !!}
</div>

{{-- <ul class="list-group">
	@forelse($users as $item)
	<li class="list-group-item"><a href="{{ route('projects.show', $item) }}">
		{{$item->title}} <span> {{ $item->description }}</span>
	</a></li>
	@empty
	<li>
		No hay proyectos
	</li>
	@endforelse
</ul>
--}}

@endsection
@extends('layout')

@section('title', 'Usuarios')

@section('content')


<div class="container">
	<h1 class="p-3">Usuarios</h1>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nombre</th>
				<th scope="col">Tipo</th>
				<th scope="col">Roles</th>
				<th scope="col">Email</th>
				<th scope="col">Notas</th>
				<th scope="col">Tags</th>
				<th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@forelse($users as  $index => $item)
			<tr>
				<th scope="row">{{++$index}}</th>
				<td>{{$item->name}}</td>
				<td>{{$item->type->name}}</td>
				<td>
					@foreach ($item->roles as $role)
					<p>{{$role->name}}</p>
					@endforeach
				</td>
				<td>{{$item->email}}</td>
				<td>{{$item->note->body}}</td>
				<td>{{$item->tags->pluck('name')->implode(', ')}}</td>
				<td>
					<div style="display: inline-flex;">
						<a  class="mr-2" href="{{ route('users.edit', $item) }}">Editar</a>
						<form action="{{ route('users.destroy', $item)  }}" method="POST">
							<input type="hidden" name="_method" value="DELETE">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button>Eliminar</button>
						</form>
					</div>
				</td>
			</tr>
			@empty
			<li>
				No hay proyectos
			</li>
			@endforelse
		</tbody>
	</table>
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
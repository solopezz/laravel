@extends('layout')

@section('title', 'Editar Usuario')

@section('content')

@include('partials.errors')
<h2>Editar usaurio</h2>
<form method="POST" action="{{ route('users.update', $user) }}"  enctype="multipart/form-data">
	@method('PATCH')
	@csrf
	<p>
		<img src="{{Storage::url($user->img)}}"width="42">
	</p>
	<p><label for="">Imagen<br>
		 <input type="file" class="form-control" name="img" >
	</p>
	<label for="">Nombre<br>
		<input name="name" type="text" value="{{ old('name', $user->name)}}">
	</label>
	<br>
	<label for="">Email<br>
		<input name="email" type="text" value="{{ old('email', $user->email)}}">
	</label>
	<br>
	<button>Editar</button>
</form>

@endsection
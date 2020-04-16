@extends('layout')

@section('title', 'Enviar mensaje')

@section('content')

@include('partials.errors')
<h2>Enviar mensaje</h2>
<form method="POST" action="{{ route('mail.send') }}">
	@csrf
	@if(auth()->guest())
	<label for="">Nombre<br>
		<input name="name" type="text">
	</label>
	<br>
	<label for="">Email<br>
		<input name="email" type="text">
	</label>
	<br>
	@endif
	<textarea name="msj" cols="30" rows="10">
	</textarea>
	<br>
	<button>Enviar</button>
</form>

@endsection
@extends('layout')

@section('title', 'Crear proyecto')

@section('content')

@include('partials.errors')

<form method="POST" action="{{ route('projects.store') }}">

	@include('projects._form', ['btnText'=> 'Guardar'])

</form>

@endsection
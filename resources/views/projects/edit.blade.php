@extends('layout')

@section('title', 'Editar proyecto')

@section('content')

@include('partials.errors')

<form method="POST" action="{{ route('projects.update', $project) }}">
	@method('PATCH')
	@include('projects._form', ['btnText'=> 'Editar'])

</form>

@endsection
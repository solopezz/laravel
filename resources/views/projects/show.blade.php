@extends('layout')

@section('title', 'Projecto | '. $project->title)

@section('content')
@auth
<a href="{{ route('projects.edit', $project) }}">Editar</a><br><br>
<form action="{{ route('projects.destroy', $project)  }}" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button>Eliminar</button>
</form>
@endauth
 {{ $project->description }}

@endsection
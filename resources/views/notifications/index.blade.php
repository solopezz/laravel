@extends('layout')

@section('title', 'Notificaciones')

@section('content')

@include('partials.errors')
<div class="container">
	
	<h2 align="center">Notificaciones</h2>
	<div class="row">
		<div class="col-md-6">
			<h2>
				No leidas
			</h2>
			<ul class="list-group">
				@foreach($unreadNotifications as $item)
				<li class="list-group-item">
					{{$item->data['msj']}}
					<form method="POST"  action="{{route('notification.read', $item->id)}}" 
						class="float-right">
						@method('PATCH')
						@csrf
						<button class="btn btn-danger btn-xs">x</button>
					</form>
				</li>
				@endforeach
			</ul>
		</div>
		<div class="col-md-6">
			<h2>
				Leidas
			</h2>
			<ul class="list-group">
				@foreach($readNotifications as $item)
				<li class="list-group-item">
					{{$item->data['msj']}}
					<form method="POST"  action="{{route('notification.read', $item->id)}}" 
						class="float-right">
						@method('DELETE')
						@csrf
						<button class="btn btn-danger btn-xs">x</button>
					</form>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>

@endsection
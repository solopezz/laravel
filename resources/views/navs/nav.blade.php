<nav>
	<ul class="nav">
		<li class="nav-item">
			<a class="{{ setActive('about') }} nav-link" href="/about">about</a>
		</li>
		<li class="nav-item">
			<a class="{{ setActive('portafolio') }} nav-link" href="/portafolio">porta folio</a>
		</li>
		<li class="nav-item">
			<a class="{{ setActive('info') }} nav-link" href="/info">@lang('INFO')</a>
		</li>
		<li class="nav-item">
			<a class="{{ setActive('projects.index') }} nav-link" href="/projects">{{__('PROJECT')}}</a>
		</li>
		<li class="nav-item">
			<a class="{{ setActive('view_email') }} nav-link" href="/view_email">Mensajes</a>
		</li>
		<li class="nav-item">
			<a class="{{ setActive('mail') }} nav-link" href="/mail">enviar email</a>
		</li>
		@guest
		<li class="nav-item">
			<a class="{{ setActive('login') }} nav-link" href="/login">login</a>
		</li>
		@else
		{{-- hasType es una funcion creada en el modelo de usuario --}}
		@if(auth()->user()->hasType(['admin','estudiante','jefe']))
		<li class="nav-item">
			<a class="{{ setActive('users.index') }} nav-link" href="/users">usuarios</a>
		</li>
		<li class="nav-item">
			<a class="{{ setActive('notification.index') }} nav-link" href="/notification">Notificaciones
				@if($count = auth()->user()->notifications->count())
				<span class="badge">{{$count}}</span>
				@endif
			</a>
		</li>
		@endif
		<li class="nav-item">
			<a class="{{ setActive('login') }} nav-link" href="users/{{auth()->user()->id}}/edit ">Mi cuenta</a>
		</li>
		<li class="nav-item" onclick="event.preventDefault();
		document.getElementById('logout-form').submit();">
			<a href="" class="nav-link">Cerrar sesion -{{auth()->user()->name}}</a>
		</li>
		@endguest
	</ul>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	@csrf
</form>
<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title', 'aprendible')</title>
	<style>
		.active {
			color: red;
			text-decoration: none;
		}
	</style>
	<link rel="stylesheet" href="/css/app.css">
	<script src="/js/app.js"></script>
	<script src="http://laravel.test:6001/socket.io/socket.io.js"></script>
</head>
<body>
	@include('navs.nav')
	@yield('content')
	@include('partials.msg')
</body>
</html>
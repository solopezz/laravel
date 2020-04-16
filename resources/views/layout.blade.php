<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'aprendible')</title>
	<style>
		.active {
			color: red;
			text-decoration: none;
		}
	</style>
	<link rel="stylesheet" href="/css/app.css">
	<script src="/js/app.js"></script>
</head>
<body>
	@include('navs.nav')
	@yield('content')
	@include('partials.msg')
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>@yield('title', 'Aprendible')</title>
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<script src="/js/app.js" defer></script>
	<style>
	</style>
</head>
<body>
	@include('partials.nav')

@include('partials.session-status')

	@yield('content')
</body>
</html>
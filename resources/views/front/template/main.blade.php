<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>@yield('title', 'Home') | Bolg Facilito</title>
	<link rel="stylesheet" href=" {{ asset('plugins/bootstrap/css/journal/bootstrap.css') }} ">
	{{-- <link rel="stylesheet" href=" {{ asset('css/general.css') }} "> --}}
	<link rel="stylesheet" href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
</head>
<body>
	<header>
		@include('front.template.partials.header')
	</header>
	<div class="container">
		@yield('content')
		<footer>
			<hr>
			Todos los derechos reservados {{ date('Y') }}
			<div class="pull-right"> Ivan Santicomani </div>
		</footer>
	</div>

	<script src="{{ asset('plugins/jquery/js/jquery-3.2.1.js') }}"></script>
</body>
</html>
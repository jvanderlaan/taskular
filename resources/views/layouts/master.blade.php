<!DOCTYPE html>

<html class="full" lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />

		<title>Employee Portal | Projects</title>

		<!-- Fonts & Icons -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Inconsolata">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 

		<!-- Styles -->
		@yield('styles')
		<link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">

	</head>

	<body>

		@include('shards/nav')
		@include('shards/logout')

		<main>
			
			@yield('content')

		</main>

	</body>

		<!-- JS (Includes) -->
		<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

		<script type="text/javascript" src="{{ asset('js/mantle.js') }}"></script>

		<!-- JS (This) -->
		@yield('scripts')

	</body>

</html>
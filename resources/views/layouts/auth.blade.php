<!DOCTYPE html>

<html class="full" lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />

		<title>Employee Portal | Login</title>

		<!-- Fonts & Icons -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Inconsolata">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 

		<!-- Styles -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/auth.css') }}">

	</head>

	<body>

		<main>
			
			@yield('content')

		</main>

	</body>

		<!-- JS (Includes) -->
		<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

		<script type="text/javascript" src="{{ asset('js/mantle.js') }}"></script>

		<!-- JS (This) -->

	</body>

</html>
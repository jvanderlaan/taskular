<!DOCTYPE html>

<html class="full" lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Search Engine -->
		<meta name="description" content="">
		<meta name="image" content="">
		<!-- Schema.org for Google -->
		<meta itemprop="name" content="">
		<meta itemprop="description" content="">
		<meta itemprop="image" content="">
		<!-- Twitter -->
		<meta name="twitter:card" content="">
		<meta name="twitter:title" content="">
		<meta name="twitter:description" content="">
		<meta name="twitter:image:src" content="">
		<!-- Open Graph general (Facebook, Pinterest & Google+) -->
		<meta name="og:title" content="">
		<meta name="og:description" content="">
		<meta name="og:image" content="">
		<meta name="og:url" content="">
		<meta name="og:site_name" content="">
		<meta name="og:type" content="website">
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" />

		@yield('title')

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
			
			@yield('messages')

			@yield('content')

		</main>

	</body>

		<!-- JS (Includes) -->
		<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

		<script type="text/javascript" src="{{ asset('js/mantle.js') }}"></script>

		<!-- JS (This) -->
	    <script>
	        $('.user-widget').hover(
	            function() { $(this).find('.fa-cog').addClass('fa-spin') },
	            function() { $(this).find('.fa-cog').removeClass('fa-spin') }
	        )
	    </script>
		@yield('scripts')

	</body>

</html>
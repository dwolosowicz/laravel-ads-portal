<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdsPortal</title>

	<link href="{{ asset('/css/all.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
	@include("partials.nav")

	<div class="container">
		@yield('content')
	</div>

	<!-- Scripts -->
	<script src="{{ asset('js/all.js') }}"></script>
</body>
</html>

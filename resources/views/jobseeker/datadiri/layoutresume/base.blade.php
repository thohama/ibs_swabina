<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		@yield('title')
		{{ !empty($__env->yieldContent('title')) ? ' | ' : '' }}
		{{ config('app.name') }}
	</title>
	@section('styles')
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	@show
</head>
<body>
	@yield('content')
</body>
</html>
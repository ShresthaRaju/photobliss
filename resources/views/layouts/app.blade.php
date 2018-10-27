<!DOCTYPE html>
<html>
	<head>
		@include('partials._header')
	</head>
	<body class="@yield('body_class')">
		@include('partials._navbar')
		{{-- main content goes here --}}
		<div id="app">
			@yield('main_content')
		</div>
		@include('partials._script')
		@include('partials._footer')
	</body>
</html>
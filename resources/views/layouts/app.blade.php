<!DOCTYPE html>
<html>
	<head>
		@include('partials._header')
	</head>
	<body class="@yield('body_class')">
		{{-- navigation bar --}}
		@include('partials._navbar')

		{{-- main content goes here --}}
		<div id="app">
			@yield('main_content')
		</div>

		{{-- footer --}}
		@include('partials._footer')

		{{-- scripts --}}
		@include('partials._script')
	</body>
</html>
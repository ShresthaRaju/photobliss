<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name') }} | @yield('title')</title>
<!-- Fonts and material icons-->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600|Material+Icons" rel="stylesheet" type="text/css">
<!-- css -->
<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
<!-- custom stylesheets -->
@yield('custom_stylesheets')
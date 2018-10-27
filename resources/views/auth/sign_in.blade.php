@extends('layouts.app')
@section('title','Sign In')
@section('body_class','login-page sidebar-collapse')
@section('main_content')
<div class="page-header header-filter" style="background-image: url({{ asset('images/sign_in_form_bg.jpeg') }}); background-size:cover; background-position:center;">
	<sign-in>
	</sign-in>
</div>
@endsection
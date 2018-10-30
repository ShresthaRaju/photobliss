@extends('layouts.app')
@section('title','Join for Free')
@section('body_class','login-page sidebar-collapse')
@section('main_content')
<div class="page-header header-filter" style="background-image: url({{ asset('images/sign_up_form_bg.jpeg') }}); background-size:cover; background-position:center;">
	<sign-up></sign-up>
</div>
@endsection


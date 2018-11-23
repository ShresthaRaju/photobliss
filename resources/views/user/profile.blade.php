@extends('layouts.app')
@section('title',"Profile | ".$username->full_name)
@section('body_class','profile-page sidebar-collapse')

@section('main_content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url({{$photo_name?asset('images/'.$username->username.'/'.$photo_name):asset('images/profile_header.jpeg')}}); background-position:center center; background-size:cover;"></div>
<user-profile></user-profile>
@endsection

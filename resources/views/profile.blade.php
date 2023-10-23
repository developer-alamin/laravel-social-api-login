@extends("layouts.app")
@section("titile","Laravel Api Profile")
@section("content")
<link rel="stylesheet" type="text/css" href="{{ asset("css/profile.css") }}">
@includeif("components.profile")
@endsection()
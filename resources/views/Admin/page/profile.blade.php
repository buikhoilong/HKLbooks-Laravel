@extends('Layouts.layout')

@section('title','Profile Account')

@section('content')

<h2>{{ Session::get('user_login')->Name }}</h2>
<img style="width:100px;height:100px" src="{{ asset('storage/admin/images/avatar/'. Session::get('user_login')->Avatar) }}"alt="{{ Session::get('user_login')->Avatar }}">
<p> {{ Session::get('user_login')->Birthday }}</p>
<p>{{ Session::get('user_login')->Address }}</p>
<p>{{ Session::get('user_login')->Phone }}</p>
<p>{{ Session::get('user_login')->Email }}</p>

@endsection
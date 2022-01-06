@extends('Layouts.layout')

@section("title","Home")
@section("content")
    <h1 style="color: red">
        đây là nội dung của trang index
    </h1>
    @if (Session::has('user_login'))
        @if (Session::get('user_login'))
            <p>{{ Session::get('user_login')->Name }}</p>
        @endif
    @endif
@endsection
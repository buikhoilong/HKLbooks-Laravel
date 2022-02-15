@extends('Layouts.layout')

@section('title','Profile Account')

@section('content')

<style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: auto;
      text-align: center;
      font-family: arial;
    }
    
    .title {
      color: grey;
      font-size: 18px;
    }
    </style>

<div style="padding: 10px 0px 20px 0px">
    <strong>
        <a href="{{ route('home') }}">Quay lại</a> <br>
    </strong>
<div class="card" style="text-align: left;">
    <img style="width:100%" src="{{ asset('storage/admin/images/avatar/'. Session::get('user_login')->Avatar) }}"alt="{{ Session::get('user_login')->Avatar }}">
    <h3>Họ và tên: {{ Session::get('user_login')->Name }}</h3>
    <p>Email: {{ Session::get('user_login')->Email }}</p>
    <p>Ngày sinh: {{ Session::get('user_login')->Birthday }}</p>
    <p>Địa chỉ: {{ Session::get('user_login')->Address }}</p>
    <p>Số điện thoại: {{ Session::get('user_login')->Phone }}</p>
    <p>Ngày tạo: {{ Session::get('user_login')->created_at }}</p>
    <p>Lần cuối cập nhật: {{ Session::get('user_login')->updated_at }}</p>
  </div>
</div>




@endsection
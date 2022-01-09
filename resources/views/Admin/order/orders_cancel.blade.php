@extends('Layouts.layout')
@section('title','Index Orders')

@section('content')

<style> 
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}
</style>


<div class="topnav">
    <a href="{{ route('index_orders') }}">Danh sách</a>
    <a href="{{ route('orders_processing') }}">Đơn hàng chờ xử lý</a>
    <a href="{{ route('delivery_orders') }}">Đơn hàng đang giao</a>
    <a href="{{ route('orders_delivered') }}">Đơn hàng đã giao</a>
    <a class="active" href="{{ route('orders_cancel') }}">Đơn hàng đã hủy</a>
  </div>

<h2>Trang đơn hàng đã hủy</h2>



@endsection
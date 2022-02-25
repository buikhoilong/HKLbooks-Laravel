@extends("Layouts.layout")
@section('title','Chi tiết tài khoản')
@section("content")
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
            <a href="{{ route('index_account') }}">Quay lại</a> <br>
        </strong>
    <div class="card" style="text-align: left;">
        <img style="width:100%" src="{{ asset('storage/admin/images/avatar/'.$accounts->Avatar)}}" alt="{{ $accounts->Avatar}}">
        <h3>Họ và tên: {{ $accounts->Name }}</h3>
        <p>Id: {{ $accounts->Id }}</p>
        <p>Email: {{ $accounts->Email }}</p>
        <p>Ngày sinh: {{ $accounts->Birthday }}</p>
        <p>Địa chỉ: {{ $accounts->Address }}</p>
        <p>Số điện thoại: {{ $accounts->Phone }}</p>
        <p>Ngày tạo: {{ $accounts->created_at }}</p>
        <p>Lần cuối cập nhật: {{ $accounts->updated_at }}</p>
      </div>
    </div>
@endsection
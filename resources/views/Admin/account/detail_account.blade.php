@extends("Layouts.layout")
@section('title','Detail Account')
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
        <p>Email: {{ $accounts->Email }}</p>
        <p>Ngày sinh: {{ $accounts->Birthday }}</p>
        <p>Địa chỉ: {{ $accounts->Address }}</p>
        <p>Số điện thoại: {{ $accounts->Phone }}</p>
      </div>
    </div>
    {{-- <div class="container">
        <img style="width:100px;height:100px" src="{{ asset('storage/admin/images/avatar/'.$accounts->Avatar)}}" alt="{{ $accounts->Avatar}}">
        <h2>{{ $accounts->Name }}</h2>
        <p>{{ $accounts->Email }}</p>
        <p>{{ $accounts->Password }}</p>
        <p>{{ $accounts->Birthday }}</p>
        <p>{{ $accounts->Address }}</p>
        <p>{{ $accounts->Phone }}</p>
    </div> --}}
@endsection
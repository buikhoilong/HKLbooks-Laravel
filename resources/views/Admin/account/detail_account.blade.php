@extends("Layouts.layout")
@section('title','Detail Account')
@section("content")
    <div>
        <a href="/account">Quay lại</a>
        <a href="/edit_account">Chỉnh Sửa</a>
        <a href="/delete_account">Xóa</a>
    </div>
    <div class="container">
        <img style="width:100px;height:100px" src="{{ asset('storage/admin/images/avatar/'.$accounts->Avatar)}}" alt="{{ $accounts->Avatar}}">
        <h2>{{ $accounts->Name }}</h2>
        <p>{{ $accounts->Email }}</p>
        <p>{{ $accounts->Password }}</p>
        <p>{{ $accounts->Birthday }}</p>
        <p>{{ $accounts->Address }}</p>
        <p>{{ $accounts->Phone }}</p>
    </div>
@endsection
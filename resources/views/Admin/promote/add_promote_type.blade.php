@extends('Layouts.layout')
@section('title', 'Thêm quảng bá')
@section('content')
    <style>
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
        }
    </style>
    <form style="margin: 10px" method="POST" action="{{ route('post_add_promote_type') }}"
        enctype="multipart/form-data">
        @csrf
        <div style="padding: 10px 0px 20px 0px">
            <strong>
                <a href="{{ route('index_promote') }}">Quay lại</a> <br>
            </strong>
        </div>
        <p>
            <label>Id</label>
            <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="idtxt">
        </p>
        <p>
            <label>Tên quảng bá</label>
            <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="tentxt">
        </p>
        <p>
            <label>Mô tả</label>
        </p>
        <textarea name="motatxt" rows="4" cols="50"></textarea>
        <br>
        <input class="button" style="margin: 10px 0 35px 50px" type="submit" value="Lưu">
    </form>
@endsection

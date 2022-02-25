@extends('Layouts.layout')

@section('title','Chi tiết tài khoản')

@section('content')

<style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 400px;
      margin: auto;
      text-align: center;
      font-family: arial;
    }
    
    .title {
      color: grey;
      font-size: 18px;
    }
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

<div style="padding: 10px 0px 20px 0px">
    <strong>
        <a href="{{ route('home') }}">Quay lại</a> <br>
    </strong>
<div class="card" style="text-align: left;">
  <form style="margin: 10px" method="POST" action="{{ route('updatefile',['Id' =>Session::get('user_login')->Id ]) }}" enctype="multipart/form-data">
    @csrf
    <div>
      <img style="width:100%" src="{{ asset('storage/admin/images/avatar/'. Session::get('user_login')->Avatar) }}"alt="{{ Session::get('user_login')->Avatar }}" >
      <input name="imagetxt" type="file">
    </div>
  <p>
      <label>Họ và tên:</label>
      <input value="{{ Session::get('user_login')->Name}}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="tentxt">
  </p>
  <p>
      <label>Email:</label>
      <input value="{{ Session::get('user_login')->Email}}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="emailtxt">
  </p>
  <p>
      <label>Ngày sinh:</label>
      <input value="{{ Session::get('user_login')->Birthday}}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="ngaysinhtxt">
  </p>
  <p>
      <label>Địa chỉ:</label>
      <input value="{{ Session::get('user_login')->Address}}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="diachitxt">
  </p>
  <p>
      <label>Số điện thoại:</label>
      <input value="{{ Session::get('user_login')->Phone}}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="sdttxt">
  </p>
  <p>
      <label>Ngày tạo: {{ Session::get('user_login')->created_at }}</label>
  </p>
  <p>
      <label>Lần cuối cập nhật: {{ Session::get('user_login')->updated_at }}</label>
  </p>
    {{-- <input class="button"  style="margin: 10px 0 35px 120px" type="submit" value="Cập nhật" > --}}
    <button onclick="testConfirmDialog()" class="button" type="submit" class="button" value="Cập nhật" >Cập nhật</button>
  </form>
  </div>
</div>
<script type="text/javascript">

  function testConfirmDialog()  {
       var result = confirm("Bạn có muốn cập nhật?");
       if(result)  {
           alert("Cập nhật thành công! Thông tin sẽ được cập nhật sau khi đăng nhập lại!");
       }
  }
</script>
@endsection
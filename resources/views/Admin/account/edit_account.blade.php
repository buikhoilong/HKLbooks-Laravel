@extends("Layouts.layout")
@section('title','Add Account')
@section("content")
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

<form  style="margin: 10px" method="POST" action="{{ route('update_account',['Id' =>$accounts->Id ]) }}" enctype="multipart/form-data">
    @csrf
    <div style="padding: 10px 0px 20px 0px">
        <strong>
            <a href="{{ route('index_account') }}">Quay lại</a> <br>
        </strong>
    </div>
    <p>
        <label>Họ và Tên</label>
        <input value="{{ $accounts->Name }}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="tentxt">
    </p>
    <p>
        <label>Email</label>
        <input value="{{ $accounts->Email }}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="emailtxt">
    </p>
    <p>
        <label>Mật Khẩu</label>
        <input value="{{ $accounts->password }}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="password"  name="matkhautxt">
    </p>
    <p>
        <label>Ngày Sinh</label>
        <input value="{{ $accounts->Birthday }}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="date"placeholder="YYYY-MM-DD" name="ngaysinhtxt">
    </p>
    <p>
        <label>Địa Chỉ</label>
        <input value="{{ $accounts->Address }}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="diachitxt">
    </p>
    <p>
        <label>Số Điện Thoại</label>
        <input value="{{ $accounts->Phone }}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="sdttxt">
    </p>
    
    <p>
        <label>Hình ảnh</label>
        <br>
        <img style="width: 150px;max-height:200px;object-fit:contain" src="{{ asset('storage/admin/images/avatar/'.$accounts->Avatar)}}"><br>
        <br>
        <input style="width: 350px; height: 50px" class="w3-input w3-border w3-round-large" type="file" id ="imagetxt" name="imagetxt">
    </p>
    <input class="button" style="margin: 10px 0 35px 50px" type="submit" value="Cập nhật" >

</form>
@endsection

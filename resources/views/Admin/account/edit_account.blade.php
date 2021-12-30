@extends("Layouts.layout")
@section('title','Add Account')
@section("content")
<div>
    <a href="/account">Quay lại</a>
    <a href="/delete_account">Xóa</a>
</div>
<form  method="POST" action="{{ route('update_account',['Id' =>$accounts->Id ]) }}" enctype="multipart/form-data">
    @csrf
    <label >Họ và Tên</label>
    <input type="text" name="tentxt" value="{{ $accounts->Name }}" /><br>
    <label >Email</label>
    <input type="text" name="emailtxt" value="{{ $accounts->Email }}" /><br>
    <label >Mật Khẩu</label>
    <input type="password"  name="matkhautxt" value="{{ $accounts->Password }}" /><br>
    <label >Ngày Sinh</label>
    <input type="date" placeholder="YYYY-MM-DD" name="ngaysinhtxt" value="{{ $accounts->Birthday }}" /> <br>
    <label >Địa Chỉ</label>
    <input type="text" name="diachitxt" value="{{ $accounts->Address }}" /><br>
    <label >Số Điện Thoại</label>
    <input type="text" name="sdttxt" value="{{ $accounts->Phone }}" /><br>
    <label >Hình ảnh</label>
    <img style="width: 100px;max-height:100px;object-fit:contain" src="{{ asset('storage/admin/images/avatar/'.$accounts->Avatar)}}"><br>
    <input type="file" id ="imagetxt" name="imagetxt" /> <br>
    <input type="submit">
</form>
@endsection

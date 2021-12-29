@extends("Layouts.layout")
@section('title','Add Account')
@section("content")
<form  method="POST" action="{{ route('add_account') }}" enctype="multipart/form-data">
    @csrf
    <label >Họ và Tên</label>
    <input type="text" name="tentxt" /><br>
    <label >Giá</label>
    <input type="text" name="ngaysinhtxt" /> <br>
    <label >Ngày Sinh</label>
    <input type="text" name="diachitxt" /><br>
    <label >Số Điện Thoại</label>
    <input type="text" name="sdttxt" /><br>
    <label >Email</label>
    <input type="text" name="emailtxt" /><br>
    <label >Phân Quyền</label>
    <select name="roletxt" id="roletxt">
        <option value="">Chọn Loại</option>
        <option value="0">Admin</option>
        <option value="1">User</option>
    </select>
    <br>
    <input type="submit">
</form>
@endsection

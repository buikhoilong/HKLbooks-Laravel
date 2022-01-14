@extends("Layouts.layout")
@section('title','Add Account')
@section("content")
<form style="margin: 10px" method="POST" action="{{ route('add_account') }}" enctype="multipart/form-data">
    @csrf

    <div style="padding: 10px 0px 20px 0px">
        <strong>
            <a href="{{ route('index_account') }}">Quay lại</a> <br>
        </strong>
    </div>
    <p>
        <label>Họ và Tên</label>
        <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="tentxt">
    </p>
    <p>
        <label>Email</label>
        <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="emailtxt">
    </p>
    <p>
        <label>Mật Khẩu</label>
        <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="password"  name="matkhautxt">
    </p>
    <p>
        <label>Ngày Sinh</label>
        <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="date"placeholder="YYYY-MM-DD" name="ngaysinhtxt">
    </p>
    <p>
        <label>Địa Chỉ</label>
        <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="diachitxt">
    </p>
    <p>
        <label>Số Điện Thoại</label>
        <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="sdttxt">
    </p>
    <label >Phân Quyền</label>
    <br>
    <select style="width: 350px; height: 40px" class="w3-select" name="roletxt" id="roletxt">
        <option value="" disabled selected>Chọn Loại</option>
        <option value="0">Admin</option>
        <option value="1">User</option>
      </select>
    <br>
    <br>
    <p>
        <label>Hình ảnh</label>
        <input style="width: 350px; height: 50px" class="w3-input w3-border w3-round-large" type="file" id ="imagetxt" name="imagetxt">
    </p>

    {{-- <label >Họ và Tên</label>
    <input type="text" name="tentxt" /><br> --}}
    {{-- <label >Email</label>
    <input type="text" name="emailtxt" /><br> --}}
    {{-- <label >Mật Khẩu</label>
    <input type="password"  name="matkhautxt" /><br> --}}
    {{-- <label >Ngày Sinh</label>
    <input type="date" placeholder="YYYY-MM-DD" name="ngaysinhtxt" /> <br> --}}
    {{-- <label >Địa Chỉ</label>
    <input type="text" name="diachitxt" /><br> --}}
    {{-- <label >Số Điện Thoại</label>
    <input type="text" name="sdttxt" /><br> --}}
    {{-- <label >Phân Quyền</label>
    <select name="roletxt" id="roletxt">
        <option value="">Chọn Loại</option>
        <option value="0">Admin</option>
        <option value="1">User</option>
    </select>
    <br> --}}
    {{-- <label >Hình ảnh</label>
    <input type="file" id ="imagetxt" name="imagetxt" /> <br> --}}
    <input style="margin: 10px 0 35px 50px" type="submit" value="Submit" >
</form>
@endsection

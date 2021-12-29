@extends("Layouts.layout")
@section('title','Index Category')
@section("content")
<form  method="POST" action="{{ route('add_category') }}" enctype="multipart/form-data">
    @csrf
    <label >Tên Thể Loại</label>
    <input type="text" name="tentxt" /><br>
    <label >Mô tả</label>
    <input type="text" name="motatxt" /> <br>
    <input type="submit">
</form>
@endsection

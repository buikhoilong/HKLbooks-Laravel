@extends("Layouts.layout")
@section('title','Edit Books')
@section("content")

<form  method="POST" action="{{ route('update_category',['Id'=> $category->Id])}}" enctype="multipart/form-data">
    @csrf
    <label >Tên thể loại</label>
    <input type="text" name="tentxt" value="{{ $category->Name }}" /><br>
    <label >Mô tả</label>
    <input type="text" name="motatxt" value="{{ $category->Description }}" /> <br>
    <input type="submit">
</form>

@endsection
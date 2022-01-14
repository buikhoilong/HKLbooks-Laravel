@extends("Layouts.layout")
@section('title','Index Category')
@section("content")
<form style="margin: 10px"   method="POST" action="{{ route('add_category') }}" enctype="multipart/form-data">
    @csrf
    <div style="padding: 10px 0px 20px 0px">
        <strong>
            <a href="{{ route('index_category') }}">Quay lại</a> <br>
        </strong>
    </div>
    <p>
        <label>Tên Thể Loại</label>
        <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="tentxt">
    </p>
    <p>
        <label>Mô tả</label>
        <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="motatxt">
    </p>
    <input style="margin: 10px 0 35px 50px" type="submit" >

    {{-- <label >Tên Thể Loại</label>
    <input type="text" name="tentxt" /><br>
    <label >Mô tả</label>
    <input type="text" name="motatxt" /> <br>
    <input type="submit"> --}}
</form>
@endsection

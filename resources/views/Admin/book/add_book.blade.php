@extends("Layouts.layout")
@section('title','Index Books')
@section("content")
<form  method="POST" action="{{ route('add_book') }}" enctype="multipart/form-data">
    @csrf
    <label >Tên sách</label>
    <input type="text" name="tentxt" /><br>
    <label >Giá</label>
    <input type="text" name="giatxt" /> <br>
    <label >Số lượng</label>
    <input type="text" name="soluongtxt" /><br>
    <label >Mô tả</label>
    <input type="text" name="motatxt" /><br>
    <label >Tác giả</label>
    <input type="text" name="tacgiatxt" /><br>
    <label >Nhà xuất bản</label>
    <input type="text" name="nhaxuatbantxt" /><br>
    <label >Thể Loại</label>
    <select name="theloaitxt" id="theloaitxt">
        <option value="">Chọn Loại</option>
        @for ($index = 0 ; $index < $categories->count(); $index++)
            <option value="{{ $categories[$index]->Id }}">{{ $categories[$index]->Name }}</option>
        @endfor
    </select>
    <br>
    <label >Hình ảnh</label>
    <input type="file" id ="imagetxt" name="imagetxt" /> <br>
    <input type="submit">
</form>
@endsection

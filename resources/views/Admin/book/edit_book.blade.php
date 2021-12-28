@extends("Layouts.layout")
@section('title','Edit Books')
@section("content")

<form  method="POST" action="{{ route('update_book',['Id'=> $books->Id])}}" enctype="multipart/form-data">
    {{-- @method("PATCH"); --}}
    @csrf
    <label >Tên sách</label>
    <input type="text" name="tentxt" value="{{ $books->Name }}" /><br>
    <label >Giá</label>
    <input type="text" name="giatxt" value="{{ $books->Price }}" /> <br>
    <label >Số lượng</label>
    <input type="text" name="soluongtxt" value="{{ $books->Stock }}" /><br>
    <label >Mô tả</label>
    <input type="text" name="motatxt" value="{{ $books->Detail }}" /><br>
    <label >Tác giả</label>
    <input type="text" name="tacgiatxt" value="{{ $books->Author }}" /><br>
    <label >Nhà xuất bản</label>
    <input type="text" name="nhaxuatbantxt" value="{{ $books->Publisher }}" /><br>
    {{-- <label >Thể Loại</label>
    <select name="theloaitxt" id="theloaitxt">
        @for ($i = 0 ; $i < $categories->count(); $i++)
            <option value="{{ $categories[$i]->Id }}" @if ($categories[$i]->Id==$books->CategoryId) selected @endif>
                {{ $categories[$i]->Name }}
            </option>
        @endfor
    </select> --}}
    {{-- <select name="theloaitxt" id="theloaitxt">
        @foreach ($categories as $cate)
        <option value="{{ $cate->Id }}" @if ($cate->Id==$books->CategoryId) selected @endif>
        {{ $cate->Name }}
    </option>
    @endforeach
    </select><br> --}}
    <br>
    {{-- <label >Hình ảnh</label>
    <img style="width: 100px;max-height:100px;object-fit:contain" src="{{ asset('storage/admin/images/books/'.$books->ImgPath)}}"><br>
    <input type="file" name="imagetxt" /> <br> --}}
    <input type="submit">
</form>

@endsection
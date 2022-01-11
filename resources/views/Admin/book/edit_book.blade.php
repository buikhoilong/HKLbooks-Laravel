@extends("Layouts.layout")
@section('title','Edit Books')
@section("content")

<form style="margin: 10px" method="POST" action="{{ route('update_book',['Id'=> $books->Id])}}" enctype="multipart/form-data">
    @csrf
    <p>
        <strong>
            <a href="{{ route('index_books') }}">Quay Lại</a>
        </strong>
    </p>
    <p>
        <label>Tên sách</label>
        <input value="{{ $books->Name }}"  style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="tentxt">
    </p>
    <p>
        <label>Giá</label>
        <input value="{{ $books->Price }}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="giatxt">
    </p>
    <p>
        <label>Số lượng</label>
        <input value="{{ $books->Stock }}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="soluongtxt">
    </p>
    <p>
        <label>Mô tả</label>
        <input value="{{ $books->Detail }}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="motatxt">
    </p>
    <p>
        <label>Tác giả</label>
        <input value="{{ $books->Author }}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="tacgiatxt">
    </p>
    <p>
        <label>Nhà xuất bản</label>
        <input value="{{ $books->Publisher }}" style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="nhaxuatbantxt">
    </p>
    <label >Thể Loại</label>
    <br>
    <select style="width: 350px; height: 40px" class="w3-select" name="theloaitxt" id="theloaitxt">
        <option value="" disabled selected>Chọn Loại</option>
        @for ($i = 0 ; $i < $categories->count(); $i++)
        @if ($categories[$i]->Status == 1)
        <option value="{{ $categories[$i]->Id }}" @if ($categories[$i]->Id==$books->CategoryId) selected @endif>
            {{ $categories[$i]->Name }}
        </option>
        @endif
    @endfor
      </select>
    <br>
    <p>
        <label>Hình ảnh</label>
        <br>
        <img style="width: 100px;max-height:100px;object-fit:contain" src="{{ asset('storage/admin/images/books/'.$books->ImgPath)}}"><br>
        <input style="width: 350px; height: 50px" class="w3-input w3-border w3-round-large" type="file" id ="imagetxt" name="imagetxt">
    </p>

    {{-- <label >Tên sách</label>
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
    <input type="text" name="nhaxuatbantxt" value="{{ $books->Publisher }}" /><br> --}}
    {{-- <label >Thể Loại</label>
    <select name="theloaitxt" id="theloaitxt">
        @for ($i = 0 ; $i < $categories->count(); $i++)
            @if ($categories[$i]->Status == 1)
            <option value="{{ $categories[$i]->Id }}" @if ($categories[$i]->Id==$books->CategoryId) selected @endif>
                {{ $categories[$i]->Name }}
            </option>
            @endif
        @endfor
    </select> --}}
    {{-- <br>
    <label >Hình ảnh</label>
    <img style="width: 100px;max-height:100px;object-fit:contain" src="{{ asset('storage/admin/images/books/'.$books->ImgPath)}}"><br>
    <input type="file" name="imagetxt" /> <br> --}}
    {{-- <input type="submit"> --}}
    <input style="margin: 10px 10px 35px 0" type="submit" value="Cập Nhật" >
</form>

@endsection
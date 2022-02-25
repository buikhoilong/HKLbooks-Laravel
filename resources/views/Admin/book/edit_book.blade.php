@extends("Layouts.layout")
@section('title','Cập nhập sách')
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

    <input class="button" style="margin: 10px 0 35px 50px" type="submit" value="Cập Nhật" >
</form>

@endsection
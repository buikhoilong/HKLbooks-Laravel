@extends("Layouts.layout")
@section('title','Thêm sách')
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
<form style="margin: 10px" method="POST" action="{{ route('add_book') }}" enctype="multipart/form-data">
    @csrf
    <div style="padding: 10px 0px 20px 0px">
        <strong>
            <a href="{{ route('index_books') }}">Quay lại</a> <br>
        </strong>
    </div>
    <p>
        <label>Tên sách</label>
        <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="tentxt">
    </p>
    <p>
        <label>Giá</label>
        <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="giatxt">
    </p>
    <p>
        <label>Số lượng</label>
        <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="soluongtxt">
    </p>
    <p>
        <label>Mô tả</label>
        <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="motatxt">
    </p>
    <p>
        <label>Tác giả</label>
        <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="tacgiatxt">
    </p>
    <p>
        <label>Nhà xuất bản</label>
        <input style="width: 350px; height: 35px" class="w3-input w3-border w3-round-large" type="text" name="nhaxuatbantxt">
    </p>
    <label >Thể Loại</label>
    <br>
    <select style="width: 350px; height: 40px" class="w3-select" name="theloaitxt" id="theloaitxt">
        <option value="" disabled selected>Chọn Loại</option>
        @for ($index = 0 ; $index < $categories->count(); $index++)
            @if ($categories[$index]->Status == 1)
                <option value="{{ $categories[$index]->Id }}">{{ $categories[$index]->Name }}</option>
            @endif
        @endfor
      </select>
      <br>
      <p>
        <label>Hình ảnh</label>
        <input style="width: 350px; height: 50px" class="w3-input w3-border w3-round-large" type="file" id ="imagetxt" name="imagetxt">
    </p>
    <input class="button" style="margin: 10px 0 35px 50px" type="submit" value="Tạo sách" >
</form>
@endsection

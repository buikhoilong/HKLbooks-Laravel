<form  method="POST" action="{{ route('add_product') }}" enctype="multipart/form-data">
    @csrf
    <label >Tên sách</label>
    <input type="text" name="tentxt" /><br>
    <label >Số lượng</label>
    <input type="text" name="soluongtxt" /><br>
    <label >Giá</label>
    <input type="text" name="giatxt" /> <br>
    <label >image</label>
    <input type="file" id ="imagetxt" name="imagetxt" /> <br>
    <input type="submit">
</form>
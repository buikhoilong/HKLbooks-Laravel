@extends("Layouts.layout")
@section('title','Chi tiết sách')
@section("content")

    <div style="padding: 20px 20px 20px 70px">
        <strong>
            <a href="{{ route('index_books') }}">Quay lại</a> <br>
        </strong>
    </div>
    <div class="container">
        <img  style="width:150px;height:200px; margin:20px" src="{{ asset('storage/admin/images/books/'.$books->ImgPath)}}" alt="{{ $books->ImgPath}}">
        <h2 >Tên sách: {{ $books->Name }}</h2>
        <br>
        <p>Giá: {{number_format(($books->Price ), 0, ',', '.')." VNĐ"}}</p>
        <p>Số lượng: {{ $books->Stock }}</p>
        <p>Tác giả: {{ $books->Author }}</p>
        <p>Nhà xuất bản: {{ $books->Publisher }}</p>
        @for ($i =0; $i < $categories->count();$i++)
            @if ($categories[$i]->Id === $books->CategoryId)
                <p>Thể loại: {{ $categories[$i]->Name }}</p>
            @endif
        @endfor
        <p>Mô tả: {{ $books->Detail }}</p>
    </div>
@endsection
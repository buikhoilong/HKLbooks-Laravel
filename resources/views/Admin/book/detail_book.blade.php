@extends("Layouts.layout")
@section('title','Detail Books')
@section("content")
    <div>
        <a href="/book">Quay lại</a>
        <a href="">Chỉnh Sửa</a>
        <a href="">Xóa</a>
    </div>
    <div class="container">
        <img style="width:100px;height:100px" src="{{ asset('storage/admin/images/books/'.$books->ImgPath)}}" alt="{{ $books->ImgPath}}">
        <h2>{{ $books->Name }}</h2>
        <p>{{ $books->Price }}</p>
        <p>{{ $books->Stock }}</p>
        <p>{{ $books->Author }}</p>
        <p>{{ $books->Publisher }}</p>
        @for ($i =0; $i < $categories->count();$i++)
            @if ($categories[$i]->Id === $books->CategoryId)
                <p>{{ $categories[$i]->Name }}</p>
            @endif
        @endfor
        <p>{{ $books->Detail }}</p>
    </div>
@endsection
@extends("Layouts.layout")
@section('title','Detail Category')
@section("content")
    <div>
        <a href="/category">Quay lại</a>
        {{-- <a href="/category/edit">Chỉnh Sửa</a> --}}
        {{-- <a href="/delete_category">Xóa</a> --}}
    </div>
    <div class="container">
        <h2>{{ $category->Name }}</h2>
        <p>{{ $category->Description }}</p>
    </div>
@endsection
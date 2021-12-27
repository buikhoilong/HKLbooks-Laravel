@extends("Layouts.layout")
@section('title','Detail Books')
@section("content")

    <div class="row"></div>
    <h2>{{ $product->name }}</h2>
    <h2>{{ $product->price }}</h2>
    <h2>{{ $product->quantity }}</h2>


@endsection
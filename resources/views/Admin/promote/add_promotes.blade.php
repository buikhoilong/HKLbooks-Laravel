@extends('Layouts.layout')
@section('title', 'Thêm sách vào quảng bá')

@section('content')

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
    <form style="margin: 10px" method="POST" action="{{ route('post_add_book_to_promote') }}"
        enctype="multipart/form-data">
        @csrf

        <div style="padding: 10px 0px 20px 0px">
            <strong>
                <a href="{{ route('index_promote') }}">Quay lại</a> <br>
            </strong>
        </div>
        <label>Tên sách</label>
        <br>
        <select style="width: 350px; height: 40px" class="w3-select" name="idsach" id="tensach">
            <option value="" disabled selected>Chọn Sách</option>
            @for ($y = 0; $y < $books->count(); $y++)
                @for ($index = 0; $index < $tam2->count(); $index++)
                    @if ($books[$y]->Id == $tam2[$index]->Id)
                        <option value="{{ $books[$y]->Id }}">{{ $books[$y]->Name }}</option>
                    @endif
                @endfor
            @endfor
        </select>
        <br>
        <br>
        <label>Thể Loại</label>
        <br>
        @for ($i = 0; $i < $promotetype->count(); $i++)
            <input type="checkbox" id="vehicle1" name="status_checkbox[]" value="{{ $promotetype[$i]->Id }}">
            <label for="vehicle1">{{ $promotetype[$i]->Id }}</label><br>
        @endfor
        <br>
        <input class="button" style="margin: 10px 0 35px 50px" type="submit" value="Lưu">
    </form>
@endsection

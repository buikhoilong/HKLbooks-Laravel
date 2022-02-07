@extends('Layouts.layout')
@section('title', 'Index Promotes')

@section('content')
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }

        #chuc_nang a{
            padding-left: 15px;
        }
    </style>


    <div class="topnav">
        <a class="active" href="{{ route('index_promote') }}">Danh sách</a>
        <a href="{{ route('new_promote') }}">Sách mới</a>
        <a href="{{ route('popular_promote') }}">Sách phổ biến</a>
        <a href="{{ route('story_promote') }}">Truyện</a>

    </div>
    <strong><a style="float: right;color:black" href="{{ route('get_add_book_to_promote') }}"><i
        style="font-size: 35px;padding:20px; margin-right:40px; color:green" class="fas fa-plus-circle"></i></a></strong>

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên sách</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < $promotes->count(); $i++)
                                        @if ($i + 1 < $promotes->count())
                                            @if ($promotes[$i]->BookId != $promotes[$i + 1]->BookId)
                                                <tr>
                                                    @for ($y = 0; $y < $books->count(); $y++)
                                                        @if ($promotes[$i]->BookId == $books[$y]->Id)
                                                            <td> <img
                                                                    style="width:150px;height:200px;background-size: contain"
                                                                    src="{{ asset('storage/admin/images/books/' . $books[$y]->ImgPath) }}"
                                                                    alt="{{ $books[$y]->ImgPath }}"></td>
                                                            <td>{{ $books[$y]->Name }}</td>
                                                            <td id="chuc_nang">
                                                                <a data-toggle="modal"
                                                                    data-target="#exampleModalLong{{ $books[$y]->Id }}"
                                                                    style="cursor: pointer" id="{{ $books[$y]->Id }}"><i
                                                                        style="color:rgb(233, 154, 8)"
                                                                        class="fas fa-edit"></i>
                                                                </a>
                                                                <div class="modal fade"
                                                                    id="exampleModalLong{{ $books[$y]->Id }}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLongTitle"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLongTitle">
                                                                                    Cập nhật quảng bá</h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="POST"
                                                                                    action="{{ route('post_promote', ['Id' => $books[$y]->Id]) }}"
                                                                                    enctype="multipart/form-data"
                                                                                    name="form-reply">
                                                                                    @csrf
                                                                                    <div>
                                                                                        <h3>{{ $books[$y]->Name }}</h3>
                                                                                        <img style="width:150px;height:200px;background-size: contain"
                                                                                            src="{{ asset('storage/admin/images/books/' . $books[$y]->ImgPath) }}"
                                                                                            alt="{{ $books[$y]->ImgPath }}"><br>
                                                                                            
                                                                                        @for ($z = 0; $z < $promotetype->count(); $z++)
                                                                                            <input type="checkbox"
                                                                                                @for ($m = 0; $m < $promotes->count(); $m++)
                                                                                            {{ $promotetype[$z]->Id == $promotes[$m]->PromoteId && $promotes[$m]->BookId == $books[$y]->Id ? 'checked' : '' }}
                                                                                        @endfor
                                                                                        id="vehicle1"
                                                                                        name="status_checkbox[]"
                                                                                        value="{{ $promotetype[$z]->Id }}">
                                                                                        <label for="vehicle1">
                                                                                            {{ $promotetype[$z]->Id }}</label><br>
                                                        @endfor
                        </div>
                        <div id="chucnang" style="float: right; margin-left:20px">
                            <button style="margin: 10px;" type="submit" class="btn btn-primary">Lưu</button>
                            <button style="margin-right: 90px" type="button" class="btn btn-secondary"
                                data-dismiss="modal">Đóng</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('delete_promote',['Id'=> $books[$y]->Id]) }}"><i style="color:rgb(223, 9, 9)" class="fas fa-trash"></i></a>
        </td>
        @endif
        @endfor
        </tr>
        @endif
    @else
        <tr>
            @for ($y = 0; $y < $books->count(); $y++)
                @if ($promotes[$promotes->count() - 1]->BookId == $books[$y]->Id)
                    <td> <img style="width:150px;height:200px;background-size: contain"
                            src="{{ asset('storage/admin/images/books/' . $books[$y]->ImgPath) }}"
                            alt="{{ $books[$y]->ImgPath }}"></td>
                    <td>{{ $books[$y]->Name }}</td>
                    <td id="chuc_nang">
                        <a data-toggle="modal" data-target="#exampleModalLong{{ $books[$y]->Id }}"
                            style="cursor: pointer" id="{{ $books[$y]->Id }}"><i style="color:rgb(233, 154, 8)"
                                class="fas fa-edit"></i>
                        </a>
                        <div class="modal fade" id="exampleModalLong{{ $books[$y]->Id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                            Cập nhật quảng bá</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST"
                                            action="{{ route('post_promote', ['Id' => $books[$y]->Id]) }}"
                                            enctype="multipart/form-data" name="form-reply">
                                            @csrf
                                            <div>
                                                <h3>{{ $books[$y]->Name }}</h3>
                                                <img style="width:150px;height:200px;background-size: contain"
                                                    src="{{ asset('storage/admin/images/books/' . $books[$y]->ImgPath) }}"
                                                    alt="{{ $books[$y]->ImgPath }}"><br>
                                                @for ($z = 0; $z < $promotetype->count(); $z++)
                                                    <input type="checkbox" @for ($m = 0; $m < $promotes->count(); $m++)
                                                    {{ $promotetype[$z]->Id == $promotes[$m]->PromoteId && $promotes[$m]->BookId == $books[$y]->Id ? 'checked' : '' }}
                                                @endfor
                                                id="vehicle1"
                                                name="status_checkbox[]"
                                                value="{{ $promotetype[$z]->Id }}">
                                                <label for="vehicle1">
                                                    {{ $promotetype[$z]->Id }}</label><br>
                @endfor
    </div>
    <div id="chucnang" style="float: right; margin-left:20px">
        <button style="margin: 10px;" type="submit" class="btn btn-primary">Lưu</button>
        <button style="margin-right: 90px" type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    <a href="{{ route('delete_promote',['Id'=> $books[$y]->Id]) }}"><i style="color:rgb(223, 9, 9)" class="fas fa-trash"></i></a>

    </td>
    @endif
    @endfor
    </tr>

    @endif
    @endfor
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div><!-- .animated -->
    </div><!-- .content -->

    <!-- Scripts -->
    <script src="{{ asset('admin/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/init/datatables-init.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>
@endsection

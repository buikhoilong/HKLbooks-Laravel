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

    </style>


    <div class="topnav">
        <a class="active" href="{{ route('index_promote') }}">Danh sách</a>
        <a href="{{ route('new_promote') }}">Sách mới</a>
        <a href="{{ route('popular_promote') }}">Sách phổ biến</a>
    </div>


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
                                        <tr>
                                            @for ($y = 0; $y < $books->count(); $y++)
                                                @if ($promotes[$i]->BookId == $books[$y]->Id)
                                                    <td> <img style="width:150px;height:200px;background-size: contain"
                                                            src="{{ asset('storage/admin/images/books/' . $books[$y]->ImgPath) }}"
                                                            alt="{{ $books[$y]->ImgPath }}"></td>
                                                    <td>{{ $books[$y]->Name }}</td>
                                                    <td>
                                                        <a data-toggle="modal" data-target="#exampleModalLong{{ $books[$y]->Id }}"
                                                            style="cursor: pointer" id="{{ $books[$y]->Id }}" ><i style="font-size: 25px; color:tomato"
                                                                class="far fa-comment-dots"></i>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalLong{{ $books[$y]->Id }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLongTitle"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLongTitle">
                                                                            Trả lời</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
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
                                                                                    @for ($z=0; $z < $promotes->count(); $z++)
                                                                                        @if ($promotes[$z]->BookId == $books[$y]->Id)
                                                                                            <input type="checkbox" checked id="vehicle1" name="vehicle1" value="{{ $promotes[$z]->PromoteId }}">
                                                                                            <label for="vehicle1"> {{ $promotes[$z]->PromoteId }}</label><br>
                                                                                        @endif
                                                                                    @endfor

                                                                                    {{-- @for ($z=0; $z < $promotetype->count(); $z++)
                                                                                        @for ($x=0; $x < $promotes->count(); $x++)
                                                                                            @if ($promotetype[$z]->Id == $promotes[$x]->BookId)
                                                                                                @if ($promotes[$x]->BookId != null)
                                                                                                        <input type="checkbox" checked id="vehicle1" name="vehicle1" value="{{ $promotetype[$z]->Id }}">
                                                                                                        <label for="vehicle1"> {{ $promotetype[$z]->Id }}</label><br>    
                                                                                                    @else
                                                                                                        <input type="checkbox" id="vehicle1" name="vehicle1" value="{{ $promotetype[$z]->Id }}">
                                                                                                        <label for="vehicle1"> {{ $promotetype[$z]->Id }}</label><br> 
                                                                                                @endif
                                                                                            @endif
                                                                                        @endfor --}}



                                                                                        {{-- @if ($promotetype[$z]->Id==$promotes[$i]->PromoteId)
                                                                                            @if ($promotes[$i]->BookId != null)
                                                                                                    <input type="checkbox" checked id="vehicle1" name="vehicle1" value="{{ $promotetype[$z]->Id }}">
                                                                                                    <label for="vehicle1"> {{ $promotetype[$z]->Id }}</label><br>    
                                                                                                @else
                                                                                                    <input type="checkbox" id="vehicle1" name="vehicle1" value="{{ $promotetype[$z]->Id }}">
                                                                                                    <label for="vehicle1"> {{ $promotetype[$z]->Id }}</label><br> 
                                                                                            @endif
                                                                                            
                                                                                        @endif --}}
                                                                                    {{-- @endfor --}}
                                                                            </div>
                                                                            <div id="chucnang"
                                                                                style="float: right; margin-left:20px">
                                                                                <button style="margin: 10px;" type="submit"
                                                                                    class="btn btn-primary">Trả lời</button>
                                                                                <button style="margin-right: 90px"
                                                                                    type="button" class="btn btn-secondary"
                                                                                    data-dismiss="modal">Đóng</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endfor
                                        </tr>
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

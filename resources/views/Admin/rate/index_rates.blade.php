@extends('Layouts.layout')
@section('title', 'Index Rates')

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


        .chucnang {
            float: right;
        }

        .chucnang button {
            margin: 20px;
        }

    </style>


    <div class="topnav">
        <a class="active" href="{{ route('index_rates') }}">Danh sách bình luận</a>
        <a href="{{ route('reply_rates') }}">Danh sách đã trả lời</a>
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
                                        <th>Tên khách hàng</th>
                                        <th>Tên sách</th>
                                        <th>Số sao</th>
                                        <th>Bình luận</th>
                                        <th style="width:100px">Trả lời</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < $rates->count(); $i++)
                                        @if ($rates[$i]->Status == 0)
                                            <tr>
                                                @for ($j = 0; $j < $array[0]->count(); $j++)
                                                    @if ($array[0][$j]->Id == $rates[$i]->AccountId)
                                                        <td>
                                                            {{ $array[0][$j]->Name }}
                                                        </td>
                                                    @endif
                                                @endfor
                                                @for ($k = 0; $k < $array[1]->count(); $k++)
                                                    @if ($array[1][$k]->Id == $rates[$i]->BookId)
                                                        <td>
                                                            {{ $array[1][$k]->Name }}
                                                        </td>
                                                    @endif
                                                @endfor

                                                @switch($rates[$i]->Star)
                                                    @case(1)
                                                        <td style="width: 150px">
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                        </td>
                                                    @break
                                                    @case(2)
                                                        <td style="width: 150px">
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                        </td>
                                                    @break
                                                    @case(3)
                                                        <td style="width: 150px">
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                        </td style="width: 150px">
                                                    @break
                                                    @case(4)
                                                        <td style="width: 150px">
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                        </td>
                                                    @break
                                                    @default
                                                        <td style="width: 150px">
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                                        </td>
                                                @endswitch
                                                <td>
                                                    {{ $rates[$i]->Comment }} <br>
                                                </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <a data-toggle="modal" data-target="#exampleModalLong"
                                                        style="cursor: pointer"><i style="font-size: 25px; color:tomato"
                                                            class="far fa-comment-dots"></i></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalLong" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLongTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        Trả lời</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST"
                                                                        action="{{ route('post_reply_rates', ['Id' => $rates[$i]->Id]) }}"
                                                                        enctype="multipart/form-data" id="form-reply"
                                                                        name="form-reply">
                                                                        @csrf
                                                                        <textarea style="padding: 20px" matInput rows="5"
                                                                            cols="40" name="noidungtxt"> </textarea><br>
                                                                        <div id="chucnang"
                                                                            style="float: right; margin-left:20px">
                                                                            <button style="margin: 10px;" type="submit"
                                                                                class="btn btn-primary">Trả lời</button>
                                                                            <button style="margin-right: 90px" type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Đóng</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endfor
                                </tbody>
                            </table>
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

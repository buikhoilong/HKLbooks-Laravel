@extends("Layouts.layout")
@section('title', 'Index Books')
@section('content')

    <style>
        #chuc_nang a {
            padding: 0px 20px 10px 0px;
        }

    </style>

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Danh sách các sách</strong>
                            <strong><a style="font-size: 20px;float: right;color:black" href="{{ route('add_book') }}"><i
                                        style="font-size: 25px; color:green" class="fas fa-plus-circle"></i> Thêm sách</a></strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th>Tên sách</th>
                                        <th>Giá tiền</th>
                                        <th style="width:120px">Số lượng</th>
                                        <th style="width:170px">Chức năng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @for ($i = 0; $i < $books->count(); $i++)
                                        <tr>
                                            <td>
                                                <img style="width:150px;height:200px;background-size: contain"
                                                    src="{{ asset('storage/admin/images/books/' . $books[$i]->ImgPath) }}"
                                                    alt="{{ $books[$i]->ImgPath }}">
                                            </td>
                                            <td style="font-size: 15px">{{ $books[$i]->Name }}</td>
                                            <td>{{ number_format($books[$i]->Price, 0, ',', '.') . ' VNĐ' }}</td>
                                            <td>{{ $books[$i]->Stock }}</td>
                                            <td id="chuc_nang" style="width: 130px">
                                                <a href="{{ route('detail_book', ['Id' => $books[$i]->Id]) }}"><i
                                                        style="color:midnightblue;" class="fas fa-eye"></i> Xem chi tiết</a><br><br>
                                                <a href="{{ route('edit_book', ['Id' => $books[$i]->Id]) }}"><i
                                                        style="color:rgb(233, 154, 8)" class="fas fa-edit"></i> Chỉnh sửa</a><br><br>
                                                <a href="{{ route('delete_book', ['Id' => $books[$i]->Id]) }}"> <i
                                                        style="color:rgb(223, 9, 9)" class="fas fa-trash"></i> Xóa</a><br><br>
                                            </td>
                                        </tr>
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

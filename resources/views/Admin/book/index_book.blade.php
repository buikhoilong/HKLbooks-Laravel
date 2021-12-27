@extends("Layouts.layout")
@section('title','Index Books')
@section("content")


<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Bảng sản phẩm</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Img</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>

                            <tbody>
                                @for ($i=0; $i < $books->count(); $i++)
                                    <tr>
                                        <td>{{ $books[$i]->Name }}</td>
                                        <td>{{ $books[$i]->Price }}</td>
                                        <td>{{ $books[$i]->Stock }}</td>
                                        <td>
                                            <img style="width:100px;height:100px" src="{{ asset('admin/images/'.$books[$i]->ImgPath)}}" alt="{{ $books[$i]->ImgPath}}">
                                        </td>
                                        <td>
                                            <button><a href="{{ route('detail_book',['id'=> $books[$i]->id]) }}">Chi tiết</a></button>
                                            <button><a href="{{ route('detail_book',['id'=> $books[$i]->id]) }}">Chỉnh Sửa</a></button>
                                            <button><a href="{{ route('detail_book',['id'=> $books[$i]->id]) }}">Xóa</a></button>
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
    <script src="{{ asset('admin/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/init/datatables-init.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
  } );
</script>



@endsection
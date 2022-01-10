@extends("Layouts.layout")
@section('title','Index Books')
@section("content")


<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"> Bảng sản phẩm</strong>
                        <strong ><a style="float: right;color:black" href="{{ route('add_book') }}"><i style="font-size: 35px; color:green" class="fas fa-plus-circle"></i></a></strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Img</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>

                            <tbody>
                                @for ($i=0; $i < $books->count(); $i++)
                                    <tr>
                                        <td>
                                            <img style="width:100px;height:100px" src="{{ asset('storage/admin/images/books/'.$books[$i]->ImgPath)}}" alt="{{ $books[$i]->ImgPath}}">
                                        </td>
                                        <td>{{ $books[$i]->Name }}</td>
                                        <td>{{ $books[$i]->Price }}</td>
                                        <td>{{ $books[$i]->Stock }}</td>
                                        <td>
                                            <button><a href="{{ route('detail_book',['Id'=> $books[$i]->Id]) }}"><i style="color:midnightblue" class="fas fa-eye"></i></a></button>
                                            <button><a href="{{ route('edit_book',['Id'=> $books[$i]->Id]) }}"><i style="color:rgb(233, 154, 8)" class="fas fa-edit"></i></a></button>
                                            <button><a href="{{ route('delete_book',['Id'=> $books[$i]->Id]) }}"> <i style="color:rgb(223, 9, 9)" class="fas fa-trash"></i></a></button>
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
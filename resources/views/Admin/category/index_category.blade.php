@extends("Layouts.layout")
@section('title','Index Category')
@section("content")

<style>
    #chuc_nang a {
        padding-left: 20px;
    }
</style>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Danh sách thể loại</strong>
                        <strong><a style="float: right" href="{{ route('add_category') }}"><i style="font-size: 35px; color:green" class="fas fa-plus-circle"></i></a></strong>
                        <strong><a style="color: black;padding: 20px" href="{{ route('edit_delete_category')}}">Thể loại đã xóa</a></strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width:100px">Mã Loại</th>
                                    <th>Tên Loại</th>
                                    <th>Mô Tả</th>
                                    <th style="width:140px">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i=0; $i < $category->count(); $i++)
                                    @if ($category[$i]->Status == 1)
                                    <tr>
                                        <td>{{ $category[$i]->Id }}</td>
                                        <td>{{ $category[$i]->Name }}</td>
                                        <td>{{ $category[$i]->Description }}</td>
                                        <td id="chuc_nang" style="width:100px">
                                            <a href="{{ route('edit_category',['Id'=> $category[$i]->Id]) }}"><i style="color:rgb(233, 154, 8)" class="fas fa-edit"></i></a>
                                            <a href="{{ route('delete_category',['Id'=> $category[$i]->Id]) }}"><i style="color:rgb(223, 9, 9)" class="fas fa-trash"></i></a>
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
    });
</script>
@endsection
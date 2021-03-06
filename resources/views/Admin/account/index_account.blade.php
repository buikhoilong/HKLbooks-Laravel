@extends('Layouts.layout')
@section('title','Index Account')
@section('content')
<style>
    #chuc_nang{
        width: 130px;
    }
    #chuc_nang a{
        padding: 0px 20px 10px 0px;
    }
</style>
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Danh sách tài khoản</strong>
                        <strong ><a style="font-size: 20px;float: right;color:black" href="{{ route('add_account') }}"><i style="font-size: 25px; color:green" class="fas fa-plus-circle"></i> Thêm tài khoản</a></strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th style="width:180px">Họ và tên</th>
                                    <th style="width:140px">Ngày sinh</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th style="width:120px">Email</th>
                                    <th style="width:190px">Chức năng</th>
                                </tr>
                            </thead>

                            <tbody>
                                @for ($i=0; $i < $accounts->count(); $i++)
                                    <tr>
                                        <td>{{ $accounts[$i]->Id }}</td>
                                        <td>{{ $accounts[$i]->Name }}</td>
                                        <td>{{ $accounts[$i]->Birthday }}</td>
                                        <td>{{ $accounts[$i]->Address }}</td>
                                        <td>{{ $accounts[$i]->Phone }}</td>
                                        <td>{{ $accounts[$i]->Email }}</td>
                                        <td id="chuc_nang">
                                            <a href="{{ route('detail_account',['Id'=> $accounts[$i]->Id]) }}"><i style="color:midnightblue" class="fas fa-eye"></i> Xem chi tiết</a><br><br>
                                            <a href="{{ route('edit_account',['Id'=> $accounts[$i]->Id]) }}"><i style="color:rgb(233, 154, 8)" class="fas fa-edit"></i> Chỉnh sửa</a><br><br>
                                            <a href="{{ route('delete_account',['Id'=> $accounts[$i]->Id]) }}"><i style="color:rgb(223, 9, 9)" class="fas fa-trash"></i> Xóa</a><br><br>
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
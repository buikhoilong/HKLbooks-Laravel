@extends('Layouts.layout')
@section('title','Index Account')
@section('content')
<style>
    #chuc_nang {
        width: 130px;
    }

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
                        <strong class="card-title">Danh sách tài khoản</strong>
                        <strong><a style="font-size: 20px;float: right;color:black" href="{{ route('add_account') }}"><i style="font-size: 25px; color:green" class="fas fa-plus-circle"></i> Thêm tài khoản</a></strong>
                    </div>
                    <div class="card-body table-responsive-sm">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:10%">Ảnh Đại diện</th>
                                    <th scope="col" class="text-break" style="width:5%;">Id</th>
                                    <th scope="col" style="width:20%">Họ và tên</th>
                                    <th scope="col" style="width:5%">Ngày sinh</th>
                                    <th scope="col" style="width:5%">Địa chỉ</th>
                                    <th scope="col" style="width:5%">Số điện thoại</th>
                                    <th scope="col" style="width:5%">Email</th>
                                    <th scope="col" style="width:25%">Chức năng</th>
                                </tr>
                            </thead>

                            <tbody>
                                @for ($i=0; $i < $accounts->count(); $i++)
                                    <tr>
                                        <th scope="row" class="align-middle">
                                            <img class="rounded-circle" style="width:100%" src="{{ asset('storage/admin/images/avatar/' . $accounts[$i]->Avatar) }}" alt="{{ $accounts[$i]->Avatar }}">
                                        </th>
                                        <td class="text-break align-middle">{{ $accounts[$i]->Id }}</td>
                                        <td class="align-middle">{{ $accounts[$i]->Name }}</td>
                                        <td class="align-middle">{{ $accounts[$i]->Birthday }}</td>
                                        <td class="align-middle">{{ $accounts[$i]->Address }}</td>
                                        <td class="align-middle"> {{ $accounts[$i]->Phone }}</td>
                                        <td class="align-middle">{{ $accounts[$i]->Email }}</td>
                                        <td id="chuc_nang" class="align-middle">
                                            <a href="{{ route('detail_account',['Id'=> $accounts[$i]->Id]) }}"><i style="color:midnightblue" class="fas fa-eye"></i> Chi tiết</a><br><br>
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
    });
</script>



@endsection
@extends('Layouts.layout')
@section('title','Index Orders')

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
    <a href="{{ route('index_orders') }}">Danh sách</a>
    <a href="{{ route('orders_processing') }}">Đơn hàng chờ xử lý</a>
    <a href="{{ route('delivery_orders') }}">Đơn hàng đang giao</a>
    <a href="{{ route('orders_delivered') }}">Đơn hàng đã giao</a>
    <a class="active" href="{{ route('orders_cancel') }}">Đơn hàng đã hủy</a>
  </div>


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

<style>
  #chuc_nang a{
        padding: 25px;
  }
</style>

<div class="content">
   <div class="animated fadeIn">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-body">
                       <table id="bootstrap-data-table" class="table table-striped table-bordered">
                           <thead>
                               <tr>
                                   <th>Mã đơn hàng</th>
                                   <th>Tên khách hàng</th>
                                   <th>Tổng tiền</th>
                                   <th style="width:100px">Chức năng</th>
                               </tr>
                           </thead>
                           <tbody>
                            @for ($i=0; $i < $oders->count(); $i++)
                            <tr>
                              @if ($oders[$i]->StatusId == 3)
                                <td> {{ $oders[$i]->Id }}</td>
                                @for ($y=0; $y < $accounts->count(); $y++)
                                    @if ($accounts[$y]->Id == $oders[$i]->AccountId)
                                      <td>{{ $accounts[$y]->Name }}</td>
                                    @endif
                                @endfor
                                <td>{{ 
                                  number_format(($oders[$i]->TotalMoney ), 0, ',', '.')." VNĐ"
                                  }}</td>
                                <td id="chuc_nang">
                                  <a href="{{ route('orders_lines',['Id' => $oders[$i]->Id]) }}"><i style="color:midnightblue" class="fas fa-eye"></i></a>
                                </td>
                              @endif
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




@endsection
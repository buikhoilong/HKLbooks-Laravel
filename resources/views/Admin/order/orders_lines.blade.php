@extends('Layouts.layout')
@section('title','Đơn hàng đang xử lý')

@section('content')
 
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

<div class="content">
  <div class="animated fadeIn">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div>
                    <strong><a href="{{ route('index_orders') }}">Quay Lại</a>  </strong>
                  </div>
                  <div class="card-header">
                      <strong class="card-title">Chi tiết đơn hàng {{ $order->Id }}</strong>
                  </div>
                  <div class="card-body">
                      <table id="bootstrap-data-table" class="table table-striped table-bordered">
                           <thead>
                               <tr>
                                    <th>Hình Ảnh</th>
                                   <th>Tên Sách</th>
                                   <th>Giá</th>
                                   <th>Số Lượng</th>
                               </tr>
                           </thead>
                           <tbody>
                              @for ($i=0; $i < $order_lines->count(); $i++)
                                @if ($order_lines[$i]->OrderId == $order->Id)
                                    @for ($y= 0; $y < $books->count(); $y++)
                                        @if ($books[$y]->Id == $order_lines[$i]->BookId)
                                    <tr>
                                        <td>
                                            <img style="width:100px;height:100px" src="{{ asset('storage/admin/images/books/'.$books[$y]->ImgPath)}}" alt="{{ $books[$y]->ImgPath}}">
                                        </td>
                                        <td> {{$books[$y]->Name }}</td>
                                        <td>{{ $books[$y]->Price }}</td>
                                        <td>{{ $order_lines[$i]->Quantity }}
                                            <div style="visibility: hidden">
                                                {{$total+= $books[$y]->Price * $order_lines[$i]->Quantity}}
                                            </div>
                                        </td>
                                  </tr>
                                  @endif
                                  @endfor
                                @endif
                              @endfor
                           </tbody>
                       </table>
                   </div>
                    <div style="margin: 0 30 0 0">
                        <strong style="color:red; font-size: 30px; float: right;"> 
                            Tổng Tiền: {{ $total }}
                        </strong>
                    </div>
               </div>
           </div>
       </div>
   </div><!-- .animated -->
</div><!-- .content -->





@endsection
@extends('Layouts.layout')
@section('title','Index Rates')

@section('content')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
#chuc_nang a{
  padding-left: 40px;
}
</style>


<div class="topnav">
    <a href="{{ route('index_rates') }}">Danh sách</a>
    <a class="active" href="{{ route('reply_rates') }}">Danh sách đã trả lời</a>
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
                                  <th style="width:170px">Tên khách hàng</th>
                                  <th>Tên sách</th>
                                  <th>Số sao</th>
                                  <th>Bình luận</th>
                                  <th>Trả lời</th>
                                  <th style="width:140px">Chức năng</th>
                              </tr>
                          </thead>
                          <tbody>
                              @for ($i=0; $i < $rates->count(); $i++)
                                @if ($rates[$i]->Status != 0 )
                                <tr>
                                  @for ($j=0; $j < $array[0]->count(); $j++)
                                     @if ($array[0][$j]->Id == $rates[$i]->AccountId)
                                         <td>
                                             {{ $array[0][$j]->Name }}
                                         </td>
                                     @endif
                                  @endfor
                                  @for ($k=0; $k < $array[1]->count(); $k++)
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
                                         {{ $rates[$i]->Reply }}
                                       </td>
                                   <td id="chuc_nang"> 
                                     <a href="{{ route('delete_rates',['Id'=> $rates[$i]->Id]) }}"><i style="color:rgb(223, 9, 9)" class="fas fa-trash"></i></a>
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
} );
</script>
@endsection
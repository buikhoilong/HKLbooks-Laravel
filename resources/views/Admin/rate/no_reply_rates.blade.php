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
</style>


<div class="topnav">
    <a class="active" href="{{ route('index_rates') }}">Danh sách bình luận</a>
    <a href="{{ route('reply_rates') }}">Đã hồi đáp</a>
    <a href="{{ route('no_reply_rates') }}">Chưa hồi đáp</a>
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

<div class="content">
  <div class="animated fadeIn">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <strong class="card-title">Bảng Thể Loại</strong>
                  </div>
                  <div class="card-body">
                      <table id="bootstrap-data-table" class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>Tên khách hàng</th>
                                  <th>Tên sách</th>
                                  <th>Số sao</th>
                                  <th>Bình Luận</th>
                                  {{-- <th>Trả lời</th> --}}
                              </tr>
                          </thead>
                          <tbody>
                              @for ($i=0; $i < $rates->count(); $i++)
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
                                        <td>
                                          <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                        </td>
                                         @break
                                       @case(2)
                                          <td>
                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                            <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                          </td>
                                         @break
                                       @case(3)
                                        <td>
                                          <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                          <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                          <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                        </td>
                                         @break
                                       @case(4)
                                        <td>
                                          <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                          <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                          <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                          <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                        </td>
                                         @break
                                       @default
                                       <td>
                                        <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                        <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                        <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                        <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                        <i style="color: rgb(228, 228, 4)" class="fas fa-star"></i>
                                      </td>
                                     @endswitch

                
                                    <td>
                                      <form  action="">
                                        <div style="display:block">
                                            {{ $rates[$i]->Comment }} <br>
                                            @if ($rates[$i]->Status == 0)
                                            <textarea></textarea><br>
                                            <input style="padding: 0 25px 0 20px" type="submit" value="Gửi" >
                                           @endif
                                        </div>
                                      </form>
                                    </td>


                                    {{-- <td>{{ $rates[$i]->Reply }}</td> --}}
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
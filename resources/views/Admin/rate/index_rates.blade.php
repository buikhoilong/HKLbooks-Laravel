@extends('Layouts.layout')
@section('title','Index Rates')

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
    <a class="active" href="{{ route('index_rates') }}">Danh sách</a>
    <a href="{{ route('reply_rates') }}">Danh sách đã trả lời</a>
    {{-- <a href="{{ route('no_reply_rates') }}">Đơn hàng đang giao</a> --}}
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
                                  <th>Bình luận</th>
                                  <th>Trả lời</th>
                              </tr>
                          </thead>
                          <tbody>
                              @for ($i=0; $i < $rates->count(); $i++)
                                @if ($rates[$i]->Status == 0)
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
                                       <button onclick="myFunction()"><i style="font-size: 25px; color:tomato" class="far fa-comment-dots"></i></button>
                                       <form method="POST" action="{{ route('post_reply_rates',['Id'=> $rates[$i]->Id]) }}" enctype="multipart/form-data" style="visibility: hidden" id="form-reply" name="form-reply" >
                                        @csrf 
                                        <textarea name="noidungtxt"> </textarea><br>
                                          <button style="padding: 0 25px 0 20px" type="submit"><i style="color: blue" class="far fa-paper-plane"></i></button>
                                       </form>
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


@endsection
<script>
  function myFunction() {
    var x = document.getElementById('form-reply');
    if (x.style.visibility === 'visible') {
      x.style.visibility = 'hidden';
    } else {
      x.style.visibility = 'visible';
    }
  }

</script>
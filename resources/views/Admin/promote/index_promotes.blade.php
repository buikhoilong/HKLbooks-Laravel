@extends('Layouts.layout')
@section('title','Index Promotes')

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
    <a class="active" href="{{ route('index_promote') }}">Danh sách</a>
    <a href="{{ route('new_promote') }}">Sách mới</a>
    <a href="{{ route('popular_promote') }}">Sách phổ biến</a>
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
                  <div class="card-body">
                      <table id="bootstrap-data-table" class="table table-striped table-bordered">
                          <thead>
                              <tr>
                                  <th>Tên sách</th>
                                  <th>Trạng thái</th>
                              </tr>
                          </thead>
                          <tbody>
                              @for ($i=0; $i < $promotes->count(); $i++)
                                  <tr>
                                      @for ($y=0; $y < $books->count(); $y++)
                                          @if ($books[$y]->Id == $promotes[$i]->BookId)
                                              <td>{{ $books[$y]->Name }}</td>
                                          @endif
                                      @endfor
                                      <td>{{ $promotes[$i]->Id }}</td>
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
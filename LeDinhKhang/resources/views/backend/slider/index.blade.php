@extends('layouts.admin')
@section('title','Danh sách Slider ')
@section('header')
         <link rel="stylesheet" href="{{asset('template/jquery.dataTables.min.css')}}"> 
@endsection

@section('footer')
    <script src="{{asset('template/jquery.dataTables.min.js')}}"></script>
    <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );
    </script>
@endsection

@section('maincontent')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <strong class="text-danger">DANH SÁCH SLIDER</strong>
                </div>
                <div class="col-md-6 text-right">
                  <a href="{{ route('slider.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i>    Thêm</a>
                  <a href="{{ route('slider-trash') }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>    Thùng rác</a>

                </div>

            </div>
          


        </div>
        <div class="card-body">
            @includeIf('backend.message')
            <table class="table table-striped table-bordered" id="myTable">
                <thead>
                    <tr class="bg-info">
                        <th class="text-center" style="width:20px">#</th>
                        <th class="text-center" style="width:50px">Hình</th>
                        <th class="text-center" style="width:200px">Tên Slider</th>
                        <th class="text-center"style="width:160px">URL</th>
                        <th class="text-center" style="width:120px">Ngày tạo</th>
                        <th class="text-center" style="width:150px">Chức năng</th>
                        <th class="text-center" style="width:10px" >ID</th>

                    </tr>
                    
                </thead>
                <tbody> 
                        @foreach ($list as $row )
                            

                    <tr>
                        <td class="text-center">
                            <input type="checkbox" name="checkboxid" value="">
                        </td>
                        <td><img src="{{ asset('images/slider/' .$row->img) }}" class="img-fluid" alt="img"></td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->url }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td class="text-center">
                            @if($row->status==1)
                            <a href="{{ route('slider.status',['id'=>$row->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-toggle-on"></i> </a>
                            @else
                            <a href="{{ route('slider.status',['id'=>$row->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-toggle-off"></i> </a>
                            @endif
                            <a href="{{ route('slider.show',['slider'=>$row->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> </a>
                            <a href="{{ route('slider.edit',['slider'=>$row->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('slider.deltrash',['id'=>$row->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                        <td class="text-center">{{ $row->id }}</td>
                    </tr>
                    @endforeach

                    <!--/.tr-->
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection
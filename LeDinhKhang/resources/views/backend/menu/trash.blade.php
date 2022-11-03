@extends('layouts.admin')
@section('title','Thùng rác Menu')
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
                    <strong class="text-danger">THÙNG RÁC MENU</strong>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('menu.index')}}" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Về danh sách</a>

                </div>

            </div>
          


        </div>
        <div class="card-body">
            @includeIf('backend.message')
            <table class="table table-striped table-bordered" id="myTable">
                <thead>
                    <tr class="bg-info">
                        <th class="text-center" style="width:20px">#</th>
                        <th class="text-center">Tên Menu</th>
                        <th class="text-center">Liên kết</th>
                        <th class="text-center">Loại menu</th>
                        <th class="text-center">Vị trí</th>
                        <th class="text-center" style="width:170px">Chức năng</th>
                        <th class="text-center" style="width:30px">ID</th>

                    </tr>
                    
                </thead>
                <tbody> 
                     @foreach ($list as $row )
                            

                    <tr>
                        <td class="text-center">
                            <input type="checkbox" name="checkboxid" value="">
                        </td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->link }}</td>
                        <td>{{ $row->type }}</td>
                        <td>{{ $row->position }}</td>
                        <td class="text-center">
                            <form action="{{ route('menu.destroy',['menu'=>$row->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                            <a href="{{ route('menu.retrash',['id'=>$row->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-undo-alt"></i></a>
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
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
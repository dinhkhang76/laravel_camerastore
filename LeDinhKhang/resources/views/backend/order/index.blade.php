@extends('layouts.admin')
@section('title','Tất cả đơn hàng')
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
                    <strong class="text-danger">TẤT CẢ ĐƠN HÀNG</strong>
                </div>
                <div class="col-md-6 text-right">
                  <a href="{{ route('order-trash') }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>    Thùng rác</a>

                </div>

            </div>
          


        </div>
        <div class="card-body">
            @includeIf('backend.message')
            <table class="table table-striped table-bordered" id="myTable">
                <thead>
                    <tr class="bg-info">
                        <th class="text-center" style="width:10px">#</th>
                        <th class="text-center" style="width:170px" >Họ tên</th>
                        <th class="text-center" style="width:150px">Email</th>
                        <th class="text-center"style="width:50px">Điện thoại</th>
                        <th class="text-center"style="width:200px">Điạ chỉ</th>                     
                        <th class="text-center"style="width:5px">Mã đơn hàng</th>
                        <th class="text-center"style="width:5px">Mã sản phẩm</th>
                        <th class="text-center"style="width:5px">Số lượng</th>
                        <th class="text-center"style="width:150px">Thành tiền</th>
                        <th class="text-center"style="width:150px">Ghi chú</th>
                        <th class="text-center" style="width:0px">Ngày tạo</th>
                        <th class="text-center" style="width:100px">Chức năng</th>
                        {{-- <th class="text-center" style="width:10px">ID</th> --}}

                    </tr>
                    
                </thead>
                <tbody> 
                        @foreach ($list as $row )
                            
                    <tr>
                        <td class="text-center">
                            <input type="checkbox" name="checkboxid" value="">
                        </td>
                        
                        <td>{{ $row->fullname }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->address }}</td>
                        <td class="text-center">{{ $row->orderid }}</td>
                        <td class="text-center">{{ $row->productid }}</td>
                        <td class="text-center">{{ $row->number }}</td>
                        <td class="text-center">{{ number_format($row->amount) }}đ</td>
                        <td class="text-center">{{ $row->note }}</td>
                        <td>{{ $row->created_at }}</td>
                        <td class="text-center">
                            {{-- @if($row->status==1)
                            <a href="{{ route('order.status',['id'=>$row->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-toggle-on"></i> </a>
                            @else
                            <a href="{{ route('order.status',['id'=>$row->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-toggle-off"></i> </a>
                            @endif --}}
                            <a href="{{ route('order.show',['order'=>$row->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> </a>
                            {{-- <a href="{{ route('order.edit',['order'=>$row->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a> --}}
                            <a href="{{ route('order.deltrash',['id'=>$row->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                        {{-- <td class="text-center">{{ $row->id }}</td> --}}
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
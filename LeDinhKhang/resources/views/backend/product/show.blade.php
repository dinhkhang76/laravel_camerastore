@extends('layouts.admin')
@section('title','Chi tiết danh mục sản phẩm ')
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
                    <strong class="text-danger">CHI TIẾT DANH MỤC</strong>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('product.index')}}" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Về danh sách</a> 
                </div>

            </div>
          

            
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Tên trường</th>
                    <th>Giá trị</th>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>{{ $product->id }}</td>
                </tr>
                <tr>
                    <td>Tên sản phẩmng</td>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <td>Slug</td>
                    <td>{{ $product->slug }}</td>
                </tr>
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
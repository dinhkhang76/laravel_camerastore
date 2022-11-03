@extends('layouts.admin')
@section('title','Chi tiết Slider ')
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
                    <strong class="text-danger">CHI TIẾT SLIDER</strong>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{route('slider.index')}}" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Về danh sách</a> 
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
                    <td>{{ $slider->id }}</td>
                </tr>
                <tr>
                    <td>Tên danh mục</td>
                    <td>{{ $slider->name }}</td>
                </tr>
                <tr>
                    <td>URL</td>
                    <td>{{ $slider->url }}</td>
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
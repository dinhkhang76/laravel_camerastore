@extends('layouts.admin')
@section('title','Quản lý Menu')

@section('maincontent')
<form name="form1" action="{{ route('menu.store') }}" method="POST">
    @csrf

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <strong class="text-danger">QUẢN LÝ MENU</strong>
                </div>
                <div class="col-md-6 text-right">

                  <a href="{{ route('menu-trash') }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>    Thùng rác</a>

                </div>

            </div>
          


        </div>
        <div class="card-body">
            @includeIf('backend.message')
            <div class="row">
                <div class="col-md-3">
                    <div class="accordion" id="accordionExample">

                        <div class="card">
                            <div class="card-header" id="headingPosition">
                                <select name="position" class="form-control">
                                    <option value="mainmenu">Main Menu</option>
                                    <option value="footermenu">Footer Menu</option>
                                    <option value="rightmenu">Right Menu</option>
                                </select>
                              
                            </div>

                            <div id="collapseCategory" class="collapse p-2 m-2" aria-labelledby="headingPosition" data-parent="#accordionExample">
                                    @foreach ($list_category as $category)
                                    <fieldset class="form-group">
                                        <input name="nameCategory[]" value="{{ $category->id }}" id="category{{ $category->id }}" type="checkbox">
                                        <label for="category{{ $category->id }}">{{ $category->name }}</label>
                                    </fieldset> 
                                    @endforeach
                                              

                                   <fieldset class="form-group">
                                    <input type="submit" name="ThemCategory" value="Thêm" class="btn btn-success form-control">
                                </fieldset>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingCategory">
                                <span>Danh mục sản phẩm</span>
                                <span class="float-right btn btn-sm btn-info" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                                    <i class="fas fa-plus"></i>
                                </span>

                            </div>

                            <div id="collapseCategory" class="collapse p-2 m-2" aria-labelledby="headingCategory" data-parent="#accordionExample">
                                    @foreach ($list_category as $category)
                                    <fieldset class="form-group">
                                        <input name="nameCategory[]" value="{{ $category->id }}" id="category{{ $category->id }}" type="checkbox">
                                        <label for="category{{ $category->id }}">{{ $category->name }}</label>
                                    </fieldset> 
                                    @endforeach
                                              

                                   <fieldset class="form-group">
                                    <input type="submit" name="ThemCategory" value="Thêm" class="btn btn-success form-control">
                                </fieldset>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTopic">
                                <span>Chủ đề bài viết</span>
                                <span class="float-right btn btn-sm btn-info" data-toggle="collapse" data-target="#collapseTopic" aria-expanded="true" aria-controls="collapseTopic">
                                    <i class="fas fa-plus"></i>
                                </span>

                            </div>

                            <div id="collapseTopic" class="collapse p-2 m-2" aria-labelledby="headingTopic" data-parent="#accordionExample">
                                @foreach ($list_topic as $topic)
                                    <fieldset class="form-group">
                                        <input name="nameTopic[]" value="{{ $topic->id }}" id="topic{{ $topic->id }}" type="checkbox">
                                        <label for="topic{{ $topic->id }}">{{ $topic->name }}</label>
                                    </fieldset>
                                 @endforeach                                   <fieldset class="form-group">
                                <fieldset class="form-group">
                                    <input type="submit" name="ThemTopic" value="Thêm" class="btn btn-success form-control">
                                </fieldset>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingPage">
                                <span>Trang đơn</span>
                                <span class="float-right btn btn-sm btn-info" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
                                    <i class="fas fa-plus"></i>
                                </span>

                            </div>

                            <div id="collapsePage" class="collapse p-2 m-2" aria-labelledby="headingPage" data-parent="#accordionExample">
                                @foreach ($list_page as $page)
                                    <fieldset class="form-group">
                                        <input name="namePage[]" value="{{ $page->id }}" id="Page{{ $page->id }}" type="checkbox">
                                        <label for="Page{{ $page->id }}">{{ $page->title }}</label>
                                    </fieldset>
                                @endforeach
                                <fieldset class="form-group">
                                    <input type="submit" name="ThemPage" value="Thêm" class="btn btn-success form-control">
                                </fieldset>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingSupplier">
                                <span>Nhà cung cấp</span>
                                <span class="float-right btn btn-sm btn-info" data-toggle="collapse" data-target="#collapseSupplier" aria-expanded="true" aria-controls="collapseSupplier">
                                    <i class="fas fa-plus"></i>
                                </span>

                            </div>

                            <div id="collapseSupplier" class="collapse p-2 m-2" aria-labelledby="headingSupplier" data-parent="#accordionExample">
                                @foreach ($list_supplier as $supplier)
                                    <fieldset class="form-group">
                                        <input name="nameSupplier[]" value="{{ $supplier->id }}" id="Supplier{{ $supplier->id }}" type="checkbox">
                                        <label for="Supplier{{ $supplier->id }}">{{ $supplier->name }}</label>
                                    </fieldset>
                                @endforeach
                                <fieldset class="form-group">
                                    <input type="submit" name="ThemSupplier" value="Thêm" class="btn btn-success form-control">
                                </fieldset>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingCustom">
                                <span>Tùy chỉnh</span>
                                <span class="float-right btn btn-sm btn-info" data-toggle="collapse" data-target="#collapseCustom" aria-expanded="true" aria-controls="collapseCustom">
                                    <i class="fas fa-plus"></i>
                                </span>

                            </div>

                            <div id="collapseCustom" class="collapse p-2 m-2" aria-labelledby="headingCustom" data-parent="#accordionExample">
                                <fieldset class="form-group">
                                    <label>Tên menu</label>
                                    <input name="name" class="form-control" id="checkid" type="text">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label>Liên kết</label>
                                    <input name="link" class="form-control" type="text">
                                </fieldset>
                                <fieldset class="form-group">
                                    <input type="submit" name="ThemCustom" value="Thêm" class="btn btn-success form-control">
                                </fieldset>
                            </div>
                        </div>
                    </div>-
                </div>
                <div class="col-md-9">
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
                                    @if($row->status==1)
                                    <a href="{{ route('menu.status',['id'=>$row->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-toggle-on"></i> </a>
                                    @else
                                    <a href="{{ route('menu.status',['id'=>$row->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-toggle-off"></i> </a>
                                    @endif
                                    <a href="{{ route('menu.show',['menu'=>$row->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> </a>
                                    <a href="{{ route('menu.edit',['menu'=>$row->id]) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('menu.deltrash',['id'=>$row->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                                <td class="text-center">{{ $row->id }}</td>
                            </tr>
                            @endforeach
        
                            <!--/.tr-->
                        </tbody>
                    </table>
        
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</form>
@endsection
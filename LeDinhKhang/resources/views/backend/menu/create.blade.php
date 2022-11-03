@extends('layouts.admin')
@section('title','Thêm danh mục sản phẩm ')
@section('maincontent')

<form name="form1" action="{{ route('category.store') }}" method="POST">
    @csrf
 <div class="content-wrapper">
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0 font-weight-bold text-danger">THÊM DANH MỤC SẢN PHẨM</h1>
                 </div>            
                 <div class="col-sm-6 text-right">
                     <button class="btn btn-sm btn-success" type="submit"><i class="fas fa-save"></i> Lưu(Thêm)</button>
                     <a href="{{route('category.index')}}" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Về danh sách</a>
                 </div>
             </div>
         </div>
     </div>
         {{-- content header --}}
         
         {{-- Main content --}}
         <section class="content">
             <div class="container-fluid p-3">
                 <div class="row">
                     <div class="col-md-9">
                         <div class="form-group">
                             <label for="nameCategory">Tên danh mục sản phẩm</label>
                             <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="nameCategory" placeholder="Nhập tên danh mục sản phẩm">
                             @if($errors->has('name'))
                             <span class="text-danger">{{$errors->first('name')}}</span>
                             @endif
                         </div>
                         <div class ="form-group">
                             <label for="metadesc">Mô tả</label>
                             <textarea name="metadesc" rows="3" class="form-control" id="metadesc" placeholder="Mô tả">{{ old('name') }}</textarea>
                             @if($errors->has('metadesc'))
                             <span class="text-danger">{{$errors->first('metadesc')}}</span>
                             @endif
                             
                         </div>
                         <div class ="form-group">
                            <label for="metakey">Từ khóa</label>
                            <textarea name="metakey" rows="3" class="form-control" id="metakey" placeholder="Từ khóa">{{ old('name') }}</textarea>
                            @if($errors->has('metakey'))
                                    <span class="text-danger">{{$errors->first('metakey')}}</span>
                             @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                         <div class="form-group">
                            <label for="parentid">Cấp cha</label>
                            <select class="form-control" name="parentid" id ="parentid">
                                <option value="0">Cấp cha</option>
                                @foreach ($list_category as $category)
                                     <option value="{{$category->id}}">{{$category->name}}</option> 
                                @endforeach
                            </select>
                         </div>
                         <div class="form-group">
                             <label for="orders">Sắp xếp</label>
                             <select class="form-control" name="orders" id="orders">
                                 <option value="0">Sắp xếp</option>
                                 @foreach ($list_category as $category)
                                    <option value="{{$category->orders}}">Sau:{{$category->name}}</option> 
                                @endforeach
                             </select>
                         </div>
                         <div class="form-group">
                            <label for="orders">Trạng thái</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1">Xuất bản</option>
                                <option value="2">Chưa xuất bản</option>
                            </select>
                        </div>
                            
                     </div>
                 </div>
             </div>
         </section>


 </div>
</form>
@endsection
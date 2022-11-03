@extends('layouts.admin')
@section('title','Cập nhật Slider')
@section('maincontent')

<form name="form1" action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
 <div class="content-wrapper">
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0 font-weight-bold text-danger">CẬP NHẬT SLIDER</h1>
                 </div>            
                 <div class="col-sm-6 text-right">
                     <button class="btn btn-sm btn-success" type="submit"><i class="fas fa-save"></i> Lưu(Sửa)</button>
                     <a href="{{route('slider.index')}}" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Về danh sách</a>
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
                             <label for="name">Tên Slider</label>
                             <input name="name" value="{{ old('name',$slider->name) }}" type="text" class="form-control" id="name" placeholder="Nhập tên slider">
                             @if($errors->has('name'))
                             <span class="text-danger">{{$errors->first('name')}}</span>
                             @endif
                         </div>

                            <div class="form-group">
                                <label for="url">URL</label>
                                <input name="url" value="{{ old('url',$slider->url) }}" type="url" class="form-control" id="url" placeholder="URL">
                                @if($errors->has('url'))
                                <span class="text-danger">{{$errors->first('url')}}</span>
                                @endif
                            </div>

                        </div>


                     <div class="col-md-3">
                        <div class="form-group">
                            <label for="img">Hình</label>
                            <input name="img" value="{{ old('img') }}" type="file" class="form-control" id="img" placeholder="img">
                            @if($errors->has('img'))
                            <span class="text-danger">{{$errors->first('img')}}</span>
                            @endif
                        </div>
                         
                        
                         <div class="form-group">
                            <label for="orders">Trạng thái</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1">Xuất bản</option>
                                <option value="2">Chưa xuất bản</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="position">Vị trí</label>
                            <select class="form-control" name="status" id="status">
                                <option value="slideshow">SlideShow</option>
                                <option value="ads">Quảng cáo</option>
                            </select>
                        </div>
                            
                     </div>
                 </div>
             </div>
         </section>


 </div>
</form>
@endsection
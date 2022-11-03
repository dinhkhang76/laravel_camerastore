@extends('layouts.admin')
@section('title','Cập nhật sản phẩm ')
@section('maincontent')

<form name="form1" action="{{ route('order.update', ['order'=>$order->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
 <div class="content-wrapper">
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0 font-weight-bold text-danger">CẬP NHẬT SẢN PHẨM</h1>
                 </div>            
                 <div class="col-sm-6 text-right">
                     <button class="btn btn-sm btn-success" type="submit"><i class="fas fa-save"></i> Lưu(Sửa)</button>
                     <a href="{{route('product.index')}}" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Về danh sách</a>
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
                             <label for="nameproduct">Tên sản phẩm</label>
                             <input name="name" value="{{ old('name',$order->orderid) }}" type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm">
                             @if($errors->has('name'))
                             <span class="text-danger">{{$errors->first('name')}}</span>
                             @endif
                         </div>
                         <div class ="form-group">
                            <label for="detail">Chi tiết</label>
                            <textarea name="detail" rows="3" class="form-control" id="detail" placeholder="Chi tiết">{{ old('detail',$order->fullname) }}</textarea>
                            @if($errors->has('detail'))
                            <span class="text-danger">{{$errors->first('detail')}}</span>
                            @endif
                            
                        </div>
                         <div class ="form-group">
                             <label for="metadesc">Mô tả</label>
                             <textarea name="metadesc" rows="3" class="form-control" id="metadesc" placeholder="Mô tả">{{ old('metadesc',$order->productid) }}</textarea>
                             @if($errors->has('metadesc'))
                             <span class="text-danger">{{$errors->first('metadesc')}}</span>
                             @endif
                             
                         </div>
                         <div class ="form-group">
                            <label for="metakey">Từ khóa</label>
                            <textarea name="metakey" rows="3" class="form-control" id="metakey" placeholder="Từ khóa">{{ old('metakey',$order->amount) }}</textarea>
                            @if($errors->has('metakey'))
                                    <span class="text-danger">{{$errors->first('metakey')}}</span>
                             @endif
                        </div>
                     </div>
                     


                         <div class="form-group">
                            <label for="orders">Trạng thái</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                                <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                            </select>
                            
                        </div>
                            
                     </div>
                 </div>
             </div>
         </section>


 </div>
</form>
@endsection
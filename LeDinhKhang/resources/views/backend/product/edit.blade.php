@extends('layouts.admin')
@section('title','Cập nhật sản phẩm ')
@section('footer')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('detail');
    </script>
@endsection

@section('maincontent')

<form name="form1" action="{{ route('product.update', ['product'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
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
                             <input name="name" value="{{ old('name',$product->name) }}" type="text" class="form-control" id="name" placeholder="Nhập tên sản phẩm">
                             @if($errors->has('name'))
                             <span class="text-danger">{{$errors->first('name')}}</span>
                             @endif
                         </div>
                         <div class ="form-group">
                            <label for="detail">Chi tiết</label>
                            <textarea name="detail" rows="3" class="form-control" id="detail" placeholder="Chi tiết">{{ old('detail',$product->detail) }}</textarea>
                            @if($errors->has('detail'))
                            <span class="text-danger">{{$errors->first('detail')}}</span>
                            @endif
                            
                        </div>
                         <div class ="form-group">
                             <label for="metadesc">Mô tả</label>
                             <textarea name="metadesc" rows="3" class="form-control" id="metadesc" placeholder="Mô tả">{{ old('metadesc',$product->metadesc) }}</textarea>
                             @if($errors->has('metadesc'))
                             <span class="text-danger">{{$errors->first('metadesc')}}</span>
                             @endif
                             
                         </div>
                         <div class ="form-group">
                            <label for="metakey">Từ khóa</label>
                            <textarea name="metakey" rows="3" class="form-control" id="metakey" placeholder="Từ khóa">{{ old('metakey',$product->metakey) }}</textarea>
                            @if($errors->has('metakey'))
                                    <span class="text-danger">{{$errors->first('metakey')}}</span>
                             @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                         <div class="form-group">
                            <label for="catid">Danh mục sản phẩm</label>
                            <select class="form-control" name="catid" id ="catid">
                                <option value="">Chọn danh mục sản phẩm</option>
                                @foreach ($list_category as $category)
                                @if($category->id==$product->catid)
                                <option selected value="{{$category->id}}">{{$category->name}}</option> 
                                @else
                                <option value="{{$category->id}}">{{$category->name}}</option> 
                                @endif

                                @endforeach
                            </select>
                            @if($errors->has('catid'))
                                    <span class="text-danger">{{$errors->first('catid')}}</span>
                             @endif
                         </div>
                         <div class="form-group">
                             <label for="suppid">Nhà cung cấp</label>
                             <select class="form-control" name="suppid" id="suppid">
                                 <option value="">Nhà cung cấp</option>
                                 @foreach ($list_supplier as $supplier)
                                 @if ($supplier->id==$product->suppid)
                                 <option selected value="{{$supplier->id}}">{{$supplier->name}}</option> 
                                 @else
                                 <option value="{{$supplier->id}}">{{$supplier->name}}</option> 
 
                                 @endif
                                @endforeach
                             </select>
                             @if($errors->has('suppid'))
                                    <span class="text-danger">{{$errors->first('suppid')}}</span>
                             @endif
                         </div>

                         <div class="form-group">
                            <label for="number">Số lượng</label>
                            <input name="number" value="{{ old('number',$product->number) }}" type="number", min="1" class="form-control" id="number">
                            @if($errors->has('number'))
                            <span class="text-danger">{{$errors->first('number')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input name="price" value="{{ old('price',$product->price) }}" type="number", min="10000" class="form-control" id="price" >
                            @if($errors->has('price'))
                            <span class="text-danger">{{$errors->first('price')}}</span>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="pricesale">Giá khuyến mãi</label>
                            <input name="pricesale" value="{{ old('pricesale',$product->pricesale) }}" type="number", min="10000" class="form-control" id="pricesale">
                           
                        </div>

                        <div class="form-group">
                            <label for="img">Hình ảnh</label>
                            <input name="img" type="file" class="form-control" id="img">
                            @if(session('imgerror'))
                            <span class="text-danger">{{session('imgerror')}}</span>
                            @endif

                            @if($errors->has('img'))
                            <span class="text-danger">{{$errors->first('img')}}</span>
                            @endif
                          
                        </div>



                         <div class="form-group">
                            <label for="orders">Trạng thái</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                                <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                            </select>
                            
                        </div>
                            
                     </div>
                 </div>
             </div>
         </section>


 </div>
</form>
@endsection
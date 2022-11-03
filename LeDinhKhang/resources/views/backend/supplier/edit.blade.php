@extends('layouts.admin')
@section('title','Cập nhật nhà cung cấp ')
@section('maincontent')

<form name="form1" action="{{ route('supplier.update',['supplier'=>$supplier->id]) }}" method="POST" enctype="multipart/form-data">
  @method('PUT')
    @csrf
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 font-weight-bold text-danger">CẬP NHẬT NHÀ CUNG CẤP</h1>
                    </div>            
                    <div class="col-sm-6 text-right">
                        <button class="btn btn-sm btn-success" type="submit"><i class="fas fa-save"></i> Lưu(Sửa)</button>
                        <a href="{{route('supplier.index')}}" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Về danh sách</a>
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
                                <label for="name">Tên nhà cung cấp</label>
                                <input name="name" value="{{ old('name',$supplier->name) }}" type="text" class="form-control" id="name" placeholder="Nhập tên nhà cung cấp">
                                @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
   
                               <div class="form-group">
                                   <label for="siteurl">Website</label>
                                   <input name="siteurl" value="{{ old('siteurl',$supplier->siteurl) }}" type="url" class="form-control" id="siteurl" placeholder="Website">
                                   @if($errors->has('siteurl'))
                                   <span class="text-danger">{{$errors->first('siteurl')}}</span>
                                   @endif
                               </div>
   
                                   <div class="form-group">
                                       <label for="logo">LOGO</label>
                                       <input name="logo" value="{{ old('logo') }}" type="file" class="form-control" id="logo" placeholder="logo">
                                       @if($errors->has('logo'))
                                       <span class="text-danger">{{$errors->first('logo')}}</span>
                                       @endif
                                   </div>
   
                                   <div class="form-group">
                                       <label for="address">Địa chỉ</label>
                                       <input name="address" value="{{ old('address',$supplier->address) }}" type="text" class="form-control" id="address" placeholder="Nhập địa chỉ">
                                       @if($errors->has('address'))
                                       <span class="text-danger">{{$errors->first('address')}}</span>
                                       @endif
                                   </div>
   
                            <div class ="form-group">
                                <label for="metadesc">Mô tả</label>
                                <textarea name="metadesc" rows="3" class="form-control" id="metadesc"  placeholder="Mô tả">{{ old('metadesc',$supplier->metadesc) }}</textarea>
                                @if ($errors->has('metadesc'))
                                   <span class="text-danger">{{ $errors->first('metadesc') }}</span>
                                @endif                         
                            </div>
                            
                            <div class ="form-group">
                               <label for="metakey">Từ khóa</label>
                               <textarea name="metakey" rows="3" class="form-control" id="metakey" placeholder="Từ khóa">{{ old('metakey',$supplier->metakey) }}</textarea>
                               @if($errors->has('metakey'))
                                       <span class="text-danger">{{$errors->first('metakey')}}</span>
                                @endif
                           </div>
                        </div>
                        <div class="col-md-3">
                            
                           <div class="form-group">
                               <label for="fullname">Tên người đại diện</label>
                               <input name="fullname" value="{{ old('fullname',$supplier->fullname) }}" type="text" class="form-control" id="fullname" placeholder="Nhập tên người đại diện">
                               @if($errors->has('fullname'))
                               <span class="text-danger">{{$errors->first('fullname')}}</span>
                               @endif
                           </div>
   
                           <div class="form-group">
                               <label for="phone">Điện thoại</label>
                               <input name="phone" value="{{ old('phone',$supplier->phone) }}" type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại">
                               @if($errors->has('phone'))
                               <span class="text-danger">{{$errors->first('phone')}}</span>
                               @endif
                           </div>
   
                           <div class="form-group">
                               <label for="email">Email</label>
                               <input name="email" value="{{ old('email',$supplier->email) }}" type="email" class="form-control" id="email" placeholder="Nhập Email">
                               @if($errors->has('email'))
                               <span class="text-danger">{{$errors->first('email')}}</span>
                               @endif
                           </div>
   
                            <div class="form-group">
                               <label for="orders">Trạng thái</label>
                               <select class="form-control" name="status" id="status">
                                <option value="1" @php echo($supplier->status==1)?'selected':'';@endphp>Xuất bản</>
                                 <option value="2" @php echo($supplier->status==2)?'selected':'';@endphp>Chưa xuất bản</option>
                                </select>
                           </div>
                               
                        </div>
                    </div>
                </div>
            </section>
   
   
    </div>
</form>
@endsection
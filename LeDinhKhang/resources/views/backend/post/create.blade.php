@extends('layouts.admin')
@section('title','Thêm bài viết ')
@section('footer')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('detail');
    </script>
@endsection
@section('maincontent')

<form name="form1" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
 <div class="content-wrapper">
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0 font-weight-bold text-danger">THÊM BÀI VIẾT</h1>
                 </div>            
                 <div class="col-sm-6 text-right">
                     <button class="btn btn-sm btn-success" type="submit"><i class="fas fa-save"></i> Lưu(Thêm)</button>
                     <a href="{{route('post.index')}}" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Về danh sách</a>
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
                             <label for="title">Tiêu đề bài viết</label>
                             <input name="title" value="{{ old('title') }}" type="text" class="form-control" id="title" placeholder="Nhập tiêu đề bài viết">
                             @if($errors->has('title'))
                             <span class="text-danger">{{$errors->first('title')}}</span>
                             @endif
                         </div>
                         <div class ="form-group">
                            <label for="detail">Chi tiết bài viết</label>
                            <textarea name="detail" rows="3" class="form-control" id="detail" placeholder="Chi tiết">{{ old('detail') }}</textarea>
                            @if($errors->has('detail'))
                            <span class="text-danger">{{$errors->first('detail')}}</span>
                            @endif
                            
                        </div>
                         <div class ="form-group">
                             <label for="metadesc">Mô tả</label>
                             <textarea name="metadesc" rows="3" class="form-control" id="metadesc" placeholder="Mô tả">{{ old('metadesc') }}</textarea>
                             @if($errors->has('metadesc'))
                             <span class="text-danger">{{$errors->first('metadesc')}}</span>
                             @endif
                             
                         </div>
                         <div class ="form-group">
                            <label for="metakey">Từ khóa</label>
                            <textarea name="metakey" rows="3" class="form-control" id="metakey" placeholder="Từ khóa">{{ old('metakey') }}</textarea>
                            @if($errors->has('metakey'))
                                    <span class="text-danger">{{$errors->first('metakey')}}</span>
                             @endif
                        </div>
                     </div>
                     <div class="col-md-3">
                         <div class="form-group">
                            <label for="topid">Chủ đề bài viết</label>
                            <select class="form-control" name="topid" id ="topid">
                                <option value="">Chọn chủ đề bài viết</option>
                                @foreach ($list_topic as $topic)
                                     <option value="{{$topic->id}}">{{$topic->name}}</option> 
                                @endforeach
                            </select>
                            @if($errors->has('topid'))
                                    <span class="text-danger">{{$errors->first('topid')}}</span>
                             @endif
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
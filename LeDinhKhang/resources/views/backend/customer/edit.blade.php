@extends('layouts.admin')
@section('title','Cập nhập khách hàng')
@section('maincontent')

<form name="form1" action="{{route('customer.update',['customer' => $user->id])}} " method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-danger">CẬP NHẬP KHÁCH HÀNG</h1>
                </div>

                <div class="col-sm-6 text-right">
                    <button class="btn btn-sm btn-success" type="submit"><i class="fas fa-save"></i> Lưu[Sửa]</button>
                    <a href="{{ route('customer.index') }}" class="btn btn-sm btn-info"><i class="fas fa-arrow-left"></i> Về danh sách</a>         
                </div>
            </div>

        </div>

    </div>

    <section class="content">
        <div class="container-fluid p-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Tên đăng nhập</label>
                        <input name="name" value="{{old('name',$user->name)}}" type="text" class="form-control" id="name" placeholder="Nhập tên đăng nhập">
                        @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span> 
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" value="{{old('email',$user->email)}}" type="text" class="form-control" id="email" placeholder="Email">
                        @if($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span> 
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input name="address" value="{{old('address',$user->address)}}" type="text" class="form-control" id="address" placeholder="Địa chỉ">
                        @if($errors->has('address'))
                        <span class="text-danger">{{$errors->first('address')}}</span> 
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input name="password" value="{{old('password',$user->password)}}" type="password" class="form-control" id="password" placeholder="Nhập lại Passwword">
                        @if($errors->has('password'))
                        <span class="text-danger">{{$errors->first('password')}}</span> 
                        @endif
                    </div>
                    {{-- <div class="form-group">
                        <label for="password_re">Xác nhận lại mật khẩu</label>
                        <input name="password_re" value="{{old('password_re')}}" type="password" class="form-control" id="password_re" placeholder="Xác nhận lại mật khẩu">
                        @if($errors->has('password_re'))
                        <span class="text-danger">{{$errors->first('password_re')}}</span> 
                        @endif
                    </div> --}}
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fullname">Họ tên</label>
                        <input name="fullname" value="{{old('fullname',$user->fullname)}}" type="text" class="form-control" id="fullname" placeholder="Họ tên">
                        @if($errors->has('fullname'))
                        <span class="text-danger">{{$errors->first('fullname')}}</span> 
                        @endif
                    </div>  

                    <div class="form-group">
                        <label for="phone">Điện thoại</label>
                        <input name="phone" value="{{old('phone',$user->phone)}}" type="text" class="form-control" id="phone" placeholder="Số điện thoại">
                        @if($errors->has('phone'))
                        <span class="text-danger">{{$errors->first('phone')}}</span> 
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="gender">Giới tính: </label>
                        <input type="radio" id="gender" name="gender" value="1">
                            <label for="1" value="1">Nam</label>
                        <input type="radio" id="gender" name="gender" value="2">
                            <label for="2" value="2">Nữ</label>
                        @if($errors->has('gender'))
                        <span class="text-danger">{{$errors->first('gender')}}</span> 
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" name="status" id="status">
                            <option value="1"  @php echo($user->status ==1)?'selected':'' @endphp>Xuất bản</option>
                            <option value="2" @php echo($user->status ==2)?'selected':'' @endphp>Chưa xuất bản</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
</form>
@endsection

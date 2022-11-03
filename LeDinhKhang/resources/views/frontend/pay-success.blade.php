@extends('layouts.site')
@section('title','Đặt hàng')
@section('maincontent')
<h1  class=" test text-center text-uppercase" style="margin-top: 3rem; color:rgb(31, 153, 31);font-weight:bold;">Đặt hàng thành công!</h1><br><br>
<a href="{{ route('site.home') }}" class="btn btn-info btn-sm" style="font-weight:bold;margin-left: 43%;font-size:18px"><i class="fas fa-reply" ></i> Tiếp tục mua hàng</a><br>
<br>
@endsection
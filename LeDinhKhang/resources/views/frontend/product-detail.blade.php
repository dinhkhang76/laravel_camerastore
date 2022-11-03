@extends('layouts.site')
@section('title', $product->name)
    
@section('maincontent')
<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
                <img class="card-img-top" src="{{ asset('images/products/' . $product->img) }}" alt="{{ $product->name }}">
        </div>
        <div class="col-md-8">
            <h1>{{ $product->name }}</h1><hr>
            <br><h5 style="font-size: 20px">Số lượng: <b style="font-size: 18px">còn {{ $product->number }} sản phẩm</h5></b>
            <h4>Giá:<span class="text-secondary">&nbsp&nbsp&nbsp<del>{{ number_format($product->price) }}</del></span><sup >đ</sup></h4>
            <h4>Giá khuyến mãi:<strong class="text-danger">&nbsp{{ number_format($product->pricesale) }}<sup>đ</sup></strong></h4>
            <input class="text-dark" name="qty" value="1" min="1" step="1" type="number"><br><br>
            <a href="{{ route('giohang.addcart',['id'=>$product->id]) }}" class="btn btn-outline-success" ><i class="fas fa-shopping-cart"></i>&nbspThêm vào giỏ hàng</a>&nbsp
          </div>
    </div>
   
    <hr style="background-color: rgba(252, 173, 2, 0.959);height:2px;" > 

    <div class="row my-3">
        <div class="col-12">
            <h4><b>CHI TIẾT SẢN PHẨM</b></h4>
            <p>{!! $product->detail !!}</p>
        </div>
    </div>

    {{-- plugin facebook --}}
    <div class="row">
      <div class="col-12">
        <div class="fb-like" data-href="{{ route('site.slug', ['slug'=>$product->slug]) }}" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
      </div>
          <div class="col-12">
            <div class="fb-comments" data-href="{{ route('site.slug', ['slug'=>$product->slug]) }}" data-width="100%" data-numposts="5"></div>
          </div>
    </div>
    
 
        <hr style="background-color: rgba(252, 193, 2, 0.959);height:3px;" > 
     
      
    

    <h4>SẢN PHẨM CÙNG LOẠI</h4>
    <div class="row">
    @foreach ($list_other as $item)
    <div class="col-md-3 col-sm-6 col-12">
      <div class="card card-product">
        <a href="{{ route('site.slug', ['slug'=>$item->slug]) }}">
          <img class="card-img-top" src="{{ asset('images/products/' . $item->img) }}" alt="{{ $item->name }}">
        </a>
          <div class="card-body">
            <h5 class="card-title text-dark text-center"> {{ $item->name }}</h5>
            <div class="product-price text-center text-dark">
              <strong class="text-danger">{{ number_format($item->pricesale) }}<sup>đ</sup></strong>
              <del class="text-dark"><span class="text-secondary">{{ number_format($item->price) }}</span></del><sup >đ</sup>
            </div>
            <div class="btn-group w-100" role="group" aria-label="Basic example">
              <br><a href="" class="btn btn-outline-success"><i class="fas fa-shopping-cart"></i></a>&nbsp
              <a href="{{ route('site.slug', ['slug'=>$item->slug]) }}" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
            </div>
            {{-- <a href="" class="btn btn-primary"> Thêm vào giỏ hàng</a>  --}}
          </div>
      </div>       
    </div>
    @endforeach                    
  </div>

</div>
    {{-- 1:37 --}}
@endsection
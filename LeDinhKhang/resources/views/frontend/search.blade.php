@extends('layouts.site')
@section('title','Tìm kiếm')
@section('maincontent')

            <br><h1 class="text-uppercase text-center">Tìm thấy {{ count($list_product) }} sản phẩm </h1>


            <div class="container">
              <div class="row mt-5">
                <div class="list-product-subtitle">
                </div>
                <div class="product-group">
                  <div class="row" >
                    @foreach ($list_product as $product)
                    <div class="col-md-3 col-sm-6 col-12"style="margin-top: 50px">
                      <div class="card card-product" >
                        <a href="{{ route('site.slug', ['slug'=>$product->slug]) }}">
                          <img class="card-img-top" src="{{ asset('images/products/' . $product->img) }}" atl="Card image cap">
                        </a>
                          <div class="card-body">
                            <h5 class="card-title text-dark"> {{ $product->name }}</h5><hr>
                            <div class="product-price">
                              <strong class="text-danger">{{ number_format($product->pricesale) }}<sup>đ</sup></strong>
                              <del  class="text-dark"><span class="text-secondary">{{ number_format($product->price) }}</span></del><sup class="text-dark">đ</sup>
                            </div>
                            <div class="btn-group w-100" role="group" aria-label="Basic example">
                              <br><a href="{{ route('giohang.addcart',['id'=>$product->id]) }}" class="btn btn-outline-success" ><i class="fas fa-shopping-cart"></i></a>&nbsp
                              <a href="{{ route('site.slug', ['slug'=>$product->slug]) }}" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                            </div>
                            {{-- <a href="" class="btn btn-primary"> Thêm vào giỏ hàng</a>  --}}
                          </div>
                      </div>       
                    </div>
                    <br>
                    @endforeach              
                  </div>
                </div>
              </div>
            </div>
                 
        {{-- <div class="col-3 py-4" style="margin-left: 450px">
           
            {{ $list_product->links() }}
        </div> --}}
    

        
</section>

@endsection
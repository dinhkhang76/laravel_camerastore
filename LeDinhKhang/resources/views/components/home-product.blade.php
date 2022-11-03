
<div class="container">
  <div class="row mt-5">
    <div class="list-product-subtitle">
    </div>
    <div class="product-group">
      <div class="row">
        @foreach ($list_product as $product)
        <div class="col-md-3 col-sm-6 col-12">
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
        
        @endforeach                    
      </div>
    </div>
  </div>
</div>








{{-- @foreach ($list_product as $product)
  <ul class="product">
    <li>
      <div class="product-item">
        <div class="product-top">
          <a href="{{ route('site.slug', ['slug'=>$product->slug]) }}" class="product-thumb">
            <img src="{{ asset('images/products/' . $product->img) }}" alt="{{ $product->name }}">
          </a>
          <a href="{{ route('site.slug', ['slug'=>$product->slug]) }}" class="buy-now">Chi tiết sản phẩm</a>
        </div>
        <div class="product-info">
          <a href="#" class="product-cat"></a>
          <a href="{{ route('site.slug', ['slug'=>$product->slug]) }}" class="product-name text-dark" style="font-weight: bold">{{ $product->name }}</a>
          <div class="product-price">
            <strong class="text-danger">{{ number_format($product->pricesale) }}<sup>đ</sup></strong>
            <del><span class="text-secondary">{{ number_format($product->price) }}</span></del><sup>đ</sup>
          </div>
        </div>
        <div class="btn-group w-100" role="group" aria-label="Basic example">
          <a href="" class="btn btn-outline-success"><i class="fas fa-shopping-cart"></i></a>&nbsp
          <a href="{{ route('site.slug', ['slug'=>$product->slug]) }}" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
        </div>
      </div>
    </li>
  </ul>
@endforeach
 --}}














{{-- <div class="row">
  <div class="large-12 colums">
    <div class="owl-carousel owl-theme">
      @foreach ($list_product as $product)
      <div class="item product-item">
        <div class="card" style="width: 100%">
            <a href="{{ route('site.slug', ['slug'=>$product->slug]) }}">
              <img src="{{ asset('images/products/' .$product->img) }}" class="img-fluid card-img-top" atl="{{ $product->name }}">
         
            </a>
            <div class="card-body">
              <h5 class="card-title text-center">
                <a href="{{ route('site.slug',['slug' => $product->slug ]) }}">{{ $product->name }}</a>
              </h5>
              <h5 class="text-center">
                <strong class="text-success">{{ number_format($product->pricesale) }}<sup>đ</sup></strong>
                <del><span class="text-danger">{{ number_format($product->price) }}</span></del><sup>đ</sup>
              </h5>
              <div class="btn-group w-100" role="group" aria-label="Basic example">
                <a href="" class="btn btn-outline-success"><i class="fas fa-shopping-cart"></i></a>&nbsp
                <a href="{{ route('site.slug', ['slug'=>$product->slug]) }}" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
              </div>
            </div>
        </div>
      </div>
          
      @endforeach
    </div>
  </div>
</div> --}}






























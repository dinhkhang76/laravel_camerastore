@extends('layouts.site')
@section('title','Sản phẩm')
    
@section('maincontent')
    <section class="maincontent clearfix">
        <div class="container my-3">
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    <div class="sidebar">
                       <x-list-category/>
                       <x-list-supplier/>
                    {{-- <div class="post-news">
                        <div class="list-group">
                            <div class="card-header bg-warning text-center" style="font-weight: bold">
                            DANH MỤC BÀI VIẾT
                        </div>
                        <div class="list-group-item">
                            <div class="row mb-3">
                                <div class="col-md-4 py-3 col-sm-4 list-group-item">
                                    <img src="" class="img-fluid" alt="" srcset="">
                                </div>
                                <div class="col-sm-8 pr-0 mr-0">
                                    <h5 class="post-title">
                                        <a href="" class="text-dark " style="text-decoration: none">{{ $post->title }}</a>
                                    </h5>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 py-3 col-sm-4 list-group-item">
                                    <img src="" class="img-fluid" alt="" srcset="">
                                </div>
                                <div class="col-sm-8 pr-0 mr-0">
                                    <h5 class="post-title">
                                        <a href="" class="text-dark " style="text-decoration: none">Tiêu đề bài viết</a>
                                    </h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

    <div class="col-md-7 col-lg-9">   
        <div class="container">
            <div class="row mt-5">
              <div class="list-product-subtitle">
              </div>
              <div class="product-group">
                <div class="row">
                    <br><h1 class="text-uppercase text-center">SẢN PHẨM</h1> <br>

                  @foreach ($list_product as $product)
                  <div class="col-md-4 col-sm-6 col-12">
                    <div class="card card-product">
                      <a href="{{ route('site.slug', ['slug'=>$product->slug]) }}">
                        <img class="card-img-top" src="{{ asset('images/products/' . $product->img) }}" alt="Card image cap">
                      </a>
                        <div class="card-body">
                          <h5 class="card-title text-dark text-center"> {{ $product->name }}</h5>
                          <div class="product-price text-center text-dark">
                            <strong class="text-danger">{{ number_format($product->pricesale) }}<sup>đ</sup></strong>
                            <del class="text-dark"><span class="text-secondary">{{ number_format($product->price) }}</span></del><sup >đ</sup>
                          </div>
                          <div class="btn-group w-100" role="group" aria-label="Basic example">
                            <br><a href="{{ route('giohang.addcart',['id'=>$product->id]) }}" class="btn btn-outline-success"><i class="fas fa-shopping-cart"></i></a>&nbsp
                            <a href="{{ route('site.slug', ['slug'=>$product->slug]) }}" class="btn btn-outline-info"><i class="fas fa-eye"></i></a><br>
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

         {{-- phan trang --}}
            <div class="col-md-6 py-4" style="margin-left: 400px">
              {{ $list_product->links() }}
               
            </div>
        

            </div>
            </div>
    </section>  
    
    



@endsection
@extends('layouts.site')
@section('title',$row_topic->name)
    
@section('maincontent')
    <section class="maincontent clearfix">
        <div class="container my-3">
            <div class="row">
              <div class="col-md-2"></div>
                {{-- <div class="col-md-3 col-lg-3">
                    <div class="sidebar">
                       <x-list-category/>
                       <x-list-supplier/>
                    <div class="post-news">
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
                                        <a href="" class="text-dark " style="text-decoration: none">Tiêu đề bài viết</a>
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
                </div>
            </div>
        </div> --}}

    <div class="col-md-7 col-lg-9">   
        <div class="container">
            <div class="row mt-5">
              <div class="list-product-subtitle">
              </div>
              <div class="product-group">
                <div class="row">
                    <br><h1 class="text-uppercase text-center"style="color:red;">{{ $row_topic->name }}</h1><br><br><br>
                    <hr style="background-color: rgba(112, 112, 112, 0.959);width:100%;height:5px;" >


                  @foreach ($list_post as $post)
                    <div class="row">
                      <div class="col-md-3 my-3">
                        <a href="{{ route('site.slug', ['slug'=>$post->slug]) }}">
                          <img class="card-img-top img-fluid img-thumbnail rounded-circle bg-info" style="width: 250px;height:180px" src="{{ asset('images/posts/' . $post->img) }}"  alt="{{ $post->title }}">
                        </a>
                      </div>
                      <div class="col-md-9 ">
                        <a  style="text-decoration: none" href="{{ route('site.slug', ['slug'=>$post->slug]) }}">
                          <h4 class="nav-link">{{ $post->title }}</h4>
                        </a>
                        <p>
                          {!! Str::limit(strip_tags($post->detail), 400 ) !!} 
                          &nbsp&nbsp&nbsp&nbsp&nbsp <br><a style="text-decoration:none" href="{{ route('site.slug', ['slug'=>$post->slug]) }}"><button class="btn btn-warning" style="font-weight:bold;text-align:center;font-size:12px;height:30px;width:85px">Xem thêm</button></a><br><br>        <hr style="background-color: rgba(252, 193, 2, 0.959);height:3px;" > 
                        </div>
                    </div>
                  @endforeach                    
                </div>
              </div>
            </div>
          </div>

         
            <div class="col-3 py-4 " style="margin-left: 450px">
               {{--  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                  </nav> --}}
                {{ $list_post->links() }}
            </div>
        

            </div>
            </div>
    </section>  
    
    



@endsection
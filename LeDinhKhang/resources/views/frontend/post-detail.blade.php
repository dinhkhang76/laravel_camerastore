@extends('layouts.site')
@section('title', $post->title)
    
@section('maincontent')
<div class="container my-5">
    <br><h1 class="title text-center text-uppercase" style="color:red;">{{ $post->title }}</h1>        <hr style="background-color: rgba(0, 0, 0, 0.959);height:3px;" > 

    <br><p class="content">{!! $post->detail !!}</p>
    <div class="row">
        <div class="col-12">
          <div class="fb-like" data-href="{{ route('site.slug', ['slug'=>$post->slug]) }}" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
        </div>
            <div class="col-12">
              <div class="fb-comments" data-href="{{ route('site.slug', ['slug'=>$post->slug]) }}" data-width="100%" data-numposts="5"></div>
            </div>
  
      </div>
    <hr style="background-color: rgba(0, 0, 0, 0.959);height:3px;" > 

    <br><h4> BÀI VIẾT CÙNG LOẠI</h4>
    <ul>
        @foreach ($list_other as $item)
            <li>
                <h5>
                    <a style="text-decoration:none"href="{{ $item->slug }}">{{ $item->title }}</a>

                </h5>
            </li> 
        @endforeach
    </ul>
</div>
    
@endsection
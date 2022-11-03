

@extends('layouts.site')
@section('title','Trang chủ')

@section('maincontent')
<x-slide-show/>
<section class="contenthome">
  <div class="container">
    <div class="grid_column-10">
      <div class="headline">
        @foreach ($list_category as $cat)
        <br><h1 class="text-uppercase">{{ $cat->name }}</h1> 
        <a class="nav-link text-primary"style="text-align:right" href="{{ route("site.slug", ['slug'=>$cat->slug]) }}">Xem tất cả</a>
        <x-home-product :cat="$cat"/>
        
        @endforeach
      </div>
         
  </div>
</section>

@endsection
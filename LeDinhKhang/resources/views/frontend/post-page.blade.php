@extends('layouts.site')
@section('title', $row->title)
    
@section('maincontent')
<div class="container my-5">
    <h1 class="title text-center text-uppercase" style="color:red;">{{ $row->title }}</h1>
    <br><p class="content">{!! $row->detail !!}</p>
</div>
    
@endsection
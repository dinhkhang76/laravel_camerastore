@extends('layouts.site')
@section('title', $row_supplier->name)
    
@section('maincontent')
<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
                <img class="card-img-top img-thumbnail rounded-circle" style="border-color: rgb(241, 197, 1);border-width:5px" src="{{ asset('images/supplier/' . $row_supplier->logo) }}" alt="{{ $row_supplier->name }}">
        </div>
        <div class="col-md-8">
            <h1>{{ $row_supplier->name }}</h1><hr>
            <br><h5 style="font-size: 20px"><b style="font-size: 18px">&nbspNgười đại diện:</b> {{ $row_supplier->fullname }}</h5>
            <br><h5 style="font-size: 20px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b style="font-size: 18px">Email:</b> {{ $row_supplier->email }}</h5>
            <br><h5 style="font-size: 20px">&nbsp&nbsp&nbsp<b style="font-size: 18px">&nbspSố điện thoại:</b> {{ $row_supplier->phone }}</h5>
            <br><h5 style="font-size: 20px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b style="font-size: 18px">Địa chỉ: </b> {{ $row_supplier->address }}</h5>
            <br><h5 style="font-size: 20px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b style="font-size: 18px">Website:</b> <a target="_blank" href="{{ $row_supplier->siteurl }}">{{ $row_supplier->siteurl }}</a></h5>
            <br><h5 style="font-size: 20px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b style="font-size: 20px">MÔ TẢ:<br><hr><b class="text-secondary" style="font-size: 16px;">{{ $row_supplier->metadesc }}</h5></b>

            
        </div>
    </div>
   
  
     
      
  

</div>
    {{-- 1:37 --}}
@endsection
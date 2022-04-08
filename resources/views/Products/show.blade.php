@extends('layouts.app')
@section('content')
<div class="container">
  <h1 class="text-center">All Products</h1>
    <div class="box">
      <table class="table table-bordered">
    <thead>
      <tr>
    
        <th>Name</th>
        <th>image</th>
        <th>date</th>
        <th>categorize</th>
        <th>communicate</th>
        <th>amount</th>
        <th>price</th>
      </tr>
    </thead>
    <tbody>
     
      <tr>
   
     
            
        <td>{{$product->name}}</td>
        <td><img src="{{asset('storage/'.$product->file_path)}}" 
            width="100px"
            height="50px"
            alt=""></td>{{-- to show images you should be to create link by storge:link --}}
        
        <td>{{$product->date_expir}}</td>
        <td>{{$product->categorize}}</td>
        <td>{{$product->communicate}}</td>
        <td>{{$product->amount}}</td>
        <td>{{$product->price}}</td>
     
      </tr>
     
      </tbody>
  </table>
    </div>
</div>
@endsection
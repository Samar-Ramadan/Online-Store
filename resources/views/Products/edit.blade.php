@extends('layouts.app')

@section('content')
<div class="card card-default">
   
    <div class="card-header">
      Update a  Categories
    </div>
    <div class="card-body">
        <form action="{{route('Products.update',$product->id)}}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Product Name">Product Name:</label>
                <input type="text" name="name" class=" @error('name') is-invalid  @enderror
                 form-control" placeholder="Add name" value="{{$product->name}}">
                @error('name')
                <div class="alert alert-danger">  {{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
              <label for=" Product date">Product Date:</label>
              <input type="date" name="date" class=" @error('date') is-invalid  @enderror
               form-control" placeholder="Add name" value="{{$product->date_expir}}">
              @error('date')
              <div class="alert alert-danger">  {{$message}}</div>
              @enderror
          </div>

          
          <div class="form-group">
            <label for=" communicate">communicate:</label>
            <input type="integer" name="communicate" class=" @error('communicate') is-invalid  @enderror
             form-control" placeholder="communicate" value="{{$product->communicate}}">
            @error('communicate')
            <div class="alert alert-danger">  {{$message}}</div>
            @enderror
        </div>


         
        <div class="form-group">
          <label for=" Product amount"> Product amount:</label>
          <input type="integer" name="amount" class=" @error('amount') is-invalid  @enderror
           form-control" placeholder="amount" value="{{$product->amount}}">
          @error('amount')
          <div class="alert alert-danger">  {{$message}}</div>
          @enderror
      </div>

      

      <div class="form-group">
        <label for=" Product price"> Product price:</label>
        <input type="integer" name="price" class=" @error('priec') is-invalid  @enderror
         form-control" placeholder="price" value="{{$product->price}}">
        @error('price')
        <div class="alert alert-danger">  {{$message}}</div>
        @enderror
    </div>
    <td>
      <img src="{{asset('storage/'.$product->file_path)}}" class="rounded   " alt="" width="200px" height="100px">
     </td>
    <div class="form-group">
      <label for=" Product image"> </label>
      <input type="file" name="image" class=" 
       form-control" >
    
  </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Edit</a>
            </div>
        </form>
    </div>
</div>
@endsection
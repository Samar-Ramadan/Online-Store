@extends('layouts.app')

@section('content')
<div class="card card-default">
   
    <div class="card-header">
      Add a new Categories
    </div>
    <div class="card-body">
        <form action="{{route('Products.store')}}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Product Name">Product Name:</label>
                <input type="text" name="name" class=" @error('name') is-invalid  @enderror
                 form-control" placeholder="Add name">
                @error('name')
                <div class="alert alert-danger">  {{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
              <label for=" Product date">Product Date:</label>
              <input type="date" name="date" class=" @error('date') is-invalid  @enderror
               form-control" placeholder="Add name">
              @error('date')
              <div class="alert alert-danger">  {{$message}}</div>
              @enderror
          </div>

          
          <div class="form-group">
            <label for=" communicate">communicate:</label>
            <input type="integer" name="communicate" class=" @error('communicate') is-invalid  @enderror
             form-control" placeholder="communicate">
            @error('communicate')
            <div class="alert alert-danger">  {{$message}}</div>
            @enderror
        </div>


         
        <div class="form-group">
          <label for=" Product amount"> Product amount:</label>
          <input type="integer" name="amount" class=" @error('amount') is-invalid  @enderror
           form-control" placeholder="amount">
          @error('amount')
          <div class="alert alert-danger">  {{$message}}</div>
          @enderror
      </div>

      

      <div class="form-group">
        <label for=" Product price"> Product price:</label>
        <input type="integer" name="price" class=" @error('priec') is-invalid  @enderror
         form-control" placeholder="price">
        @error('price')
        <div class="alert alert-danger">  {{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
      <label for=" Product image"> Product image:</label>
      <input type="file" name="image" class=" @error('image') is-invalid  @enderror
       form-control" >
      @error('image')
      <div class="alert alert-danger">  {{$message}}</div>
      @enderror
     </div>
     
     <div class="form-group">
        <label for=" selectCategory"> Select a category:</label>
        <select name="CategoryId" id="" class="form-control">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->categories}}</option>
            @endforeach
        </select>
        
       </div>


            <div class="form-group">
                <button type="submit" class="btn btn-success">Add</a>
            </div>
        </form>
    </div>
</div>
@endsection
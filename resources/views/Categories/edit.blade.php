@extends('layouts.app')

@section('content')
<div class="card card-default">
   
    <div class="card-header">
      Update Category
    </div>
    <div class="card-body">
        <form action="{{route('Categories.update',$category->id)}}"  method="POST">
            @csrf
            <div class="form-group">
                <label for="category"> Category Name:</label>
                <input type="text" name="categories" 
                class=" @error('categories') is-invalid  @enderror
                 form-control" placeholder="Add a new Category" value="{{$category->categories}}">
                 
                @error('categories')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
                @enderror
               
              
            </div>

            <div class="form-group">
                <button class="btn btn-success">Add</a>
            </div>
        </form>
    </div>
</div>
@endsection
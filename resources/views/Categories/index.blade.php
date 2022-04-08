@extends('layouts.app')

@section('content')
@if (session()->has('error'))
     <div class="alert alert-danger">
       {{session()->get('error')}}
     </div>

@endif
<div class="clearfix">
    <a href="{{route('Categories.create')}}"  class="btn float-right btn-success">Add Categories</a>

</div>
<div class="card card-default">
   
    <div class="card-header">
      All Categories
    </div>
    <div class="card-body">

         <table class="table">
           <tbody>
            @foreach ($categories as $category)
             <tr>
               <td>
                {{$category->categories}}
               </td>
               <td>
                <a href="/Categories/{{$category->id}}/edit" class="btn btn-primary float-right btn-sm">Edit</a>
               </td>
               <td>
                <form action="{{route('Categories.destroy', $category->id)}}" method="POST" >  
                @csrf
                @method('DELETE')
                <button  class="btn btn-danger  btn-sm">Delete</button>
                </form>
              </td>
             
             </tr>
           </thead>
           @endforeach
           </tbody>
    </div>
</div>

@endsection
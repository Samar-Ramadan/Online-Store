@extends('layouts.app')

@section('content')

<div class="clearfix">
    <a href="{{route('Products.create')}}"  class="btn float-right btn-success">Add Products:</a>

</div>
<div class="card card-default">
   
    <div class="card-header">
      All Products
    </div>
    <div class="card-body">

       @if ($products->count()>0)
       <table class="table">
        <thead>
          <tr>
           <th>Name</th>
            <th>Image</th>
            <th>Action</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
         @foreach ($products as $product)
          <tr>
            <td>
             {{$product->name}}
            </td>
            <td>
             <img src="{{asset('storage/'.$product->file_path)}}" class="rounded   " alt="" width="100px" height="50px">
            </td>
           @if (!$product->trashed())
           <td>
             <a href="/Products/{{$product->id}}/edit" class="btn btn-primary  btn-sm">Edit</a>
            </td> 
            @else
            <td>
              <a href="/Products-trashed/{{$product->id}}" class="btn btn-primary  btn-sm">Restore</a>
             </td> 
           @endif
           
           <td>
             <form action="{{route('Products.destroy', $product->id)}}" method="POST" >  
             @csrf
             @method('DELETE')
             <button  class="btn btn-danger  btn-sm">{{$product->trashed() ? 'Delete' : 'Trash'}}</button>
             </form>
           </td>
          
           </tr>
        </thead>
        @endforeach
        </tbody>
      </table>
       @else
          <div class="card-body">
          <div class="text-center "  >
          <h1 >Not Products Yet</h1>  
          </div>  
          </div> 
       @endif
    </div>
</div>

@endsection
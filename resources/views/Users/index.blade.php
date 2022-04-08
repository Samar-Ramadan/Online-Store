@extends('layouts.app')

@section('content')

<div class="clearfix">
   
</div>
<div class="card card-default">
   
    <div class="card-header">
      All Products
    </div>
    <div class="card-body">

       @if ($users->count()>0)
       <table class="table">
        <thead>
          <tr>
          
            <th>Image</th>
            <th>UserName</th>
            <th>role</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($users as $user)
          <tr>
           
           {{--  <td>
             <img src="{{asset('storage/'.$user->image)}}" class="rounded   " alt="" width="100px" height="50px">
            </td> --}}
            <td>
                {{$user->name}}
            </td>
            <td>
              @if (! $user->IsAdmin())
              <form action="{{route('make-admin' ,$user->id)}}" method="post">
                @csrf
                <button class="btn btn-success">Make Admin</button>
              </form>
         
              @else
                  
              @endif
          </td>
            <td>
                {{$user->role}}
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
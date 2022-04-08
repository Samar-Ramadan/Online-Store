<?php

namespace App\Http\Middleware;

use Closure;
use App\Category1;
class Checkctegory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $check=Category1::all()->count();
       if($check == 0)
       {
          session()->flash('error','First you needed to add some category');
          return redirect(route('Categories.index'));
       }
        return $next($request);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request ;
use App\Http\Requests\productRequrst ;
use App\Http\Requests\updateProductRequest ;
use App\product;
use App\user;
use App\category1;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB ;
use Illuminate\Support\Facades\Storage ;
use Illuminate\Support\Collection ;

class ProductController extends Controller
{



    public function create(Request $id)
    {
         $categories=category1::all();
         return view('Products.create')->with('categories',$categories);
    }


    public function store(productRequrst $request )
    {

         $user_id=Auth::id();
         product::create([
     
            "name"=>$request->get('name'),
            "file_path"=>$request->image->store('product','public'),
            "date_expir"=>$request->get('date'),
            "communicate"=>$request->get('communicate'),
            "amount"=>$request->get('amount'),
            "price"=>$request->get('price'),
            "user_id"=>$user_id,
            "category1_id"=>$request->get('CategoryId')
           
        ]);
     
        session()->flash('success','product create successfully');
        return redirect(route('Products.index'));
    }

    public function index()
    {
    
        $products=product::all();
        return view('Products.index')->with('products',$products);

    }

    public function show($request)
    {
      
           $product=product::find($request);
           return view('Products.show',['product'=>$product]) ;      

    }

    public function destroy( $id)
    {
           $product=product::withTrashed()->where('id',$id)->first();
           if($product->trashed())
              {
                  Storage::disk('public')->delete($product->file_path);
                  $product->forceDelete();
                  session()->flash('success','product delete successfully');
              }
            else{
                  $product->delete();
                  session()->flash('success','product trashed successfully');
                }
            return redirect(route('Products.index'));

    }

    public function trashed()
    {

            $trashed=product::onlyTrashed()->get();
            return view('products.index')->with('products',$trashed);
    }


     public function edit (Product $product)
    {
     
            return view ('Products.edit' )->with('product',$product);
    }

 
    public function update(updateProductRequest $request,Product $product)
    {
            $data = $request->only(['name','date','communicate','amount','price']);
            if($request->hasFile('image'))
             {
                 $image = $request->image->store('product','public');
                 Storage::disk('public')->delete($product->file_path);
                 $data['image'] = $image;
             }  
            $product->update($data);
            session()->flash('success','product updated successfully');
            return redirect(route('Products.index'));
    }

    public function restore($id)
    {
           Product::withTrashed()->where('id',$id)->restore();
           session()->flash('success','product restored successfully');
           return redirect(route('Products.index'));
    }

}

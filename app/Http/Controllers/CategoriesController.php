<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriesRequest ;
use  App\Category1;

class CategoriesController extends Controller
{
    public function index(){
        $categories=Category1::all();
        return view('Categories.index')->with('categories',$categories);
    }

    public function create(){
        return view('Categories.create');
    }

    public function store(CategoriesRequest $request){
       
        
        Category1::create($request->all());
        session()->flash('success','catgory create successfully');
        return redirect(route('Categories.index'));
    }

    public function edit(Category1 $category){
      
         return view ('Categories.edit')->with('category',$category);
    }

    public function update(CategoriesRequest $request, Category1 $category){
         
           $category->categories=$request->categories;
           $category->save();
           session()->flash('success','catgory update successfully');
           return redirect(route('Categories.index'));
    }

    public function destroy(Category1 $category){
        
        $category->delete();
        session()->flash('success','catgory delete successfully');
        return redirect(route('Categories.index'));
    }
}

<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    function index(){
   	$categories =Category::all();
        return view('admin.category.index', ['categories' => $categories]);	
    }
     function edit($id){
      		$category = Category::find($id);
            return view("admin/category/edit",['category'=>$category]);
    }
     function update($id, Request $request){
	 	$name = $request->input('name');
     $category = Category::find($id);
     $category->name = $name;
     $category->save();
      		return redirect('/admin/category/');
      	
    }
     function destroy($id){
      $category = Category::find($id)->delete();
  	return redirect('admin/category/');
   }
   function create(){
   	return view("admin/category/create");
   }
   function store(Request $request){
   $name = $request->input('name');
   $category = new Category();
   $category->name = $name;
   $category->save();
      		return redirect('/admin/category/');
	}
}
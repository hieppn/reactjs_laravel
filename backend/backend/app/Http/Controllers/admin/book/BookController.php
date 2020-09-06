<?php

namespace App\Http\Controllers\admin\book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\Category;
class BookController extends Controller
{
   function index(){
     $books = Book::all();
     foreach($books as $book){
       $book->category;
     }
     //echo json_encode($books);
      return view('admin.book.index', ['books' => $books]);	
    }
     function edit($id){
      		$book = Book::find($id); 
          $book->category->name;
      return view("admin/book/edit",['book'=>$book]);
    }
    
     function update($id, Request $request){
	 	$status = $request->input('status');
	 	$quantity = $request->input('quantity');
	 	if($quantity==0){
	 		$status="Đã bán";
	 	}
	 	else if($quantity>0){
	 		$status = "Còn";
     }
     $image = $request->file('image')->store('public');
	    $name = $request->input('name');
	    $price= $request->input('price');
	    $oldprice = $request->input('oldprice'); 
	    $author = $request->input('author');
      $description = $request->input('description');
      $book= Book::find($id);
      $book->name=$name;
      $book->price=$price;
      $book->oldprice=$oldprice;
      $book->author=$author;
      $book->description=$description;
      $book->status=$status;
      $book->image=$image;
      $book->quantity=$quantity;
      $book->id_category=$id;
      $book->save();
      return redirect('/admin/books/');
    }
    function destroy($ids){
   	 Book::find($ids)->delete();
  	return redirect('admin/books/');
   }
   function create(){
    $categories=Category::all();
    return view("admin/book/create",['categories'=>$categories]);
   }
   function store(Request $Request){
    $name = $Request-> input("name");
    $oldprice = $Request-> input("oldprice");
    $author = $Request-> input("author");
    $quantity = $Request-> input("quantity");
    if($quantity==0){
      $status="Đã bán";
    }
    else if($quantity>0){
      $status = "Còn";
    }
    $description = $Request-> input("description");
    $image = $Request->file('image')->store('public');
   	$id = $Request-> input("category");
      $product= new Book();
      $product->name=$name;
      $product->price=$oldprice;
      $product->oldprice=$oldprice;
      $product->author=$author;
      $product->description=$description;
      $product->status=$status;
      $product->quantity=$quantity;
      $product->image=$image;
      $product->id_category=$id;
      $product->save();
	  return redirect('admin/books/');
	
}
}
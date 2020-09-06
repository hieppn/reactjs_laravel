<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Book;
class OrderController extends Controller
{
    function index(){
        $orders = Order::all();
      return view('admin.order.index',['orders'=>$orders]);
    }
    function show($id){
        $book = Book::find($id);
       // $comments= Comment::where('id_product','=',$id)->get();
        // foreach($comments as $comment){
        //     $comment->userc;
        // }
        //echo "<pre>".json_encode($c,JSON_PRETTY_PRINT)."</pre>";
      return view("admin/order/detail",["book" => compact('book')]);
    }
}

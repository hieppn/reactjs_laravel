<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use App\Cart;
use App\Book;
use App\Order;
use App\Discount;
class OrderController extends Controller
{
    function store(Request $request){
      $token = request()->header("Authorization");
		$key ="Hiepdev9100";
      $user_id=JWT::decode($token, $key, array('HS256'));
      $carts=Cart::where('id_user', '=', $user_id)->get();
      $s=0;$q=0;$total=0;
      foreach( $carts as $cart){
            $q=$cart->quantity;
            $books=$cart->books;
            foreach($books as $book){
            $s+=$q*$book->price;
         }
      }  
      $inputdiscount= $request->input("discount");
      $discounts=Discount::all();
      $tam=0;
      foreach($discounts as $disc){
         if($disc->code==$inputdiscount&& $disc->quantity>0){
            $tam+=1;
            $pt=$disc->percent;
            $disc->quantity-=1;
            if($disc->quantity>0){
               $disc->save();
            }else{
               $disc->delete();
            }
         break;
         }else{
            $tam=0;
         }  
      }
      if($tam==0){
         $sale=0;
         $total=$s;
      }
      else{
         $total=$s-(($pt*$s)/100);
         $sale= $s-$total;
      }
         $detail = array();
         foreach($carts as $cart){
            $idpr=$cart->id_book;
            	array_push($detail, $idpr);
         }
         $order = new Order();
            $order->id_user=$user_id;
            $order->discount=$sale;
            $order->total=$total;
            $order->products= json_encode($detail);
       		$order->save();
       	foreach($carts as $cart){
       	$idp=$cart->id_book;
            $book= Book::find($idp);
            $book->quantity= $book->quantity-$q;
            if($book->quantity>=1){
               $book->quantity=$book->quantity;
               $book->save();
            }
            else{
               $book->quantity=0;
               $book->status='Đã bán';
               $book->save();
          }
      $cart->delete();
       }
    $array = array("order" => $order);
		return response()->json($array,200);
}
function check(Request $request ){
   $inputdiscount= $request->input("discount");
   $discounts=Discount::all();
   $tam=0;
   foreach($discounts as $discount){
      if($discount->code==$inputdiscount&& $discount->quantity>0){
         $tam+=1;
      break;
   }else{
      $tam=0;
   }
}
if($tam>0){
   return response()->json(null,200);
}
else{
   return response()->json(null,400);
}
}

function index(){
   $token = request()->header("Authorization");
		$key ="Hiepdev9100";
      $user_id=JWT::decode($token, $key, array('HS256'));
      $orders=Order::where('id_user',$user_id)->get();
      foreach($orders as $order){
         $ids = json_decode($order->products);
         foreach($ids as $id){
            $book=Book::find($id);
         }
      }
      $array = array("orders" => $orders);
      return response()->json($array,200);
}
function getBook($id){
      $book=Book::where('id','=',$id)->first();
      $array = array("book" => $book);
		return response()->json($array,200);
}
}

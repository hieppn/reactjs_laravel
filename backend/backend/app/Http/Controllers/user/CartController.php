<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use App\Cart;
use App\Book;
class CartController extends Controller
{
     function index(){
        $token = request()->header("Authorization");
		$key ="Hiepdev9100";
		$user_id=JWT::decode($token, $key, array('HS256'));
            $carts=Cart::where('id_user', '=', $user_id)->get();
            foreach($carts as $cart){
                $cart->books;
                $cart->user;
            }
          $array = array("cart" => $carts);
		return response()->json($array,200);
        }
        //return view('user.cart',['carts'=>$carts]);

    function store($idbook){
        $response= 200;
         $token = request()->header("Authorization");
		$key ="Hiepdev9100";
		$user_id=JWT::decode($token, $key, array('HS256'));
        $cart=Cart::where('id_user', '=', $user_id)->where('id_book',$idbook)->first();
        if($cart){
            $book = Book::where('id','=',$idbook)->first();
                if($cart->quantity<$book->quantity){
                    $cart->quantity =$cart->quantity+1;
                }else{
                    $response=400;
                    $cart->quantity =$cart->quantity;
                } 
                $cart->save();
        }else{
                $cart=new Cart();
                $cart->id_user=$user_id;
                $cart->id_book=$idbook;
                $book = Book::where('id','=',$idbook)->first();
                if($book->quantity>=1){
                    $cart->quantity=1;
                    $cart->save();
                }
                else{
                    $response=400;
                }
                }
               $carts=Cart::where('id_user', '=', $user_id)->get();
            foreach($carts as $cart){
                $cart->books;
                $cart->user;
            }
          $array = array("cart" => $carts);
		return response()->json($array,$response);
       
    }
    function destroy($idproduct){
        $token = request()->header("Authorization");
        $key ="Hiepdev9100";
        $user_id=JWT::decode($token, $key, array('HS256'));
        $cart=Cart::where('id_user', '=', $user_id)->where('id',$idproduct)->first();
        $cart->delete();
        $carts=Cart::where('id_user', '=', $user_id)->get();
            foreach($carts as $cart){
                $cart->books;
                $cart->user;
            }
          $array = array("cart" => $carts);
        return response()->json($array,200);
    }
    function add($idproduct){
        $response=200;
        $token = request()->header("Authorization");
        $key ="Hiepdev9100";
        $user_id=JWT::decode($token, $key, array('HS256'));
        $cart = Cart::where('id','=',$idproduct)->first();
        $quan=Cart::where('id','=',$idproduct)->value("quantity");
         $idp=Cart::where('id','=',$idproduct)->value("id_book");
            $qua = Book::where('id','=',$idp)->value('quantity');
            if($qua>$quan)
                $cart->quantity=$quan+1;
                else{
                $cart->quantity =$qua;
                $response=400;
            }
                $cart->save();
        $carts=Cart::where('id_user', '=', $user_id)->get();
          foreach($carts as $cart){
                $cart->books;
                $cart->user;
            }
          $array = array("cart" => $carts);
        return response()->json($array,$response);
        }  


         function subtract($idproduct){
        $response=200;
        $token = request()->header("Authorization");
        $key ="Hiepdev9100";
        $user_id=JWT::decode($token, $key, array('HS256'));
        $cart = Cart::where('id','=',$idproduct)->first();
        $quan=Cart::where('id','=',$idproduct)->value("quantity");
           if($quan>1){
                $cart->quantity =$quan-1;
                $cart->save();
                }
                else if($quan==1){
                    $cart->delete();
                }
        $carts=Cart::where('id_user', '=', $user_id)->get();
          foreach($carts as $cart){
                $cart->books;
                $cart->user;
            }
          $array = array("cart" => $carts);
        return response()->json($array,$response);
        }  


        function getTotal(){
            $sum=0;
        $token = request()->header("Authorization");
        $key ="Hiepdev9100";
        $user_id=JWT::decode($token, $key, array('HS256'));
         $carts=Cart::where('id_user', '=', $user_id)->get();
            foreach($carts as $cart){
            $sum+=$cart->quantity*$cart->books[0]->price;
            $array = array("data" => $sum);
            }
             
        return response()->json($array,200);
        }
}

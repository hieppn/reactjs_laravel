<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use \Firebase\JWT\JWT;
class MessageController extends Controller
{
    function create(Request $request){
        $cont=$request->input("content");
        if(!$cont){
            return response()->json(null,400);
        }else{
        $token = request()->header("Authorization");
		$key ="Hiepdev9100";
        $user_id=JWT::decode($token, $key, array('HS256'));
        $mes=new Message();
        $mes->id_user=$user_id;
        $mes->idu=1;
        $mes->content=$cont;
        $mes->save();
        return response()->json(null,200);
        }
    }
    function index(){
        $token = request()->header("Authorization");
		$key ="Hiepdev9100";
        $user_id=JWT::decode($token, $key, array('HS256'));
        $mess=Message::where('id_user',$user_id)->orWhere('idu',$user_id)->get();
        $array = array("messages" => $mess);
        return response()->json($array,200);
    }
}

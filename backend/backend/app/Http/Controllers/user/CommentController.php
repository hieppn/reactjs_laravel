<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use \Firebase\JWT\JWT;
class CommentController extends Controller
{
    function destroy($id){
        $comment=Comment::find($id);
        $comment->delete();
        return response()->json(null,200);
    }
    function add($id,Request $request){
        $cmtt=$request->input("cmtt1");
        if(!$cmtt){
            return response()->json(null,400);
        }else{
        $token = request()->header("Authorization");
        $key ="Hiepdev9100";
        $user_id=JWT::decode($token, $key, array('HS256'));
        $comment = new Comment();
        $comment->id_book=$id;
        $comment->id_user=$user_id;
        $comment->cmt=$cmtt;
        $comment->save();
        return response()->json(null,200);
    }
}
    function getComments($id){
        $comments=Comment::where('id_book',$id)->get();
        foreach($comments as $comment){
            $comment->userc;
        }
        $array = array("comments" => $comments);
        return response()->json($array,200);
    }
}

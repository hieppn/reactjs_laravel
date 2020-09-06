<?php

namespace App\Http\Controllers\admin\message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Message;
class MessageController extends Controller
{
    function getUser(){
        $users= User::where("role","<>","admin")->get();
       return view("admin/message/index",["users" =>$users]);
    }
    function getMessage($id){
        $user=User::find($id);
        $mess=Message::where('id_user',$id)->orWhere('idu',$id)->get();
        return view("admin/message/chat",["user"=>$user,"mess"=>$mess]);
    }
    function chat($id, Request $re){
        $content=$re->input('content');
        $mes= new Message();
        $mes->id_user=1;
        $mes->idu=$id;
        $mes->content=$content;
        $mes->save();
        return redirect('/message/'.$id);
    }
}

<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function index(){
    	$users = DB::table('users')->get();
        return view('admin.user.index', ['users' => $users]);	
    }
   function edit($id){
      $user=DB::table('users')->where('id', '=', $id)->first();
      return view("admin/user/edit",['user'=>$user]);
    }
    function destroy($ids){
   	 DB::table('users')-> where ('id', '=', $ids)->delete();
  	return redirect('admin/user/');
   }
   function update($id, Request $request){
      $address = $request->input('address');
      $phone= $request->input('phone');
      $email = $request->input('email');
      $role = $request->input('role');
      DB::table('users')->where("id",$id)->update(["address" =>$address, "phone" =>$phone,"email"=>$email,"role"=>$role]);
      return redirect('/admin/user/');
    }
}

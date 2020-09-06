<?php

namespace App\Http\Controllers\auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use \Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    function login(Request $request){
		$email = $request->input('email');
		$password = $request->input('password');   
	    $key ="Hiepdev9100";
		if(Auth::attempt(["password"=>$password,"email"=>$email])){
		$user_id= Auth::user()->id;
	 	$data=JWT::encode($user_id, $key);
	 	$array = array("idToken" => $data);
			return response()->json($array,200);
		}else{
			$array = array("data" => null);
			return response()->json($array,400);
		}   
	}

    function change(Request $request){
    	$token = request()->header("Authorization");
		$key ="Hiepdev9100";
		$user_id=JWT::decode($token, $key, array('HS256'));
		$user= User::find($user_id);
		$email = $request->input('email');  
		$password = $request->input('password');  
		$newpass = $request->input('newpass');
		$repass = $request->input('repass');   
		if(Auth::attempt(["password"=>$password,"email"=>$email]) && $user->email==$email){
			if($newpass==$repass){
				$user->password=Hash::make($newpass);
			$user->save();
			$data=JWT::encode($user_id, $key);
	 		$array = array("idToken" => $data);
			return response()->json($array,200);
			}
			else{
				$array = array("data" => null);
				return response()->json($array,400);
			}		
}
else
{
	$array = array("data" => null);
				return response()->json($array,400);
}
	}
	 function loginAdmin(Request $request){
		$email = $request->input('email');
		$password = $request->input('password');   
		if(Auth::attempt(["password"=>$password,"email"=>$email])){
		if(Auth::user()->role=="admin")
			return view("admin.dashboard");
		else{
			return view("admin.login");
			echo "Failed";
		}
		}
	else {
		echo "Failed";
		return view("admin.login");
	}
	}
	function profile() {
        $token = request()->header("Authorization");
		$key ="Hiepdev9100";
		$user_id=JWT::decode($token, $key, array('HS256'));
		
		$user= User::find($user_id);
		$array = array("user" => $user);
		return response()->json($array,200);
	}	
	function editprofile( Request $request) {
        $token = request()->header("Authorization");
		$key ="Hiepdev9100";
		$user_id=JWT::decode($token, $key, array('HS256'));
		$users=User::all();
		$user= User::find($user_id);
            $address=$request->input("address");
            $name=$request->input("name");
              $phone=$request->input("phone");
  $user->name=$name;
   $user->phone=$phone;
    $user->address=$address;
    $user->save();
		$array = array("user" => $user);
		return response()->json($array,200);
	}	
	  function profileAdmin($id, Request $request){
        $address = $request->input('address');
        $phone= $request->input('phone');
        $email = $request->input('email');
        $user=User::find($id);
        $user->address =$address;
        $user->phone =$phone;
        $user->email =$email;
        $user->save();
        return redirect('admin/dashboard');
      }

       function logout(){
    	Auth::logout();
    	return view("admin.login");
    }
     function logoutt(){
    	Auth::logout();
    	return response()->json(200);
    }
}

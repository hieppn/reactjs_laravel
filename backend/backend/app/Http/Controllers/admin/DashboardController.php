<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    function index(){
    	if(Auth::user())
    	return view("admin.dashboard");
    	else
    		return view("admin.login");
    	

    }
}

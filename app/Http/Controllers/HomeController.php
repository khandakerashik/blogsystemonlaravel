<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index(Request $request){

		$user = DB::table('users')->where('userId', session('user.userId'))
		->get(); 
	
		return view('home.index')->with('users', $user);
    }
}






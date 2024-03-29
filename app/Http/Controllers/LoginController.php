<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use App\users;

class LoginController extends Controller 
{
	public function index(){

		return view('login.index');
	}

	public function verify(Request $req){

		//$users = User::all();

		$user = users::where('username', $req->username)
					->where('password', $req->password)
					-> first();

		// $user = DB::table('users')->where('username', $req->username)
		// 			->where('password', $req->password)
		// 			->get();				

		if($user != null){
	
			$req->session()->put('name', $req->input('username'));
			$req->session()->put('userId', $req->input('userId'));
			$req->session()->put('password', $req->input('password'));
			//$req->session()->put('user', $user->type);
			//$req->session()->put('user', $user[0]->type);
			$req->session()->put('user', $user);

			$type = $req->session()->get('user');
			if($type->type == 'admin' ){
				return redirect()->route('home.index');
			}
			else{
				return redirect()->route('author.index');
			}
			
		}else{

			$req->session()->flash('msg', 'invalid username/password');

			//return view('login.index');
			return redirect('/login');
		}
	}

}

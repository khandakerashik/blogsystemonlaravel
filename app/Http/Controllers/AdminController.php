<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\author;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index(Request $request){

        //$users = User::all();
		$users = DB::table('author')->get(); 
        
        if($request->session()->has('name')){
    		   	return view('admin.index')->with('users', $users);
    	}else{
    		return redirect()->route('login.index');
    	}
    }

    function details($id){
        $user = DB::table('author')->where('id', $id)
					->get(); 
                
            return view('admin.details')->with('users', $user);
    }


    function edit($id){
        $user = DB::table('author')->where('id', $id)
        ->get(); 
    
        return view('admin.edit')->with('users', $user);
    }
	
	function update(Request $req, $id){

    	$author = author::find($id);
        $author->username = $req->username;
        $author->password = $req->password;
        $author->type ='author';
        $author->save();
    	return redirect()->route('admin.index');
    }
    function delete($id){
        $user = DB::table('users')->where('userId', $id)
        ->get(); 
    
        return view('admin.delete')->with('users', $user);
    }

    function destroy($id){
    	users::destroy($id);
    	return redirect()->route('admin.index');
    }

    function add(){

        return view('admin.addauthor');
    }

    function insert(Request $req){

        $user = new users();
        $user->username = $req->username;
        $user->password = $req->password;
        $user->type = $req->type;
        $user->name = "";
        $user->dept = "";
        $user->cgpa = "";
    
        if($user->save()){
            return redirect()->route('admin.index');
        }else{
            return redirect()->route('admin.add');
        }
    }
}

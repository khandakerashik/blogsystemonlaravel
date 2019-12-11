<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\author;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    function index(Request $request){

        //$users = User::all();
		$blogs = DB::table('blogs')->get();
        
        if($request->session()->has('name')){
    		   	return view('author.index')->with('blogs', $blogs);
    	}else{
    		return redirect()->route('login.index');
    	}
    }

    function details($id){
        $blogs = DB::table('blogs')->where('id', $id)
					->get(); 
                
            return view('author.details')->with('blogs', $blogs);
    }


    function edit($id){
        $user = DB::table('authors')->where('id', $id)
        ->get(); 
    
        return view('admin.edit')->with('users', $user);
    }
	
	function update(Request $req, $id){

    	$author = author::find($id);
        $author->name = $req->name;
        $author->password = $req->password;
        $author->contact = $req->contact;
        $author->save();
    	return redirect()->route('author.index');
    }
    function delete($id){
        $user = DB::table('authors')->where('userId', $id)
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

        $author = new author();
        $author->username = $req->username;
        $author->password = $req->password;
        $author->contact = $req->contact;
        $author->name = $req->name;

        if($author->save()){

            return redirect()->route('author.index');
            }
           
        else{
            return redirect()->route('admin.add');
        }
    }
}

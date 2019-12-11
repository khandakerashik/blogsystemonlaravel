<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\author;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;
use Validator;

class AdminController extends Controller
{
    function index(Request $request){

        //$users = User::all();
		$users = DB::table('authors')->get(); 
        
        if($request->session()->has('name')){
    		   	return view('admin.index')->with('users', $users);
    	}else{
    		return redirect()->route('login.index');
    	}
    }

    function details($id){
        $user = DB::table('authors')->where('id', $id)
					->get(); 
                
            return view('admin.details')->with('users', $user);
    }


    function edit($id){
        $user = DB::table('authors')->where('id', $id)
        ->get(); 
    
        return view('admin.edit')->with('users', $user);
    }
	
	function update(Request $req, $id){
        $validation = Validator::make($req->all(), [
            'name'=>'required',
            'contact'=>'required',
            'password'=>'required|max:4'
        ]);

        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();
        }

    	$author = author::find($id);
        $author->name = $req->name;
        $author->password = $req->password;
        $author->contact = $req->contact;
        $author->save();
        
        return redirect()->route('author.index');
        

    }
    function delete($id){
        $user = DB::table('authors')->where('id', $id)
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

        $validation = Validator::make($req->all(), [
            'username'=>'required',
            'contact'=>'required',
            'password'=>'required|max:4'
        ]);

        if($validation->fails()){
            return back()
                    ->with('errors', $validation->errors())
                    ->withInput();
        }

        $author = new author();
        $author->username = $req->username;
        $author->password = $req->password;
        $author->contact = $req->contact;
        $author->name = $req->name;

        if($author->save()){

            $user = new users();
            $user->username = $req->username;
            $user->password = $req->password;
            $user->contact = $req->contact;
            $user->name = $req->name;
            $user->type= 'author';
            if($user->save()){
                return redirect()->route('author.index');
                }
                else{
                    return redirect()->route('admin.add');
                }
        }
        else{
            return redirect()->route('admin.add');
        }
    }
}

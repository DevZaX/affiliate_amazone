<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use DB;

use Session;

class UserController extends Controller
{
    public function register(Request $request){
           
           $email = $request["email"];
           $password = $request["password"];
           $retype = $request["retype"];
           $term = $request["term"];  
           $user = DB::table('users')->where('email',$email)->get();
           if(count($user) == 0){
           	    if($password == $retype){
           	    	if($term == "on"){
           	    		 $password = md5($password);
                    $user = new User();
                    $user->email = $email;
                    $user->password = $password;
                    $user->type = "client";
                    $user->save();
                   // Session::flash("success","account created successfuly");

           	    	}
           	    }
           }
   
           return redirect('/');
    }

    public function login(Request $request){
      if(!Session::has('login')){
        $email = $request['email'];
            $password = $request["password"];
            $users = DB::table('users')->where('email',$email)->where('password',md5($password));
            if(count($users) != 0){
             Session::put("existe","yes");
             Session::put("login","yes");
            }
      }
            
            return view('index');
    }

    public function logout(){
      Session::forget('existe');
      Session::flush();
      return redirect('/');
    }

public function toAdmin(){
  return view('dashboard.index');
}


public function index(){

       $listUser = DB::table('users')->where('type','<>','admin')->get();
       $user = DB::table('users')->where('type','admin')->get();
       $user = $user[0];
       return view('dashboard.user',compact("listUser","user"));
}


public function destroy(Request $request,$id){

                 $user = User::find($id);
                 $user->delete();
                 return redirect('/users');
}   


/**

modifier les infos d'admin

@var Request
*/

public function updateAdmin(Request $request){

                 $id = $request->input("id");
                 $user = User::find($id);
                 $user->email = $request->input("email");
                 $user->password = $request->input("password");
                 $user->save();
                 return redirect('/users');
 }
  
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Validator;

 use Response;

use DB;

use Illuminate\Support\Facades\Input;

use Session;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){

      $inputs = Input::all();

      $validation = Validator::make($inputs,[

            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed',
            'checkbox' =>'required',
        ]);

      

      if($validation->fails()){

return Response::json(["error"=>true,'message'=>$validation->messages()],400);
        }

           
          $user = new User();
          $user->type="client";
          $user->email=inputs['email'];
          $user->password=Hash::make("inputs['password']");
          $user->save();
          return 'your are registred successfuly';
   
           
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

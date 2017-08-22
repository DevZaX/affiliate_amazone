<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Validator;

 use Response;

use DB;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

use Session;

use Illuminate\Support\Facades\Hash;

use App\NewsletterManager;

class UserController extends Controller
{
    public function register(Request $request){

      $inputs = Input::all();


     
         $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed',
            'confirmed_password'=>'',
            'term'=>'required'
        ]);


    
   

        if ($validator->fails()) {

             
              return Response::json(["error"=>true,'message'=>$validator->messages()],400);


        }

           
          $user = new User();
          $user->type="client";
          $user->email = $inputs['email'];
          $user->password = Hash::make($inputs['password']);
          $user->save();
        
   
           
    }

  public  function  check(){
  $inputs = Input::all();
 

   $validator = Validator::make( $inputs,[
            'email' => 'required',
            'password' => 'required',
        ]);

 
   if ($validator->fails()) {
            return redirect('/');
        }else

     $email= $inputs['email'];
     $password =$inputs['password'];
          if(Auth::attempt(['email'=>$email,'password'=>$password])){

            return redirect('/');
         
          }else{
            return redirect('/');
          }

          

}


    public function logout(){
     Auth::logout();
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

public function loginAdmin(){
  return view('login-admin');
}

public function loginAdminAuth(Request $request){
 
 $inputs = $request->all();

 $validator = Validator::make( $inputs,[
            'email' => 'required',
            'password' => 'required',
        ]);

 if($validator->fails()){
  return redirect('/login-admin');
 }else{
     $email= $inputs['email'];
     $password =$inputs['password'];

          if(Auth::attempt(['email'=>$email,'password'=>$password])){

            return redirect('/dashboardA');
         
          }else{
            return redirect('/login-admin');
          }
 }


  
}

public function subscribe(Request $request){

  $email = $request->email;


  $mailchimp = app('Mailchimp');


  $newsletterManager = new NewsletterManager($mailchimp);


  $newsletterManager->addEmailToList($email);


  echo "Please Confirm Subscription";

}
  
}

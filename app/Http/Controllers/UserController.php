<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Validator;

 use Response;

use DB;

use Mail;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

use Session;

use Illuminate\Support\Facades\Hash;

use App\NewsletterManager;

use App\Users_article;

use App\Article;

use App\Page;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
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
          
  $email = $request->email;


  $mailchimp = app('Mailchimp');


  $newsletterManager = new NewsletterManager($mailchimp);


  $newsletterManager->addEmailToList($email);

        
   
           
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
     return Redirect()->back();
    }

public function toAdmin(){
  $monFichier = fopen("fichiers/monFichier.txt","r+");
      $pages_vues = fgets($monFichier);
  return view('dashboard.admin',compact('pages_vues'));
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

         $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255'
        ]);

           if ($validator->fails()) {

             
              return Response::json(["error"=>true,'message'=>$validator->messages()],400);


        }


  $email = $request->email;


  $mailchimp = app('Mailchimp');


  $newsletterManager = new NewsletterManager($mailchimp);


  $newsletterManager->addEmailToList($email);


  echo "Please Confirm Subscription";

}

public function contact( Request  $request){


 $name = $request->input('name');
  $email = $request->input('email');
  $subject = $request->input('subject ');
  $message = $request->input('message ');

    $data=array('names'=>$name,'emails'=>$email,'subjects'=>$subject,'messages'=>$message);

  Mail::send('mail',$data,function($msg){
   $msg->from('groupeG1LSI@gmail.com','lolo');
    $msg->to('zakaria_aboud@hotmail.com')->subject('Nouveau Mail');
  });

 return Redirect()->back();

}

public function lister(Request $request){

  
  $list = Users_article::where('user_id',Auth::user()->id)->get();
  $listArticle = [];

  $listPage = Page::all();

  foreach ($list as $item) {
       $id_article = $item->article_id;
       $article = Article::find($id_article);
       $listArticle[] = $article;
  }

  $listArticle=array_reverse ($listArticle);

  $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $itemCollection = collect($listArticle);
 
        // Define how many items we want to be visible in each page
        $perPage = 6;
 
        // Slice the collection to get the items to display in current page
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
 
        // set url path for generted links
        $paginatedItems->setPath($request->url());
  
  return view('wishlist',["listArticle"=>$paginatedItems,"listPage"=>$listPage]);
}

public function remove(Request $request){
     $user_article = Users_article::where('user_id',Auth::user()->id)->where('article_id',$request->id)->first();
     $user_article->delete();
     return Redirect()->back();
}

public function about(){
  $listPage = Page::all();
  return view('about',compact("listPage"));
}
  
}

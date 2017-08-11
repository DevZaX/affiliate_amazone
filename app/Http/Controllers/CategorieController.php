<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use Illuminate\Http\UploadedFile;

use DB;

use App\Categorie;
class CategorieController extends Controller
{
   
    public function store(Request $request){
       $categorie= new Categorie();
	   $categorie->title_categorie = $request->input("title");

     if($request->hasFile('image')){
           $categorie->image_categorie = $request->image->store('image');
     }

	  
	   $categorie->save();
	   return redirect('/categories');
	}
     

     public function index(){
       $listCategorie = Categorie::all();
       return view('dashboard.categorie',compact("listCategorie"));
     }

     public function destroy(Request $request,$id){
     $categorie=Categorie::find($id);
     $categorie->delete();
     return redirect('/categories');
     }    


     public function update(Request $request){

      $id = $request->input("id");
       $categorie =Categorie::find($id);
       $categorie->title_categorie = $request->input("title");

     if($request->hasFile('image1')){
      $categorie->image_categorie =  $request->file('image1')->store('image');
    }
      
          // $categorie->image_categorie = $request->image1->store('image');
           



       $categorie->save();
     return redirect('/categories');
     }
}

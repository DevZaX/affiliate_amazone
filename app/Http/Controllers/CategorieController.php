<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use Illuminate\Http\UploadedFile;


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
}

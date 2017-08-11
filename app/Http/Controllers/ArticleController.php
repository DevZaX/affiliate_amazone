<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
 use Illuminate\Http\UploadedFile;

use DB;

use App\Article;
use App\Categorie;

class ArticleController extends Controller

{
	//affichage
	public function index(){
       $listArticle = Article::all();
       $listCategorie = Categorie::all();
       return view('dashboard.article',compact("listArticle","listCategorie"));
     }
    //ajout
     public function store(Request $request){
       $article= new Article();
	   $article->title_article = $request->input("title");
	   $article->description_article = $request->input("description");
	   $article->link = $request->input("link");
	   $article->price= $request->input("price");
	   $article->categorie_id= $request->input("listcategorie");
	   $article->nbre_vu =0;
	   $article->user_id=1;

     if($request->hasFile('image')){
           $article->image_article = $request->image->store('image');
     }

	  
	   $article->save();
	   return redirect('/articles');
	}
     

     

     public function destroy(Request $request,$id){
     $article=Article::find($id);
     $article->delete();
     return redirect('/articles');
     }    


     public function update(Request $request){

      $id = $request->input("id");
       $article =Article::find($id);
       $article->title_article = $request->input("title");
       $article->description_article = $request->input("description");
	   $article->link = $request->input("link");
	   $article->price= $request->input("price");
	   $article->categorie_id= $request->input("listcategorie");
	    $article->user_id=1;

     if($request->hasFile('image1')){
      $article->image_article =  $request->file('image1')->store('image');
    }
       $article->save();
     return redirect('/articles');
     }
}

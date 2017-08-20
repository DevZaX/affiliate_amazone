<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
 use Illuminate\Http\UploadedFile;

use DB;

use App\Article;
use App\Categorie;
use App\Page;

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

public function AfficheCategorie($title){
     $categorie = Categorie::where('title_categorie',$title)->get();

     $categorie = $categorie[0];
     
     //$listArticle=Article::where('categorie_id',$categorie->id)->get();

     $listArticle = $categorie->articles;
     $listPage=Page::all();
         return view('article',compact("listArticle","listPage"));
}

public function getArticlesAjax(Request $request){
             $id = $request->id;
             $listArticle = Article::where('id','>',$id)->orderBy('id')->limit(6)->get();
             $out = '';
             if(count($listArticle) != 0){
              foreach($listArticle as $article){
                            $out = $out .'
                             <div class="col-sm-4 wow " style="margin-bottom:50px;" >
            <div class="post-thumb">
              <a href="#"><img class="img-responsive" src="storage/'.$article->image_article.'" alt="" ></a> 
              <div class="post-meta">
                
                <span><i class="fa fa-heart"></i> 0 Likes</span> 
              </div>
             
            </div>
            <div class="entry-header">
             <h4 style="float: right;">'.$article->price.'</h4>
              <h3><a href="'.$article->link.'">'.$article->title_article.'</a></h3>

              


              <span class="date">'.$article->created_at.'</span>
              <span class="cetagory">in <strong>'.$article->categorie->title_categorie.'</strong></span>
            </div>
            <div class="entry-content">
              <p>'.$article->description_article.'</p>
            </div>
             <div>
            <a href="'.$article->link.'" style="float:right;width:30%;" class="btn btn-primary" target="_blank">Check Out</a>
            </div>
          </div>';

                           }

                           $out = $out.'<div class="load-more wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
          <a  id="read" class="btn-loadmore" data-id="'.$article->id.'"><i class="fa fa-repeat"></i> Load More</a>
        </div>  ';

                           echo $out;
             }
}

     
}

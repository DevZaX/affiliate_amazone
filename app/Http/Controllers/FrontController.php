<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Categorie;
use App\Page;

use App\Users_article;

use Auth;

class FrontController extends Controller
{
    	

    	public function index(){


    		      $monFichier = fopen("fichiers/monFichier.txt","r+");
		      $pages_vues = fgets($monFichier);
		      $pages_vues++;
		      fseek($monFichier, 0);
		      fputs($monFichier,$pages_vues);
		      fclose($monFichier);


		       $list = Article::orderBy('id','DESC')->limit(6)->get();
		       $listArticle=[];
		       $listArticleUser=[];

		       foreach ($list as $item) {
		       	 $id = $item->id;
		       	  $item->isSaved = false;
		       	 if(Auth::check())
		       	 	 $listArticleUser = Users_article::where('article_id',$id)->where('user_id',Auth::user()->id)->get();
		       	
		       	
			   if(count($listArticleUser)  == 1)
				$item->isSaved=true;
				 


				 $listArticle[] = $item;

		       	}
		       	
		       $listCategorie = Categorie::orderBy('id')->limit(6)->get();
		       $listPage = Page::all();
		       return view('index',compact("listArticle","listCategorie","listPage"));
     }

}

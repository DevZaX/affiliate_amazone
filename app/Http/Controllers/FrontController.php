<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Categorie;
use App\Page;

class FrontController extends Controller
{
    	

    	public function index(){
    		      $monFichier = fopen("fichiers/monFichier.txt","r+");
		      $pages_vues = fgets($monFichier);
		      $pages_vues++;
		      fseek($monFichier, 0);
		      fputs($monFichier,$pages_vues);
		      fclose($monFichier);
		       $listArticle = Article::orderBy('id','DESC')->limit(6)->get();
		       $listCategorie = Categorie::orderBy('id')->limit(6)->get();
		       $listPage = Page::all();
		       return view('index',compact("listArticle","listCategorie","listPage"));
     }

}

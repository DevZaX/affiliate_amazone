<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Categorie;
use App\Page;

class FrontController extends Controller
{
    	

    	public function index(){
		       $listArticle = Article::orderBy('id','DESC')->limit(6)->get();
		       $listCategorie = Categorie::all();
		       $listPage = Page::all();
		       return view('index',compact("listArticle","listCategorie","listPage"));
     }

}

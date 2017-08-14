<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Categorie;

class FrontController extends Controller
{
    	

    	public function index(){
       $listArticle = Article::all();
       $listCategorie = Categorie::all();
       return view('index',compact("listArticle","listCategorie"));
     }

}

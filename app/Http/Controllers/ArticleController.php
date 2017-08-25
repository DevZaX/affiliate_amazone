<?php
  
namespace App\Http\Controllers;
use Illuminate\Http\Request;
 use Illuminate\Http\UploadedFile;

use DB;

use Auth;

use Redirect;
use Validator;

use App\Article;
use App\Categorie;
use App\Page;
use App\Users_article;

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
     
     $listArticle=Article::where('categorie_id',$categorie->id)->orderBy('id','DESC')->paginate(6);

     //$listArticle = $categorie->articles;
     $listPage=Page::all();
         return view('article',compact("listArticle","listPage","categorie"));
}

public function getArticlesAjax(Request $request){
             $id = $request->id;
             $listArticle = Article::where('id','<',$id)->orderBy('id','DESC')->limit(6)->get();
             $out = '';
             if(count($listArticle) != 0){
              foreach($listArticle as $article){

                              if(Auth::check()){
                                  if(Auth::user()->type == "admin"){
                                      $out = $out .'
                             <div class="col-sm-4 wow article-div" style="margin-bottom:50px;" >
            <div class="post-thumb">
              <a href="#"><img class="img-responsive" src="storage/'.$article->image_article.'" alt="" ></a>
              <div class="post-meta">

                <span><i class="fa fa-heart"></i> 0 Likes</span>
              </div>

            </div>
            <div class="entry-header" style="height: 120px">
             <h4 style="float: right;">'.$article->price.'</h4>
              <h3><a href="'.$article->link.'">'.$article->title_article.'</a></h3>


               <button type="button"    style="float: right;" class="btn btn-danger disabled">Saved</button>


              <span class="date">'.$article->created_at.'</span>
              <span class="cetagory">in <strong>'.$article->categorie->title_categorie.'</strong></span>
            </div>
            <div class="entry-content" style="height: 200px">
              <p>'.$article->description_article.'</p>
            </div>
             <div>
            <a href="'.$article->link.'" style="float:right;width:30%;" class="btn btn-primary" target="_blank">Check Out</a>
            </div>
          </div>';

                                  }
                                  else{
                                        if($article->isSaved){
                                            $out = $out .'
                             <div class="col-sm-4 wow article-div" style="margin-bottom:50px;" >
            <div class="post-thumb">
              <a href="#"><img class="img-responsive" src="storage/'.$article->image_article.'" alt="" ></a>
              <div class="post-meta">

                <span><i class="fa fa-heart"></i> 0 Likes</span>
              </div>

            </div>
            <div class="entry-header" style="height: 120px">
             <h4 style="float: right;">'.$article->price.'</h4>
              <h3><a href="'.$article->link.'">'.$article->title_article.'</a></h3>

                <button type="button"    style="float: right;" class="btn btn-danger">Saved</button>


              <span class="date">'.$article->created_at.'</span>
              <span class="cetagory">in <strong>'.$article->categorie->title_categorie.'</strong></span>
            </div>
            <div class="entry-content" style="height: 200px">
              <p>'.$article->description_article.'</p>
            </div>
             <div>
            <a href="'.$article->link.'" style="float:right;width:30%;" class="btn btn-primary" target="_blank">Check Out</a>
            </div>
          </div>';

                                        }else{
                                            $out = $out .'
                             <div class="col-sm-4 wow article-div" style="margin-bottom:50px;" >
            <div class="post-thumb">
              <a href="#"><img class="img-responsive" src="storage/'.$article->image_article.'" alt="" ></a>
              <div class="post-meta">

                <span><i class="fa fa-heart"></i> 0 Likes</span>
              </div>

            </div>
            <div class="entry-header" style="height: 120px">
             <h4 style="float: right;">'.$article->price.'</h4>
              <h3><a href="'.$article->link.'">'.$article->title_article.'</a></h3>

                  <button id="save_'.$article->id.'" type="button"   onclick="save('.$article->id.')" style="float: right;" class="btn btn-danger">Save</button>


              <span class="date">'.$article->created_at.'</span>
              <span class="cetagory">in <strong>'.$article->categorie->title_categorie.'</strong></span>
            </div>
            <div class="entry-content" style="height: 200px">
              <p>'.$article->description_article.'</p>
            </div>
             <div>
            <a href="'.$article->link.'" style="float:right;width:30%;" class="btn btn-primary" target="_blank">Check Out</a>
            </div>
          </div>';

                                        }

                                  }
                              }else{
                                  $out = $out .'
                             <div class="col-sm-4 wow article-div" style="margin-bottom:50px;" >
            <div class="post-thumb">
              <a href="#"><img class="img-responsive" src="storage/'.$article->image_article.'" alt="" ></a>
              <div class="post-meta">

                <span><i class="fa fa-heart"></i> 0 Likes</span>
              </div>

            </div>
            <div class="entry-header" style="height: 120px">
             <h4 style="float: right;">'.$article->price.'</h4>
              <h3><a href="'.$article->link.'">'.$article->title_article.'</a></h3>

              <button style="float: right;" type="button" href="#"  data-toggle="modal" data-target="#exampleModal1" class="btn btn-danger" data-whatever="@mdo">Save
               </button>


              <span class="date">'.$article->created_at.'</span>
              <span class="cetagory">in <strong>'.$article->categorie->title_categorie.'</strong></span>
            </div>
            <div class="entry-content" style="height: 200px">
              <p>'.$article->description_article.'</p>
            </div>
             <div>
            <a href="'.$article->link.'" style="float:right;width:30%;" class="btn btn-primary" target="_blank">Check Out</a>
            </div>
          </div>';

                              }
                           }

                          $out = $out.'  <input type="hidden"  value="'.$article->id.'" id="identifiant"> ' ;
                           echo $out;
             }
}
//fin


public function ArticleCategorieAjax(Request $request){

             $id = $request->id;
             $title = $request->title;
             $categorie = Categorie::where('title_categorie',$title)->first();
             $listArticle = Article::where('id','<',$id)->where('categorie_id',$categorie->id)->orderBy('id','DESC')->limit(6)->get();
             $out = '';
             if(count($listArticle) != 0){
              foreach($listArticle as $article){
                            $out = $out .'
                             <div class="col-sm-4 wow article-div" style="margin-bottom:50px;" >
            <div class="post-thumb">
              <a href="#"><img class="img-responsive" src="{{asset("storage/'.$article->image_article.'")}}" alt="" ></a>
              <div class="post-meta">

                <span><i class="fa fa-heart"></i> 0 Likes</span>
              </div>

            </div>
            <div class="entry-header" style="height: 120px">
             <h4 style="float: right;">'.$article->price.'</h4>
              <h3><a href="'.$article->link.'">'.$article->title_article.'</a></h3>




              <span class="date">'.$article->created_at.'</span>
              <span class="cetagory">in <strong>'.$article->categorie->title_categorie.'</strong></span>
            </div>
            <div class="entry-content" style="height: 200px">
              <p>'.$article->description_article.'</p>
            </div>
             <div>
            <a href="'.$article->link.'" style="float:right;width:30%;" class="btn btn-primary" target="_blank">Check Out</a>
            </div>
          </div>';

                           }

                           $out = $out.'<center><div class="load-more3 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
          <a  id="read3" class="btn-loadmore" data-id="'.$article->id.'"><i class="fa fa-repeat"></i> Load More</a>
        </div></center>  ';

                           echo $out;
             }

}//fin


public function saveUser(Request $request){

  $id = $request->id;

     $user_article = new Users_article();
  $user_article->user_id = Auth::user()->id;
  $user_article->article_id = $id;
  $user_article->save();

  $article =Article::find($id);
  $article->nbre_vu++;
  $article->save();

  echo "Saved";

}

public function search(Request $request){
   $listPage = Page::all();
    $search = $request->input('search');
    $listArticle = Article::where('title_article','like','%'.$search.'%')->paginate(6);
     return view('search',compact("listArticle","listPage"));
}

     
}

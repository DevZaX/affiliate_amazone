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

       //dd($request->file('image1')->getMimeType());

     if($request->hasFile('image1')){
      $categorie->image_categorie =  $request->file('image1')->store('image');
    }
      
          // $categorie->image_categorie = $request->image1->store('image');
           



       $categorie->save();
     return redirect('/categories');
     }


     public function getCategorieAjax(Request $request){
             $id = $request->id;
             $listCategorie = Categorie::where('id','>',$id)->orderBy('id')->limit(6)->get();
             $out = '';
             if(count($listCategorie) != 0){
              foreach($listCategorie as $categorie){
                            $out = $out .'
                            <div class="col-sm-4 " style="margin-bottom:50px;">
          <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="400ms">
            <div class="folio-image">
              <img class="img-responsive"  src="storage/'.$categorie->image_categorie.'" alt="" style="width:300px;height:250px;">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>'.$categorie->title_categorie.'</h3>
                  
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a href="articles/'.$categorie->title_categorie.'" ><i class="fa fa-link"></i></a></span>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>';

                           }

                           $out = $out.'<center><div class="load-more2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
          <a  id="read2" class="btn-loadmore" data-id="'.$categorie->id.'"><i class="fa fa-repeat"></i>  More Categorie</a>
        </div></center> ';

                           echo $out;
             }
} //fin
}

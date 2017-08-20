<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;

class PageController extends Controller
{
    //


    public function create(){
       return view('dashboard.createPage');
     }



    public function store(Request $request){
              $page = new Page();
              $page->title_page = $request->input("title");
              $page->contenu = $request->input("contenu");
              $page->user_id = 1;
              $page->save();
              return redirect('/pages');
}


    public function index(){
       $listPage = Page::all();
       return view('dashboard.page',compact("listPage"));
     }


     public function destroy(Request $request,$id){
       $page = Page::find($id);
     $page->delete();
     return redirect('/pages');
     }

     public function update(Request $request,$id){
       $page = Page::find($id);
      $page->title_page = $request->input("title");
      $page->contenu = $request->input("contenu");
      $page->user_id = 1;
     $page->save();
     return redirect('/pages');
     }

     public function AffichePage($title){
          $page = Page::where('title_page',$title)->first();
          $listPage = Page::all();
          return view('page',compact("page","listPage"));
     }
}

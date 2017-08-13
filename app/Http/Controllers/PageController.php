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
          if($request->hasFile('mediai')){
                    $page->type = 'image';
                    $page->media = $request->file('mediai')->store('image');
          }else{
              $page->type = 'video';
              $page->media = $request->input('mediav');
              $page->save();
              return redirect('/pages');
          }
}


    public function index(){
       $listPage = Page::all();
       return view('dashboard.page',compact("listPage"));
     }
}

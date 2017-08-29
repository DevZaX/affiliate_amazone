@extends('master')

@section('title','Affiliate Amazone | search')
@section('content')

@include('nav1')


<section style="text-align: center;">
<h1>Search Result</h1>
</section>

<!-- section3 -->
  <section id="services">
    <div class="container">
      <div class="row">


       

      <div class="blog-posts">
        <div class="row">

        @if(count($listArticle) == 0)
             <p>nothing to show</p>
        @else     

@foreach($listArticle as $article)



          <div class="col-sm-4 article-div "  style="margin-bottom:50px;" >
      
            <div class="post-thumb"  >
              <a href="#"><img class="img-responsive" src="{{asset('storage/'.$article->image_article)}}" alt="" ></a> 
              <div class="post-meta">
                
                <span><i class="fa fa-heart"></i> {{$article->nbre_vu}} Likes</span> 
              </div>
             
            </div>
            <div class="entry-header" style="height: 120px">
             
              <h3><a href="{{$article->link}}">{{$article->title_article}}</a></h3>
              @if(Auth::check())

                              @if(Auth::user()->type=="admin")

                                <button type="button"    style="float: right;" class="btn btn-danger disabled">Saved</button>

                              @else

                                                                                                      @if($article->isSaved)
                                                                                         <button type="button"    style="float: right;" class="btn btn-danger">Saved</button>
                                                                                                      @else
                                                                                         <button id="save_{{$article->id}}" type="button"   onclick="save({{$article->id}})" style="float: right;" class="btn btn-danger">Save</button>
                                                                                                      @endif
                                 @endif                                                                     
     

      @else
      <button style="float: right;" type="button" href="#"  data-toggle="modal" data-target="#exampleModal1" class="btn btn-danger" data-whatever="@mdo">Save
               </button>
      @endif

              <h4 >{{$article->price}}</h4>
      
      
              


              <span class="date">{{$article->created_at}}</span>
              <span class="cetagory">in <strong>{{$article->categorie->title_categorie}}</strong></span>
            </div>
            <div class="entry-content" style="height: 200px">
              <p>{{$article->description_article}}</p>
            </div>
             <div style="margin-top: -55px;">
            <a href="{{$article->link}}" style="float:right;width:30%;position: relative;" class="btn btn-primary" target="_blank">Check Out</a>
            </div>
          </div>
    

@endforeach

     <center> {{$listArticle->links()}} </center>
        </div>
     
  @endif             
      </div>
    </div>
  </section><!--/#blog-->
<!-- endsection3-->

@endsection
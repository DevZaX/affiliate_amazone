@extends('master')
@section('content')

<!-- section3 -->
  <section id="services">
    <div class="container">

      <div class="blog-posts">
        <div class="row">

        @if(count($listArticle) == 0)
             <p>nothing to show</p>
        @else     

@foreach($listArticle as $article)
          <div class="col-sm-4 wow " style="margin-bottom:50px;" >
            <div class="post-thumb">
              <a href="#"><img class="img-responsive" src="{{asset('storage/'.$article->image_article)}}" alt="" ></a> 
              <div class="post-meta">
                
                <span><i class="fa fa-heart"></i> 0 Likes</span> 
              </div>
             
            </div>
            <div class="entry-header">
             <h4 style="float: right;">{{$article->price}}</h4>
              <h3><a href="{{$article->link}}">{{$article->title_article}}</a></h3>

              


              <span class="date">{{$article->created_at}}</span>
              <span class="cetagory">in <strong>{{$article->categorie->title_categorie}}</strong></span>
            </div>
            <div class="entry-content">
              <p>{{$article->description_article}}</p>
            </div>
             <div>
            <a href="{{$article->link}}" style="float:right;width:30%;" class="btn btn-primary" target="_blank">Check Out</a>
            </div>
          </div>

@endforeach

        @endif
        


<div id="readmore" style="display:none;">



</div>
         

                      
        </div>
        <div class="load-more wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
          <a  id="read" class="btn-loadmore"><i class="fa fa-repeat"></i> Load More</a>
        </div>                
      </div>
    </div>
  </section><!--/#blog-->
<!-- endsection3-->

@endsection
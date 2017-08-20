@extends('master')
@section('content')

<<!-- section3 -->
  <section id="services">
    <div class="container">
      <div class="row">


        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>{{$categorie->title_categorie}}</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
        </div>
      </div>


      <div class="blog-posts">
        <div class="row">

        @if(count($listArticle) == 0)
             <p>nothing to show</p>
        @else     

@foreach($listArticle as $article)
          <div class="col-sm-4 wow article-div "  style="margin-bottom:50px;" >
            <div class="post-thumb"  >
              <a href="#"><img class="img-responsive" src="{{asset('storage/'.$article->image_article)}}" alt="" ></a> 
              <div class="post-meta">
                
                <span><i class="fa fa-heart"></i> 0 Likes</span> 
              </div>
             
            </div>
            <div class="entry-header" style="height: 120px">
             <h4 style="float: right;">{{$article->price}}</h4>
              <h3><a href="{{$article->link}}">{{$article->title_article}}</a></h3>

              


              <span class="date">{{$article->created_at}}</span>
              <span class="cetagory">in <strong>{{$article->categorie->title_categorie}}</strong></span>
            </div>
            <div class="entry-content" style="height: 200px">
              <p>{{$article->description_article}}</p>
            </div>
             <div>
            <a href="{{$article->link}}" style="float:right;width:30%;position: relative;" class="btn btn-primary" target="_blank">Check Out</a>
            </div>
          </div>

@endforeach

    
        </div>
       <center>< <div class="load-more3 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
          <a  id="read3" class="btn-loadmore" data-id="{{$article->id}}"><i class="fa fa-repeat"></i> Load More</a>
        </div></center>

        <div id="readmore3">



</div>   
  @endif             
      </div>
    </div>
  </section><!--/#blog-->
<!-- endsection3-->

@endsection
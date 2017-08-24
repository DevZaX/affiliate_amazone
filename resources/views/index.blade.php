@extends('master')
@section('content')


 <header id="home">
@include('slide')

@include('main-nav')
  </header>
<!-- section1 -->
 <section id="portfolio">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <h2 style="margin-bottom:-100px;">Our Categories</h2>
        </div>
      </div> 
    </div>

@if(count($listCategorie) != 0)
@foreach($listCategorie as $categorie)
    <div class="container">
      <div class="row" >
        <div class="col-sm-4 " style="margin-bottom:50px;">
          <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="400ms">
            <div class="folio-image">
              <img class="img-responsive"  src="{{asset('storage/'.$categorie->image_categorie)}}" alt="" style="width:300px;height:250px;">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>{{$categorie->title_categorie}}</h3>
                  
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a href="{{url('/articles/'.$categorie->title_categorie)}}" ><i class="fa fa-link"></i></a></span>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
        @endforeach

           <input type="hidden"  value="{{$categorie->id}}" id="identifiant2"> 
       
          <div id="readmore2">
      
      </div>


      
     

    </div>
    <div>
       <center><div class="load-more2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
          <a  id="read2" class="btn-loadmore" ><i class="fa fa-repeat"></i>  More Categorie</a>
        </div></center>
        </div>

    @else 
     <p>  nothing to show </p>

     @endif



    <div id="portfolio-single-wrap">
      <div id="portfolio-single">
      </div>
    </div><!-- /#portfolio-single-wrap -->
  </section><!--/#portfolio-->

<!-- endsection1 -->


  <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" >
          <h2>Best Deals</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
        </div>
      </div>



  <!--/#services-->

<!-- section2 -->

  <section style="margin-top:-100px">

    <div class="container-fluid" >
      <div class="row">
       
      <img class="nature" src="images/titre.jpg" width="100%" height="300px">
      <img class="nature" src="images/titre2.jpg" width="100%" height="300px">
      <img class="nature" src="images/titre3.jpg" width="100%" height="300px">

<script>
w3.slideshow(".nature",1500);
</script>

      </div>
    </div>
  </section>

  <!-- endsection2 -->

<!-- section3 -->
  <section id="services">
    <div class="container">
      <div class="row">


        <div class="text-center col-sm-8 col-sm-offset-2 " data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>what's New</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
        </div>
      </div>


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
                
                <span><i class="fa fa-heart"></i> 0 Likes</span> 
              </div>
             
            </div>
            <div class="entry-header" style="height: 120px">
             
              <h3><a href="{{$article->link}}">{{$article->title_article}}</a></h3>
              @if(Auth::check())
      <button id="save_{{$article->id}}" type="button"   onclick="save({{$article->id}})" style="float: right;" class="btn btn-danger">Save</button>

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
    <input type="hidden"  value="{{$article->id}}" id="identifiant"> 
 <div id="readmore"></div>
   
   </div>
        <div class="load-more wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
          <a  id="read" class="btn-loadmore"><i class="fa fa-repeat"></i> Load More</a>
        </div>
  @endif             
      </div>
    </div>
  </section><!--/#blog-->
<!-- endsection3-->

@endsection
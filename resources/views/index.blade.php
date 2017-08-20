@extends('master')
@section('content')
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
       
       
        <div class="col-sm-4" style="margin-bottom:50px;">
          <div class="folio-item wow fadeInLeftBig"   data-wow-duration="1000ms" data-wow-delay="1000ms" style="border:2px solid:red;">
            <div class="folio-image">
              <img class="img-responsive" src="images/more.jpg" alt="" style="width:300px;height:250px;">
            </div>
           
          </div>
        </div>
      </div>
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


        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
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

      
        



         

                      
        </div>
        <div class="load-more wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
          <a  id="read" class="btn-loadmore" data-id="{{$article->id}}"><i class="fa fa-repeat"></i> Load More</a>
        </div>

        <div id="readmore">



</div>   
  @endif             
      </div>
    </div>
  </section><!--/#blog-->
<!-- endsection3-->

@endsection
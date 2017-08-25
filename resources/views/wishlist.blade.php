@extends('master')
@section('content')


 <header >

<style type="text/css">
  .main-nav1{
    background-color: #028fcc;
    position: fixed; /* Set the navbar to fixed position */
    top: 0; /* Position the navbar at the top of the page */
    width: 100%; /* Full width */
     z-index: 2000;

  }


</style>
    <!--/#home-slider-->
    <div class="main-nav1" style="margin-bottom:-60px">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a id="logo" class="navbar-brand" href="{{url('/')}}">
            <h1><img  src="{{asset('images/lg1.png')}}" alt="logo" ></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
         <form method="post" action="{{url('/logout')}}" id="formulaire"> 
         <style type="text/css">
           .navbar-right{margin-right: 12px;}
         </style>
          <ul class="nav navbar-nav navbar-right"> 

           <li><a href="#home">Home</a></li>
            <li ><a href="#portfolio">Categories</a></li>               
            <li ><a href="#services">Articles</a></li>
            <li ><a href="#about-us">About Us</a></li> 

         @if(Auth::check())
             @if(Auth::user()->type == "client")
             <li > <a href="#"> My Wishlist </a></li>
             @endif

         @else    
          
               <li > <a href="#"  data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">Login
               </a></li>
               <li>   <a href="#"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Register</a></li>
          @endif     
         
          @if(Auth::check())
            
            <li ><a href="#contact">Contact</a></li> 
                 <li class="menuhover">  
                 {{ csrf_field() }}
                <a href="#" onclick="document.getElementById('formulaire').submit()">Log Out</a>
            </li> 
           @endif


  </li>
 
<style>
ul.dropdown-menu {
    background-color: #028FCC;
}
ul.dropdown-menu:hover {
    background-color: #028FCC;
}
.nav .open > a, .nav .open > a:focus, .nav .open > a:hover {
    background-color: #0374a1;
}
.nav > li > a:focus, .nav > li > a:hover {
    background-color: #0374a1;
}




</style>



 
      @if(count($listPage) != 0)              
    <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> More pages </a>
               
              
              <ul class="dropdown-menu" class="aaa">
               @foreach($listPage as $page)
                 <li><a href="{{url('/pages/'.$page->title_page)}}" style="padding-top: 0px;  padding-bottom: 7px;" href="#">{{$page->title_page}}</a></li>
                @endforeach
              </ul>
    </li>
    @endif



          </ul>
          </form>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header>

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
          <div class="col-sm-4 wow article-div "  style="margin-bottom:50px;" >
            <div class="post-thumb"  >
              <a href="#"><img class="img-responsive" src="{{asset('storage/'.$article->image_article)}}" alt="" ></a> 
              <div class="post-meta">
                
                <span><i class="fa fa-heart"></i> {{$article->nbre_vu}} Likes</span> 
              </div>
             
            </div>
            <div class="entry-header" style="height: 120px">
             <h4 style="float: right;">{{$article->price}}</h4>
              <h3><a href="{{$article->link}}">{{$article->title_article}}</a></h3>
<form action="{{ url('/remove')}}" method="post" >
{{ csrf_field() }}
{{ method_field('DELETE') }}
<input type="hidden" name="id" value="{{  $article->id }}">
                  <button type="submit"    style="float: right;" class="btn btn-danger ">Remove</button>
</form>

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


<center>{{$listArticle->links()}}</center>

        </div>
     
  @endif             
      </div>
    </div>
  </section><!--/#blog-->
<!-- endsection3-->

@endsection

 <header id="home">
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url({{url('images/slider/4.jpg')}})">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Welcome to <span>Affiliate Amazon</span></h1>
            <p class="animated fadeInRightBig">The best deals - Here all what you need </p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Start now</a>
          </div>
        </div>
        <div class="item" style="background-image: url({{url('images/slider/cat.png')}}">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Best Article <span>Ever </span></h1>
            <p class="animated fadeInRightBig"> The best deals - Here all what you need </p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Start now</a>
          </div>
        </div>
        <div class="item" style="background-image: url({{url('images/slider/slide.jpg')}}">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Get What you<span> need</span></h1>
            <p class="animated fadeInRightBig">The best deals - Here all what you need </p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Start now</a>
          </div>
        </div>
      </div>
      <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>

      <a id="tohash" href="#services"><i class="fa fa-angle-down"></i></a>

    </div>


    <!--/#home-slider-->
    <div class="main-nav" style="margin-bottom:-60px">
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
  
  <!-- menu jedid -->
<!--@if(count($listPage)!=0)
<li class="scroll menuhover">
  <a id="drop"> Pages </a>
</li>


<div  style="margin-top:60px;padding-left: 30px;">
<style type="text/css">
  #aside{margin-left:0px;background-color: #028FCC; width: 200px;text-align: center;}
  .list{width: 100px;height: 50px;}
</style>
<ul id="aside">
@foreach($listPage as $page)
    <li class="list" style="list-style:none ;"><a href="{{url('/pages/'.$page->title_page)}}" style="color:white;text-transform: uppercase;font-size: 14px;font-weight: 600;" >{{$page->title_page}}</a></li>
 @endforeach
  </ul>
</div>
@endif
-->


          </ul>
          </form>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header>

 
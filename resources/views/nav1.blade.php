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


        <img style="margin-top: 7px;"  src="{{asset('images/lg1.png')}}" alt="logo" >

        </div>
        <div class="collapse navbar-collapse">
         <form method="post" action="{{url('/logout')}}" id="formulaire"> 
         <style type="text/css">
           .navbar-right{margin-right: 12px;}
         </style>
          <ul class="nav navbar-nav navbar-right"> 

           <li><a href="{{url('/')}}">Home</a></li>          
               <li ><a href="{{url('/about')}}">About Us</a></li> 

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
                <a  onclick="document.getElementById('formulaire').submit()">Log Out</a>
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
</form>

    </form>
    <form style="float: right;" action="{{url('/search')}}" method="post">
<style>
  .search-input{
        margin-top: 24px;
  }
</style>
<li><div class="search-input">{{csrf_field()}}<input required type="text" placeholder="Search" name="search"><button type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button> </li></div>
</form>


          </ul>

        </div>
      </div>
    </div><!--/#main-nav-->
  </header>
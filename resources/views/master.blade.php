 <!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>1Affiliate Amazon</title>
  <link href='{{asset("css/front/bootstrap.min.css")}}' rel="stylesheet">
  <link href='{{asset("css/front/animate.min.css")}}' rel="stylesheet"> 
  <link href='{{asset("css/front/font-awesome.min.css")}}' rel="stylesheet">
  <link href='{{asset("css/front/lightbox.css")}}' rel="stylesheet">
  <link href='{{asset("css/front/main.css")}}' rel="stylesheet">
  <link id="css-preset" href='{{asset("css/front/preset1.css")}}' rel="stylesheet">
  <link href='{{asset("css/front/responsive.css")}}' rel="stylesheet">
  <link href='{{asset("css/front/sweetalert.css")}}' rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/favicon.ico">
  <script src="https://www.w3schools.com/lib/w3.js"></script>

</head><!--/head-->

<body>

  <!--.preloader-->
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->

  <header id="home">
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(images/slider/4.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Welcome to <span>Affiliate Amazon</span></h1>
            <p class="animated fadeInRightBig">The best deals - Here all what you need </p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Start now</a>
          </div>
        </div>
        <div class="item" style="background-image: url(images/slider/cat.png)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Best Article <span>Ever </span></h1>
            <p class="animated fadeInRightBig"> The best deals - Here all what you need </p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Start now</a>
          </div>
        </div>
        <div class="item" style="background-image: url(images/slider/slide.jpg)">
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

    </div><!--/#home-slider-->
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
            <h1><img  src="images/lg1.png" alt="logo" ></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
         <form method="post" action="{{url('/logout')}}" id="formulaire"> 
          <ul class="nav navbar-nav navbar-right"> 

            <li class="scroll menuhover"><a href="#home">Home</a></li>
            <li class="scroll menuhover"><a href="#portfolio">Categories</a></li>               
            <li class="scroll menuhover"><a href="#services">Articles</a></li>
            <li class="scroll menuhover"><a href="#about-us">About Us</a></li> 

         @if(Auth::check())
             <li class="scroll menuhover"> <a href="#"> My Wishlist </a></li>
         @else    
          
               <li class="scroll menuhover"> <a href="#"  data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">Login
               </a></li>
               <li class="scroll menuhover">   <a href="#"  data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Register</a></li>
          @endif     
         
          @if(Auth::check())
            
            <li class="scroll menuhover"><a href="#contact">Contact</a></li> 
                 <li class="menuhover">  
                 {{ csrf_field() }}
                <a href="#" onclick="document.getElementById('formulaire').submit()">Log Out</a>
            </li> 
           @endif
  
          </ul>
          </form>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header>


@yield('content')

<!-- section4 -->
  <section id="contact">
   
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Contact Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
              <form id="main-contact-form" name="contact-form" method="post" action="#">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control form-control1" placeholder="Name" required="required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control1" placeholder="Email Address" required="required">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="subject" class="form-control form-control1" placeholder="Subject" required="required">
                </div>
                <div class="form-group">
                  <textarea name="message" id="message" class="form-control form-control1" rows="4" placeholder="Enter your message" required="required"></textarea>
                </div>                        
                <div class="form-group">
                  <button type="submit" class="btn-submit">Send Now</button>
                </div>
              </form>   
            </div>
            <div class="col-sm-6">
              <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                <ul class="address">
                  <li><i class="fa fa-map-marker"></i> <span> Address:</span> 2400 South Avenue A </li>
                  <li><i class="fa fa-phone"></i> <span> Phone:</span> +928 336 2000  </li>
                  <li><i class="fa fa-envelope"></i> <span> Email:</span><a href="mailto:someone@yoursite.com"> support@oxygen.com</a></li>
                  <li><i class="fa fa-globe"></i> <span> Website:</span> <a href="#">www.sitename.com</a></li>
                </ul>
              </div>                            
            </div>
          </div>
        </div>
      </div>
    </div>        
  </section>
<!-- endsection4 -->



<<!-- section5 -->
  <!--/#contact-->
  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        
        <div class="social-icons">
    <!-- form newsletter-->
      <form id="main-contact-form" name="contact-form" method="post" action="#">
                
                  <h2 class="newsletter">Subscribe to our newsletter</h2>
                 <center>
                    <div class="form-group">
                      <input type="email" name="email" class="news" placeholder="Email Address" required="required">
                    </div>
                  
                    <div class="form-group">
                      <button type="submit" class="newsletterbtn">Subscribe</button>
                    </div></center>


              </form>  
    <!-- fin form newsletter -->
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>&copy; 2017 Affiliate Amazone.</p>
          </div>
          
        </div>
      </div>
    </div>
  </footer>
  <!-- endsection5 -->

<!-- fr -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Create Account</h4>
        <div id="sucess" style="color: green;"></div>
      </div>
      <div class="modal-body">
    
        <form   class="form" action="" method="post">
      
      <div class="form-group has-feedback">

        <input type="email" class="form-control" placeholder="Email" name="email" id="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <div id="emailv" style="color: red;"></div>
      </div>

       {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <div id="passwordv" style="color: red;"></div>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation" id="retype">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div >
            <label>
              <input type="checkbox" name="term" id="term"> I agree to the <a href="#">terms</a>
            </label>
            <div id="checkboxv" style="color: red;"></div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button  type="button" id="Register" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
      </div>
    </div>
  </div>
</div>
<!-- le code de login -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel1">Login</h4>
      </div>
      <div class="modal-body">

       <form action="{{url('/login')}}" method="post">

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

       {{ csrf_field() }}

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password"  name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
          <a href="#">I forget my password</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
      </div>
    </div>
  </div>
</div>


  <script type="text/javascript" src='{{asset("js/front/jquery.js")}}'></script>
  <script type="text/javascript" src='{{asset("js/front/bootstrap.min.js")}}'></script>

  <script type="text/javascript" src='{{asset("js/front/jquery.inview.min.js")}}'></script>
  <script type="text/javascript" src='{{asset("js/front/wow.min.js")}}'></script>
  <script type="text/javascript" src='{{asset("js/front/mousescroll.js")}}'></script>

  <script type="text/javascript" src='{{asset("js/front/jquery.countTo.js")}}'></script>
  <script type="text/javascript" src='{{asset("js/front/lightbox.min.js")}}'></script>
  <script type="text/javascript" src='{{asset("js/front/main.js")}}'></script>
    <script type="text/javascript" src='{{asset("js/front/sweetalert.min.js")}}'></script>

<script type="text/javascript">
  $('#read').click(function(){
     $('#readmore').css("display","block");
  });
</script>

<script type="text/javascript">
$.ajaxSetup({
          headers:{
          'X-CSRF-TOKEN':'{!! csrf_token() !!}'
      }
      });

    $('#Register').click(function(){
      
         var data = $('.form').serialize();
         $('#emailv').text('');
        $('#passwordv').text('');
         $('#checkboxv').text('');
         $('#sucess').text('');
         $.ajax({

                  url:'/',
                  type:'post',
                  data:data,
                  success:function(seccessData){
                   
                      $('#sucess').append('<p>'+'your are registred successfuly'+'</p>')
                   },
                  error:function(errorData){
                     var message = errorData.responseJSON.message;
                     if(message.email != null)
                          $('#emailv').append('<p>'+message.email[0]+'</p>')
                     if(message.password != null)   
                          $('#passwordv').append('<p>'+message.password[0]+'</p>')
                    if(message.checkbox != null) 
                          $('#checkboxv').append('<p>'+message.checkbox[0]+'</p>')

                   }
     
   });
    });
</script>


</body>
</html>
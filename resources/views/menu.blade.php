  
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
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


  <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              
              <ul class="dropdown-menu" >
                 <li ><a  href="#">Action</a></li>
                 <li ><a  href="#">Action2</a></li>
              </ul>
    </li>

    
  <script type="text/javascript" src='{{asset("js/front/jquery.js")}}'></script>
  <script type="text/javascript" src='{{asset("js/front/bootstrap.min.js")}}'></script>

  <script type="text/javascript" src='{{asset("js/front/jquery.inview.min.js")}}'></script>
  <script type="text/javascript" src='{{asset("js/front/wow.min.js")}}'></script>
  <script type="text/javascript" src='{{asset("js/front/mousescroll.js")}}'></script>

  <script type="text/javascript" src='{{asset("js/front/jquery.countTo.js")}}'></script>
  <script type="text/javascript" src='{{asset("js/front/lightbox.min.js")}}'></script>
  <script type="text/javascript" src='{{asset("js/front/main.js")}}'></script>
    <script type="text/javascript" src='{{asset("js/front/sweetalert.min.js")}}'></script>

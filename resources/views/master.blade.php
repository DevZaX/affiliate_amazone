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
  <link href='{{asset("css/front/font-awesome.min.css")}}' rel="stylesheet">
  <!-- <link href='{{asset("css/front/lightbox.css")}}' rel="stylesheet">-->
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





@yield('content')

@include('contact')



<!-- section5 -->
  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="social-icons">

    <!-- form newsletter-->
      <form id="main-contact-form" name="contact-form" method="post" action="{{url('/subscribe')}}">
                  {{csrf_field()}}
                  <h2 class="newsletter">Subscribe to our newsletter</h2>
                  <h3 id="success-msg" style="color: white;"></h3>
                 <center>
                    <div class="form-group">
                      <input id="email" type="email" class="news" placeholder="Email Address" required="required">
                    </div>
                    <div class="form-group">
                      <button id="subscribe" type="button"  class="newsletterbtn">Subscribe</button>
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




@include('models')




  <script type="text/javascript" src='{{asset("js/front/jquery.js")}}'></script>
  <script type="text/javascript" src='{{asset("js/front/bootstrap.min.js")}}'></script>

  <!--<script type="text/javascript" src='{{asset("js/front/jquery.inview.min.js")}}'></script>-->
  <!--<script type="text/javascript" src='{{asset("js/front/wow.min.js")}}'></script>-->
  <!-- <script type="text/javascript" src='{{asset("js/front/mousescroll.js")}}'></script>-->

  <!--<script type="text/javascript" src='{{asset("js/front/jquery.countTo.js")}}'></script>-->
  <!--<script type="text/javascript" src='{{asset("js/front/lightbox.min.js")}}'></script>-->
  <script type="text/javascript" src='{{asset("js/front/main.js")}}'></script>
    <script type="text/javascript" src='{{asset("js/front/sweetalert.min.js")}}'></script>



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
                   
                      $('#sucess').append('<p>'+'you are registred successfuly'+'</p>')
                   },
                  error:function(errorData){
                     var message = errorData.responseJSON.message;
                     
                     if(message.email != null)
                          $('#emailv').append('<p>'+message.email[0]+'</p>')
                     if(message.password != null)   
                          $('#passwordv').append('<p>'+message.password[0]+'</p>')
                    if(message.term != null) 
                          $('#checkboxv').append('<p>'+message.term[0]+'</p>')

                   }
     
   });
    });
</script>

<script>

    
    $('#read').click(function(){
               var id= $('#identifiant').val();
        $.ajax({
                   url:'/getArticlesAjax',
                   type:'post',
                   data:{  id:id, _token:'{{csrf_token()}}' },
                   success:function(d){
                  
                     $('#identifiant').remove();
                     $('#readmore').append(d);
                   }
          });
    });
  
</script>
<script>
   
    
    $('#read2').click(function(){
             var id= $('#identifiant2').val();
        $.ajax({
                   url:'/getCategorieAjaxs',
                   type:'post',
                   data:{  id:id, _token:'{{csrf_token()}}' },
                   success:function(d){
                  
                                 $('#identifiant2').remove();
                                 $('#readmore2').append(d);
                   }
          });
    });
  
</script>

<script>
  $('#subscribe').click(function(){
                    var email = $('#email').val();
                     $('#success-msg').text('');
                    $.ajax({
                                    url:'/subscribe',
                                    type:'post',
                                    data:{email:email,_token:'{{csrf_token()}}'},
                                    success:function(d){
                                        $('#success-msg').append(d);
                                    },
                                    error:function(ee){
                                              var message = ee.responseJSON.message;
                                             $('#success-msg').append(message.email[0]);
                                    }
                    });
  });
</script>

<script>
     save = function(x){

               var idBtn = "save_"+x;
               $.ajax({
                url:'/save',
                type:'post',
                data:{id:x,_token:'{{csrf_token()}}'},
                success:function(d){
                     $('#'+idBtn).text(d);
                }
               });
             
     }

</script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Affiliate Amazon</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href='{{asset("css/back/bootstrap.min.css")}}'>

    <link rel="stylesheet" href='{{asset("css/back/dataTables.bootstrap.min.css")}}'>

  <!-- Font Awesome -->
  <link rel="stylesheet" href='{{asset("css/back/font-awesome.min.css")}}'>
  <!-- Ionicons -->
  <link rel="stylesheet" href='{{asset("css/back/ionicons.min.css")}}'>

   <link rel="stylesheet" href='{{asset("css/back/AdminLTE.min.css")}}'>
  <link rel="stylesheet" href='{{asset("css/back/_all-skins.min.css")}}'>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
  <!-- standar-->
  <!-- <script src="//cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script> -->
  <!-- full -->
      <script src="//cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
@include('dashboard.header')

  

        @yield('content')

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; 2017-2018 </strong> All rights
    reserved.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src='{{asset("js/back/jquery.min.js")}}'></script>

<script src='{{asset("js/back/dataTables.bootstrap.min.js")}}'></script>
<script src='{{asset("js/back/jquery.dataTables.min.js")}}'></script>

<!-- Bootstrap 3.3.7 -->
<script src='{{asset("js/back/bootstrap.min.js")}}'></script>
<!-- SlimScroll -->
<script src='{{asset("js/back/jquery.slimscroll.min.js")}}'></script>
<!-- FastClick -->
<script src='{{asset("js/back/fastclick.js")}}'></script>
<!-- AdminLTE App -->
<script src='{{asset("js/back/adminlte.min.js")}}'></script>
<!-- AdminLTE for demo purposes -->
<script src='{{asset("js/back/demo.js")}}'></script>





<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script type="text/javascript">
  $('#data').dataTable();
</script>
 
</body>
</html>

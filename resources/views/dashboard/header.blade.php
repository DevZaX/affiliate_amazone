  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
    
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src='{{asset("images/admin.png")}}' class="user-image" alt="User Image">
              <span class="hidden-xs" style="margin-right:10px;">Khalil</span>
            </a>
            <ul class="dropdown-menu">
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src='{{asset("images/admin.png")}}' class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="margin-top:12px">Khalil</p>
         
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       
        <li >
          <a href="{{url('/users')}}">
            <i class="glyphicon glyphicon-user"></i> <span>Users</span>
          </a>
        </li>

        <li >
          <a href="{{url('/categories')}}">
            <i class="glyphicon glyphicon-th-list"></i> <span>Categories</span>
          </a>
        </li>
        <li >
           <a  href="{{url('/articles')}}">
            <i class="glyphicon glyphicon-edit"></i> <span>Article</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-new-window"></i> <span>pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/create')}}"><i class="fa fa-circle-o"></i>Add Page</a></li>
            <li><a href="{{url('/pages')}}"><i class="fa fa-circle-o"></i> Pages</a></li>
          </ul>
        </li>
        <li >
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>comments</span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        dashboard

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>
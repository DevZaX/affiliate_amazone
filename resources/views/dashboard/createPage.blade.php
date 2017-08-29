@extends('dashboard.index')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="chmn">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/create') }}">Create Page</a></li>
      </ol>
      </div>
    </section>

      <section class="content">

      <!-- Default box -->
      <div class="box">

    <style>
        .formulaire{padding-top: 20px;}
        label{font-size: 1.2em;font-family: 'Raleway', sans-serif;}
    </style>

    <div class="container-fluid" ng-app="">
        <div class="formulaire">

        <form action="{{url('/pages')}}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="recipient-name" class="control-label">Title :</label>
                <input  required class="form-control" id="message-text" name="title" type="text">
            </div>

   
              
            <div class="form-group">
                <label for="recipient-name" class="control-label">Contenu :</label>

                <textarea required class="form-control" id='shortdescription' name="contenu" rows="12"></textarea>
                <script>
                    CKEDITOR.replace( "contenu" );
                </script>
            </div>



            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="valider">Add Page</button>
            </div>
        </form>
            </div>
    </div>



@endsection 



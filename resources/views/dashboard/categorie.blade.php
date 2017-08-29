@extends('dashboard.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="chmn">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="{{ url('/categories') }}"> Categories</a></li>
      </ol>
      </div>
    </section>

      <section class="content">

      <!-- Default box -->
      <div class="box">
  <div class="warper container-fluid">
          
            <div class="page-header"></h1></div>
            

<ul class="list-group">
<!-- debut button li kaytala3 pop up-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="float: left;">ADD Categorie </button>
            <br>
<!-- fin button li kaytala3 pop up-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
<!-- debut button close pop up li lfo9-->
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></br>
<!-- fin button close pop up li lfo9 -->
                          <center><h4 class="list-group-item list-group-item-info" id="exampleModalLabel" style="color: black"> ADD Categorie</h4></center>
                        </div>
<!-- debut body pop up-->


					  
					 
                        <div class="modal-body">
                          <form action="{{url('/categories')}}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}

                          <div class="form-group">
                                <label for="recipient-name" class="control-label">Title :</label>
                                <input  required class="form-control" id="message-text" name="title" type="text">
                            </div>            

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Image:</label>
                                <input required class="form-control" id="message-text" name="image" type="file">
                            </div>
 
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" name="valider">add Categorie</button>
                            </div>
                          </form>
                       </div>
   
<!-- fin pop up-->
   </ul>
    <div class="warper container-fluid" >
    
      <div class="row">
            <div class="col-md-14 col-md-offset-0" >
              
               
               <div class="panel-body">
       </br>
       <div >


       <style type="text/css">
         th{color:white;}
       </style>
@if(count($listCategorie) != 0 )
       <center> <table id="data" class="table table-bordered table table-hover" style="width:70%">
           <thead>
                <tr >
                       <th id="tdcolor" style="width:15%;background-color: RGB(40,96,144); !important  " ><center>title</center></th> 
                       <th id="tdcolor" style="width:30%; background-color: RGB(40,96,144); !important  " ><center>image</center></th> 
                       <th id="tdcolor" style="width:5%; background-color: RGB(40,96,144); !important  " ><center>Action</center> </th>


                      
               </tr>
             </thead>
     


<tbody>  
<?php $i = 0; ?>
@foreach($listCategorie as $categorie)
<?php $i++; ?>
       <tr>
       <!--Ref article  title Description Price link of article date de publication categorie image Action-->
       <td><center>{{$categorie->title_categorie}}</center></td>
          <td ><center><img alt='' src="{{asset('storage/'.$categorie->image_categorie)}}" width="75" height="75" /></center></td>
          
       
          <td> <!--<center><ul class="list-group">    
              <a onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'));" href="#" style="color:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>           
  			 </ul></center>-->
  			  <form action="{{url('/categories/'.$categorie->id)}}" method="POST">
			
			          {{ csrf_field() }}
					  
					  {{ method_field('DELETE') }}

					<ul class="list-group">    
              <button type="submit" onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'));"  style="color:red;border:0;background:transparent;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button> 
            <a  class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>" data-whatever="@mdo" style="float: left;"></a>

           
  			 </ul>
        


             
       
         
        
   </form>
    <ul class="list-group">
      
<!-- debut button li kaytala3 pop up-->
            <br>
<!-- fin button li kaytala3 pop up-->
                <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
<!-- debut button close pop up li lfo9-->
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></br>
<!-- fin button close pop up li lfo9 -->
                          <center><h4 class="list-group-item list-group-item-info" id="exampleModal<?php echo $i; ?>" style="color: black"> Update</h4></center>
                        </div>
<!-- debut body pop up-->


            
           
                        <div class="modal-body">
      <form enctype="multipart/form-data"  action="{{url('/categories/'.$categorie->id)}}" method="POST" >

                                {{ csrf_field() }}

                                 {{ method_field('PUT') }}

                          <div class="form-group">
                                <label for="recipient-name" class="control-label">Title:</label>
                                <input required class="form-control" id="message-text" name="title" type="text" value="{{$categorie->title_categorie}}">
                            </div>
                             
                                      <div class="form-group">
                              
                                <input type="hidden" required class="form-control" id="message-text" name="id" value="{{$categorie->id}}" >
                            </div>

                            <div>
                               <img alt='' src="{{asset('storage/'.$categorie->image_categorie)}}" style="width: 90px;height: 70px" />
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">image:</label>
                                <input  class="form-control" id="message-text" name="image1" type="file">
                            </div>
 
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" name="valider">update</button>
                            </div>
                          </form>
                       </div>
   
<!-- fin pop up-->
   </ul>              
       
         </td>
       </tr>
@endforeach

</tbody>
               	
   </table>
                @else
                     <p>Mesage pas d'existance !</p>  
                @endif
                
   </center>






   </div>
    </div>
    </div>
    </div>
   </div>
            
        </div>

   
@endsection
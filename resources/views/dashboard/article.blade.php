@extends('dashboard.index')
@section('content')

  <div class="warper container-fluid">
     <div class="page-header"></h1></div>

     
            <ul class="list-group">
            <!-- debut button li kaytala3 pop up-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="float: left;">ADD Article</button>
            <br>


            <!-- fin button li kaytala3 pop up-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
<!-- debut button close pop up li lfo9-->
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></br>
<!-- fin button close pop up li lfo9 -->
                          <center><h4 class="list-group-item list-group-item-info" id="exampleModalLabel" style="color: black"> ADD Article</h4></center>
                        </div>
<!-- debut body pop up-->


					  
					 
                        <div class="modal-body">
                          <form action="{{url('/articles')}}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}

                          <div class="form-group">
                                <label for="recipient-name" class="control-label">Title :</label>
                                <input  required class="form-control" id="message-text" name="title" type="text">
                            </div> 
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Description :</label>
                            
                                <textarea required class="form-control" id="message-text" name="description" max="250"></textarea>
                            </div> 
                             <div class="form-group">
                                <label for="recipient-name" class="control-label">Price :</label>
                                <input  required class="form-control" id="message-text" name="price" type="text">
                            </div> 
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Link :</label>
                                <input  required class="form-control" id="message-text" name="link" type="text">
                            </div>          

                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Image:</label>
                                <input required class="form-control" id="message-text" name="image" type="file">
                            </div>
                             <div class="form-group">
                                <label for="recipient-name" class="control-label">Categorie:</label>

                                <select   required   class="form-control" id="message-text" name="listcategorie"> 

                                @foreach($listCategorie as $categorie)
                                <option value="{{$categorie->id}}"> {{$categorie->title_categorie}} </option>

                                @endforeach
                                </select>
                            </div>
 
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" name="valider">add Article</button>
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
@if(count($listArticle) != 0 )
       <center> <table  class="table table-bordered table table-hover" style="width:70%">
           <thead>
                <tr >
                       <th id="tdcolor" style="width:15%;background-color: RGB(40,96,144); !important  " ><center>title</center></th> 
                       <th id="tdcolor" style="width:15%;background-color: RGB(40,96,144); !important  " ><center>description</center></th> 
                       <th id="tdcolor" style="width:15%;background-color: RGB(40,96,144); !important  " ><center>price</center></th> 
                       <th id="tdcolor" style="width:15%;background-color: RGB(40,96,144); !important  " ><center>vues</center></th> 
                       <th id="tdcolor" style="width:30%; background-color: RGB(40,96,144); !important  " ><center>image</center></th> 
                       <th id="tdcolor" style="width:5%; background-color: RGB(40,96,144); !important  " ><center>Action</center> </th>


                      
               </tr>
             </thead>
     


<tbody>  
<?php $i = 0; ?>
@foreach($listArticle as $article)
<?php $i++; ?>
       <tr>
       <!--Ref article  title Description Price link of article date de publication article image Action-->
       <td><center>{{$article->title_article}}</center></td>
       <td><center>{{$article->description_article}}</center></td>
       <td><center>{{$article->price}}</center></td>
       <td><center>{{$article->nbre_vu}}</center></td>
          <td ><center><img alt='' src="{{asset('storage/'.$article->image_article)}}" width="75" height="75" /></center></td>
          
       
          <td> <!--<center><ul class="list-group">    
              <a onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'));" href="#" style="color:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>           
  			 </ul></center>-->
  			  <form action="{{url('/articles/'.$article->id)}}" method="POST">
			
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
      <form enctype="multipart/form-data"  action="{{url('/articles/'.$article->id)}}" method="POST" >

                                {{ csrf_field() }}

                                 {{ method_field('PUT') }}

                         <div class="form-group">
                                <label for="recipient-name" class="control-label">Title :</label>
                                <input  required class="form-control" id="message-text" name="title" type="text" value="{{$article->title_article}}">
                            </div> 
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Description :</label>
                            
                                <textarea required class="form-control" id="message-text" name="description" max="250" > {{$article->description_article}}</textarea>
                            </div> 
                             <div class="form-group">
                                <label for="recipient-name" class="control-label">Price :</label>
                                <input  required class="form-control" id="message-text" name="price" type="text" value="{{$article->price}}">
                            </div> 
                             <div class="form-group">

                                <input  required class="form-control" id="message-text" name="id" type="hidden" value="{{$article->id}}">
                            </div> 
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Link :</label>
                                <input  required class="form-control" id="message-text" name="link" type="text" value="{{$article->link}}">
                            </div>          
                          <div class="form-group">
                                <label for="recipient-name" class="control-label">Categorie:</label>
                                <select value="{{$categorie->title_categorie}}" required class="form-control" id="message-text" name="listcategorie"> 

                                @foreach($listCategorie as $categorie)
                                <option value="{{$categorie->id}}"> {{$categorie->title_categorie}} </option>

                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Image:</label>
                                <input required class="form-control" id="message-text" name="image1" type="file">
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
                     <p>Aticle does not exist !</p>  
                @endif
                
   </center>






   </div>
    </div>
    </div>
    </div>
   </div>
            
        </div>

   
@endsection
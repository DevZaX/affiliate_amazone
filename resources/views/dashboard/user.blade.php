@extends('dashboard.index')
@section('content')
  <div class="warper container-fluid">
          
            <div class="page-header"></h1></div>
            

<ul class="list-group">
      
<!-- debut button li kaytala3 pop up-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="float: left;">Update your  profile </button>
            <br>
<!-- fin button li kaytala3 pop up-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
<!-- debut button close pop up li lfo9-->
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></br>
<!-- fin button close pop up li lfo9 -->
                          <center><h4 class="list-group-item list-group-item-info" id="exampleModalLabel" style="color: black"> Update</h4></center>
                        </div>
<!-- debut body pop up-->


					  
					 
                        <div class="modal-body">
                          <form action="{{url('/users')}}" method="POST">

                                {{ csrf_field() }}

                          <div class="form-group">
                                <label for="recipient-name" class="control-label">Email:</label>
                                <input value="{{$user->email}}" required class="form-control" id="message-text" name="email" type="text">
                            </div>
                             
                                      <div class="form-group">
                              
                                <input type="hidden" required class="form-control" id="message-text" name="id" value="{{$user->id}}" >
                            </div>


                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Password:</label>
                                <input required class="form-control" id="message-text" name="password" type="password">
                            </div>
 
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" name="valider">update</button>
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
@if(count($listUser) != 0 )
       <center> <table id="a" class="table table-bordered table table-hover" style="width:70%">
           <thead>
                <tr >
                       <th id="tdcolor" style="width:15%;background-color: RGB(40,96,144); !important  " ><center>Nom</center></th> 
                       <th id="tdcolor" style="width:30%; background-color: RGB(40,96,144); !important  " ><center>Email</center></th> 
                       <th id="tdcolor" style="width:5%; background-color: RGB(40,96,144); !important  " ><center>Action</center> </th>


                      
               </tr>
             </thead>
     


<tbody>  
@foreach($listUser as $user)
       <tr>
       <!--Ref article  title Description Price link of article date de publication categorie image Action-->
       <td><center>exemple</center></td>
          <td ><center>{{$user->email}}</center></td>
          
       
          <td> <!--<center><ul class="list-group">    
              <a onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'));" href="#" style="color:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>           
  			 </ul></center>-->
  			  <form action="{{url('/users/'.$user->id)}}" method="POST">
			
			          {{ csrf_field() }}
					  
					  {{ method_field('DELETE') }}

					 <center><ul class="list-group">    
              <button type="submit" onclick="return(confirm('Etes-vous sûr de vouloir supprimer?'));"  style="color:red;border:0;background:transparent;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>          
  			 </ul></center>
   </form>
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
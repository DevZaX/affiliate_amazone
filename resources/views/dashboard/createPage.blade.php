@extends('dashboard.index')

@section('content')

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
                <label for="recipient-name" class="control-label">Choose your media's type :</label>
                  <select style="margin-bottom: 10px;width: 80px;" ng-model="select">
                          <option>video</option>
                          <option>image</option>
                  </select>
            </div>
         
<div ng-if="select==''">
    
</div>


<div ng-if="select=='video'">
           <div class="form-group">
                <label for="recipient-name" class="control-label">Video URL :</label>
                <input  required class="form-control" id="message-text" name="media" type="text">
            </div>
</div>
<div ng-if="select=='image'">
         <div class="form-group">
                <label for="recipient-name" class="control-label">Image :</label>
                <input  required class="form-control" id="message-text" name="media" type="file">
            </div>
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



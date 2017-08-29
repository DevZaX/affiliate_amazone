@extends('master')

@section('title','Affiliate Amazone | My wishlist')
@section('content')

@include('nav1')
<!-- section3 -->
  <section id="services">
    <div class="container">
      <div class="row">



      <div class="blog-posts">
        <div class="row">

        @if(count($listArticle) == 0)
             <p>nothing to show</p>
        @else     

@foreach($listArticle as $article)
          <div class="col-sm-4 wow article-div "  style="margin-bottom:50px;" >
            <div class="post-thumb"  >
              <a href="#"><img class="img-responsive" src="{{asset('storage/'.$article->image_article)}}" alt="" ></a> 
              <div class="post-meta">
                
                <span><i class="fa fa-heart"></i> {{$article->nbre_vu}} Likes</span> 
              </div>
             
            </div>
            <div class="entry-header" style="height: 120px">
             <h4 style="float: right;">{{$article->price}}</h4>
              <h3><a href="{{$article->link}}">{{$article->title_article}}</a></h3>
<form action="{{ url('/remove')}}" method="post" >
{{ csrf_field() }}
{{ method_field('DELETE') }}
<input type="hidden" name="id" value="{{  $article->id }}">
                  <button type="submit"    style="float: right;" class="btn btn-danger ">Remove</button>
</form>

              <span class="date">{{$article->created_at}}</span>
              <span class="cetagory">in <strong>{{$article->categorie->title_categorie}}</strong></span>
            </div>
            <div class="entry-content" style="height: 200px">
              <p>{{$article->description_article}}</p>
            </div>
             <div>
            <a href="{{$article->link}}" style="float:right;width:30%;position: relative;" class="btn btn-primary" target="_blank">Check Out</a>
            </div>
          </div>

@endforeach


<center>{{$listArticle->links()}}</center>

        </div>
     
  @endif             
      </div>
    </div>
  </section><!--/#blog-->
<!-- endsection3-->

@endsection
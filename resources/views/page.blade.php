@extends('master')

@section('title','Affiliate Amazone | page')

@section('content')

@include('nav1')

    <section>


        <h1 style="text-align: center;">{{$page->title_page}}</h1>


       <div class="cont"> 
   {!! $page->contenu !!}
      </div>
       

    </section>
@endsection
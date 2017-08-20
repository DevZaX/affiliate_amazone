@extends('master')
@section('content')

    <section>


        <h1 style="text-align: center;">{{$page->title_page}}</h1>


       <div class="cont"> 
   {!! $page->contenu !!}
      </div>
       

    </section>
@endsection
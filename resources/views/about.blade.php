@extends('master')

@section('title','Affiliate Amazone | about us')

@section('content')


@include('nav1')

<section>


<div class="about-title">
<h1>About us</h1>

</div>
<div class="container">
    <div class="row">

<style>
    @media screen and (max-width:600px){
        .c{
            text-align: center;
        }
    }
</style>

        <div class="col-md-2 c">
            <img class="about-img" src="{{asset('images/about.jpg')}}" height="180" width="180">
        </div>



        <div class="col-md-10 ">

            <p><b>Affiliate4amazon.com All products in one place.</b></p>
            <p>The fastest growing digital shooping marketplace where 1 million customers come to browse over <b>10 million</b> products</b> from <b>10000 thousand sellers.</b></p>
            <p>
                Many items listed on this site do return a small commission for product referral, however this is not the sole motivation for featuring an item. Our staff regularly lists products that we receive absolutely no compensation
            </p>
            <p>this website running by highly skilled group of professionals.</p>

        </div>

    </div>
</div>

    <div class="container staf-center">
        <div class="staf"><h3>Our Staff</h3></div>

            <div class="row">
                <div class="col-md-4">
                    <img class="staf-img" src="{{asset('images/salma.png')}}" width="250" height="250" >
                    <p class="staf-name">salma</p>
                    <a href="" class="btn btn-primary" ><i class="fa fa-facebook"></i></a>
                    <a href="" class="btn btn-primary" ><i class="fa fa-twitter"></i></a>
                    <a href="" class="btn btn-primary"><i class="fa fa fa-linkedin"></i></a>
                </div>
                <div class="col-md-4">
                    <img class="staf-img" src="{{asset('images/zakariae.png')}}" width="250" height="250">
                    <p class="staf-name">zakariae</p>
                    <a href="" class="btn btn-primary" ><i class="fa fa-facebook"></i></a>
                    <a href="" class="btn btn-primary" ><i class="fa fa-twitter"></i></a>
                    <a href="" class="btn btn-primary"><i class="fa fa fa-linkedin"></i></a>
                </div>
                <div class="col-md-4">
                    <img class="staf-img" src="{{asset('images/asma.png')}}" width="250" height="250">
                    <p class="staf-name">asma</p>
                    <a href="" class="btn btn-primary" ><i class="fa fa-facebook"></i></a>
                    <a href="" class="btn btn-primary" ><i class="fa fa-twitter"></i></a>
                    <a href="" class="btn btn-primary"><i class="fa fa fa-linkedin"></i></a>
                </div>
            </div>

    </div>


</section>
@endsection
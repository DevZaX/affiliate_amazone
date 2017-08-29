@extends('dashboard.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="chmn">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
      </div>
    </section>

      <section class="content">

      <!-- Default box -->
      <div class="box">

<h2>Le nombre de vue:{{$pages_vues}}</h2>



@endsection
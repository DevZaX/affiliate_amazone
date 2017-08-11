<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
   public function hello(){
   	$name='salmaaaaaaaaaaaaaaaaa';
   	return view('admin',compact("name"));
   }
}

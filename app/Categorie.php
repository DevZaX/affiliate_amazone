<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
     protected $fillable = [
         'title_categorie', 'image_categorie'];


              public function articles(){
			       return $this->hasMany('App\Article');
			  }
}

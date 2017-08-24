<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
         'title_article', 'description_article','link','price','nbre_vu','image_article'];



         	public function categorie(){
				     return $this->belongsTo('App\Categorie');
				}

}

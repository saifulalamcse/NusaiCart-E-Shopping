<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table = 'tbl_category';
   public function Category(){
   	return $this->belongsTo(Category::class,'category_id','category_id');
   }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'tbl_brand';
     public function Product(){
   	return $this->hasOne(Prodctuc::class,'category_id');
   }

}

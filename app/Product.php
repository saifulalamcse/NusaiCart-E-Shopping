<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_product';

    public function Category(){
    	return $this->belongsTo(Category::class,'category_id');
    }
    public function Brand(){
    	return $this->belongsTo(Brand::class,'brand_id');
    }


}

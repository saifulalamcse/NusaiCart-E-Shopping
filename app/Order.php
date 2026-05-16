<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $table = 'tbl_order';
   public function Users(){
   	return $this->belongsTo(User::class,'customer_id');
   }
}

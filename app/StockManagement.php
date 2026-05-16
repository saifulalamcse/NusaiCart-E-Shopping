<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockManagement extends Model
{
    protected $filable=[
    	'product_id',
	    'date',
	    'stock_in',
	    'stock_out',
	    'buy_price',
	    'sell_price',
	    'delete_status',

    ];
    public function products(){
    	return $this->belongTo(Product::class,'product_id');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use App\Product;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
   public function show_cart()
     {
        return view('pages.add_to_cart');     
     }

   public function add_to_cart(Request $request)
    {
        $product=Product::where('product_id',$request->product_id)->first();

        $qty=$request->qty;
        $product_id=$request->product_id;
        if($qty<=$product->qty)
        {
            $product_info=DB::table('tbl_product')
                         ->where('product_id',$product_id)      
                         ->first();
        
            $data['qty']=$qty;
            $data['id']=$product_info->product_id;
            $data['name']=$product_info->product_name;
            $data['price']=$product_info->product_price;
            $data['options']['image']=$product_info->product_image;

            Cart::add($data);
            return Redirect::to('/show-cart');
        }
        else
        {
            Session::put('message','This product already out of quantity!!');
            return Redirect::to('/show-cart');
        }
        

    }


         public function delete_cart($rowId)
         {
             Cart::update($rowId,0);
             return Redirect::to('/show-cart');

         }

         public function update_cart(Request $request)
    {
        $qty=$request->qty;
        $rowId=$request->rowId;
      
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');

    }

         
}

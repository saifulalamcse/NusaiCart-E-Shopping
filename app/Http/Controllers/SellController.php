<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class SellController extends Controller
{
    public function index()
    {
         
    	return view('pages.sell_product');
    }


    public function save_sell(Request $request)
    {
    	$data=array();
    	$data['product_name']=$request->product_name;
    	$data['mobile_number']=$request->mobile_number;
        $data['product_description']=$request->product_description;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['publication_status']=$request->publication_status;

         $image=$request->file('product_image'); 
        if($image)
        	{
        	$image_name=uniqid();
        	$ext=strtolower($image->getClientOriginalExtension());
        	$image_full_name=$image_name.'.'.$ext;
        	$upload_path='sellimage/';
        	$image_url=$upload_path.$image_full_name;
        	$success=$image->move($upload_path,$image_full_name);

        	if($success)
     	    {
        		$data['product_image']=$image_url;	
                DB::table('tbl_sell')->insert($data);
                Session::put('message','product Upload successfuly');
                return Redirect::to('/sell-product');
        	}
        }    
        	
    }

    public function old_product()
    {
           $old_product_published=DB::table('tbl_sell')
                         
                        ->select('tbl_sell.*')
                        ->where('tbl_sell.publication_status', 1)
                        
                        ->get();

            return view('pages.view_sell_product',['old_product_published'=>$old_product_published]);
    }



    public function old_product_details($product_id)
    {
       $old_pro_details=DB::table('tbl_sell')
                         

                         ->select('tbl_sell.*')

                         ->where('tbl_sell.product_id',$product_id)
                         ->where('tbl_sell.publication_status', 1)
                        ->first();
                        return view('pages.old_product_details',['old_pro_details'=>$old_pro_details]);
    }


     public function sell_products()
    {
         $this->AdminCheck();

       $old_product_sell=DB::table('tbl_sell')
                         
                        ->select('tbl_sell.*')
                        ->get();

       return view('admin.sell_products',['old_product_sell'=>$old_product_sell]);
    }


public function unactive_products($product_id)
    {
    	DB::table('tbl_sell')
            ->where('product_id',$product_id)
            ->update(['publication_status' => 0]);
        Session::put('message','Product unactive Successfully !!');
        return redirect::to('/old-products');
    }

    public function active_products($product_id)
    {
    	DB::table('tbl_sell')
            ->where('product_id',$product_id)
            ->update(['publication_status' => 1]);
        Session::put('message','Product active Successfully !!');
        return redirect::to('/old-products');
    }

    public function delete_products($product_id)
     {
        DB::table('tbl_sell')
            ->where('product_id',$product_id)
            ->delete();

            Session::put('message','Product Deleted Successfully !!');
            return Redirect::to('/old-products');
     }




     public function AdminCheck()
   {
     $admin_id=Session::get('admin_id');
     if($admin_id)
     {
        return;
     }
     else
     {
        return Redirect::to('/admin')->send();
     }
   }


 }

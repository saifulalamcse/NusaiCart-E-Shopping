<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use App\Category;
use App\Brand;
use App\Product;
use Illuminate\Support\Facades\Redirect;
session_start(); 

class ProductController extends Controller
{
    public function index()
    {
         $this->AdminCheck();

          $category=Category::where('publication_status',1)->orderBy('id','ace')->get();
          $brand=Brand::where('publication_status',1)->get();
    	return view('admin.add_product',compact('category','brand'));
    }

    public function all_product()
    {
         $this->AdminCheck();

       $all_product_info=Product::with(['Category','Brand'])
                        ->get();

       $manage_product=view('admin.all_product')  
                      ->with('all_prod_info',$all_product_info);
       return view('admin_layout')
                      ->with('admin.all_product',$manage_product);
    }




    public function save_product(Request $request)
    {
        
    	$data=array();
    	$data['product_name']=$request->product_name;
        $data['qty']=$request->qty;
    	$data['category_id']=$request->category_id;
    	$data['brand_id']=$request->brand_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['publication_status']=$request->publication_status;

         $image=$request->file('product_image'); 
        if($image)
        	{
        	$image_name=uniqid();
        	$ext=strtolower($image->getClientOriginalExtension());
        	$image_full_name=$image_name.'.'.$ext;
        	$upload_path='image/';
        	$image_url=$upload_path.$image_full_name;
        	$success=$image->move($upload_path,$image_full_name);

        	if($success)
        	{
        		$data['product_image']=$image_url;	
                // return $data;
                DB::table('tbl_product')->insert($data);
                Session::put('message','product added successfuly');
                return Redirect::to('/add-product');
        	}
        }
        else{
        $data['product_image']='';
         DB::table('tbl_product')->insert($data);
        Session::put('message','product added successfuly without image');
        return Redirect::to('/add-product');

        }

       
        	
    }
    
    public function unactive_product($product_id)
    {
    	DB::table('tbl_product')
            ->where('product_id',$product_id)
            ->update(['publication_status' => 0]);
        Session::put('message','Product unactive Successfully !!');
        return redirect::to('/all-product');
    }

    public function active_product($product_id)
    {
    	DB::table('tbl_product')
            ->where('product_id',$product_id)
            ->update(['publication_status' => 1]);
        Session::put('message','Product active Successfully !!');
        return redirect::to('/all-product');
    }

    public function delete_product($product_id)
     {
        DB::table('tbl_product')
            ->where('product_id',$product_id)
            ->delete();

            Session::put('message','Product Deleted Successfully !!');
            return Redirect::to('/all-product');
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
   public function FindProduct(Request $request){
    $key=$request->search_query;
    $product=Product::with(['Category','Brand'])->where('product_name','LIKE','%'.$key.'%')->get();
    if(count($product)>0 && !empty($key)){
    return $product;    
        }
        else{
            $product='';
        }
   }
}

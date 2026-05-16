<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function show_product_by_category($category_id)
    {
       $pro_by_category=DB::table('tbl_product')
                         ->join('tbl_category','tbl_product.category_id','=','tbl_category.id')
                         
                         ->select('tbl_product.*','tbl_category.category_name')
                         ->where('tbl_category.id',$category_id)
                         ->where('tbl_product.publication_status', 1)
                         ->limit(9)
                        ->get();
                        return view('pages.category_by_products',['pro_by_category'=>$pro_by_category]);
    }



    public function show_product_by_brand($brand_id)
    {
       $pro_by_brand=DB::table('tbl_product')
                         ->join('tbl_category','tbl_product.category_id','=','tbl_category.id')
                         ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.id')
                         ->select('tbl_product.*','tbl_category.category_name','tbl_brand.brand_name')
                         ->where('tbl_brand.id',$brand_id)
                         ->where('tbl_product.publication_status', 1)
                         ->limit(9)
                        ->get();
                        return view('pages.brand_by_products',['pro_by_brand'=>$pro_by_brand]);
    }



    public function product_deatils_by_id($product_id)
    {
       $pro_by_details=DB::table('tbl_product')
                         ->join('tbl_category','tbl_product.category_id','=','tbl_category.id')
                         ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.id')

                         ->select('tbl_product.*','tbl_category.category_name','tbl_brand.brand_name')

                         ->where('tbl_product.product_id',$product_id)
                         ->where('tbl_product.publication_status', 1)
                        ->first();
                        return view('pages.product_details',['pro_by_details'=>$pro_by_details]);
    }


}

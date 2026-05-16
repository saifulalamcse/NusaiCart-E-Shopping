<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start(); 

class BrandController extends Controller
{
    public function index()
    {
        $this->AdminCheck();

    	return view('admin.add_brand');
    }


    public function save_brand(Request $request)
    {
        // return $request;

        $data=array();
        // $data['id']=$request->id;
        $data['brand_name']=$request->brand_name;
        $data['brand_description']=$request->brand_description;
        $data['publication_status']=$request->publication_status;
        // $brand=new Brand();
        // $brand->name

       DB::table('tbl_brand')->insert($data);

       Session::put('message','Brand added Successfully !!');

       return Redirect::to('/add-brand');
    }

    public function all_brand()
    {
        $this->AdminCheck();
    	$all_bra_info=DB::table('tbl_brand')->get();
        $manage_branded=view('admin.all_brand')  
             ->with('all_brand_info',$all_bra_info);


        return view('admin_layout')
               ->with('admin.all_brand',$manage_branded);
    }

    public function delete_brand($id)
     {
        DB::table('tbl_brand')
            ->where('id',$id)
            ->delete();
            Session::put('message','Brand Deleted Successfully !!');
            return Redirect::to('/all-brand');
     }

     public function unactive_brand($id)
    {
        DB::table('tbl_brand')
            ->where('id',$id)
            ->update(['publication_status' => 0]);
        Session::put('message','Brand unactive Successfully !!');

        return redirect::to('/all-brand');

    }

    public function active_brand($id)
    {
        DB::table('tbl_brand')
            ->where('id',$id)
            ->update(['publication_status' => 1]);
        Session::put('message','Brand activate Successfully !!');

        return redirect::to('/all-brand');
    }

    public function edit_brand($id)
    {
        $this->AdminCheck();
        
        $all_brand_info=DB::table('tbl_brand')
            ->where('id',$id)
            ->first();

        $brand_info=view('admin.edit_brand')  
            ->with('all_brand_info',$all_brand_info);

        return view('admin_layout')
               ->with('admin.edit_brand',$brand_info);


        //return view('admin.edit_category');
    }

    public function update_brand(Request $request,$id)
    {
        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_description']=$request->brand_description;

        DB::table('tbl_brand')
            ->where('id',$id)
            ->update($data);

            Session::put('message','Brand update Successfully !!');
            return Redirect::to('/all-brand');
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

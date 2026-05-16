<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start(); 

class CategoryController extends Controller
{
    public function index()
    {
        $this->AdminCheck();
    	return view('admin.add_category');
    }

    public function all_category()
    {
        $this->AdminCheck();
    	$all_category_info=DB::table('tbl_category')->get();
        $manage_category=view('admin.all_category')  
             ->with('all_categ_info',$all_category_info);

        return view('admin_layout')
               ->with('admin.all_category',$manage_category);
    }
    

     public function save_category(Request $request)
    {

        $data=array();
        $data['id']=$request->id;
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;

       DB::table('tbl_category')->insert($data);

       Session::put('message','Category added Successfully !!');

       return Redirect::to('/add-category');
    }

    public function unactive_category($id)
    {
        DB::table('tbl_category')
            ->where('id',$id)
            ->update(['publication_status' => 0]);
        Session::put('message','Category unactive Successfully !!');

        return redirect::to('/all-category');


    }

    public function active_category($id)
    {
        DB::table('tbl_category')
            ->where('id',$id)
            ->update(['publication_status' => 1]);
        Session::put('message','Category activate Successfully !!');

        return redirect::to('/all-category');
    }

    public function edit_category($id)
    {
         $this->AdminCheck();

        $all_category_info=DB::table('tbl_category')
            ->where('id',$id)
            ->first();

        $category_info=view('admin.edit_category')  
            ->with('all_categ_info',$all_category_info);

        return view('admin_layout')
               ->with('admin.edit_category',$category_info);

    }
      
        
    public function update_category(Request $request,$id)
    {
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;

        DB::table('tbl_category')
            ->where('id',$id)
            ->update($data);

            Session::put('message','Category update Successfully !!');
            return Redirect::to('/all-category');
    }
    

     public function delete_category($id)
     {
        DB::table('tbl_category')
            ->where('id',$id)
            ->delete();

            Session::put('message','Category Deleted Successfully !!');
            return Redirect::to('/all-category');
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
 	
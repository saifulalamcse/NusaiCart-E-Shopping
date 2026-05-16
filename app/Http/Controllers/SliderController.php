<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start(); 

class SliderController extends Controller
{
//------------------------this is add slider----------------------------------------
    public function index()
    {
    	$this->AdminCheck();
    	return view('admin.add_slider');
    }

 //-----------------------this is save slider----------------------------------------

    public function save_slider(Request $request)
    {
    	$data=array();
    	$data['publication_status']=$request->publication_status;

    	  $image=$request->file('slider_image'); 
        if($image)
        	{
        	$image_name=uniqid();
        	$ext=strtolower($image->getClientOriginalExtension());
        	$image_full_name=$image_name.'.'.$ext;
        	$upload_path='slider/';
        	$image_url=$upload_path.$image_full_name;
        	$success=$image->move($upload_path,$image_full_name);

        	if($success)
        	{
        		$data['slider_image']=$image_url;	
                DB::table('tbl_slider')->insert($data);
                Session::put('message','Slider added successfuly');
                return Redirect::to('/add-slider');
        	}
        }

        $data['slider_image']='';
        DB::table('tbl_slider')->insert($data);
        Session::put('message','Slider added successfuly without image');
        return Redirect::to('/add-slider');
    }

 //====================this is image slider----------------------------------------

      public function all_slider()
    {
        $this->AdminCheck();
    	$all_slider_information=DB::table('tbl_slider')->get();
        $manage_slider=view('admin.all_slider')  
             ->with('all_slider_info',$all_slider_information);

        return view('admin_layout')
               ->with('admin.all_slider',$manage_slider);
    }

//-------------------this is unactive slider----------------------------------------

    public function unactive_slider($slider_id)
    {
    	DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->update(['publication_status' => 0]);
        Session::put('message','slider unactive Successfully !!');
        return redirect::to('/all-slider');
    }

//-------------------this is active slider----------------------------------------


    public function active_slider($slider_id)
    {
    	DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->update(['publication_status' => 1]);
        Session::put('message','slider active Successfully !!');
        return redirect::to('/all-slider');
    }

    //-------------------this is delete slider----------------------------------------


    public function delete_slider($slider_id)
     {
        DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->delete();

            Session::put('message','slider Deleted Successfully !!');
            return Redirect::to('/all-slider');
     }

//-------------------this is auth security slider----------------------------------------

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

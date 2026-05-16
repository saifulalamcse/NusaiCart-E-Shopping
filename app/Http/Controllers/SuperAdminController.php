<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start(); 

class SuperAdminController extends Controller
{
  

   public function index()
   {
   	 $this->AdminCheck();
   	 return view ('admin.dashboard');
   }


    public function logout()
   {
   	 Session::flush();
   	 return Redirect::to('/admin');
   }

   public function view_deliver()
   {
     $this->AdminCheck();
     return view ('admin.ad_delevery_man');
   }

    public function save_deliver(Request $request)
    {

        $data=array();
        $data['id']=$request->id;
        $data['name']=$request->name;
        $data['mobile']=$request->mobile;
        $data['email']=$request->email;

       DB::table('tbl_deliveryman')->insert($data);

       Session::put('message','man added Successfully !!');

       return back();
    }

    public function all_deliver()
    {
        $this->AdminCheck();
      $all_deliver_man=DB::table('tbl_deliveryman')->get();
      return view('admin.all_deli_man',['all_deliver_man'=>$all_deliver_man]);
        
    }

    public function delete_delivery($id)
     {
        DB::table('tbl_deliveryman')
            ->where('id',$id)
            ->delete();

            Session::put('message','Delivery Man Deleted Successfully !!');
             return back();
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




<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use App\Order;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
use DB;
session_start(); 

class CouponController extends Controller
{
    public function index()
    {
       
        return view('admin.add_coupon');
    }

    public function save_coupon(Request $request)
    {
        
        $data=array();
        $data['id']=$request->id;
        $data['coupon_code']=$request->coupon_code;
        $data['amount']=$request->amount;
        $data['amount_type']=$request->amount_type;
        $data['expiry_date']=$request->expiry_date;
        $data['status']=$request->status;

       DB::table('coupons')->insert($data);

       Session::put('message','Coupon added Successfully !!');

       return Redirect::to('/add-coupon');
    }

    public function all_coupon()
    {
     
        $coupons=DB::table('coupons')->get();

        return view('admin.view_coupons',['coupons'=>$coupons]);

      
    }

 
    
    public function delete_coupon($id)
     {
        DB::table('coupons')
            ->where('id',$id)
            ->delete();
            Session::put('message','Coupon Deleted Successfully !!');
            return Back();
     }

     public function edit_coupon($id)
    {
         

        $edit_coupons=DB::table('coupons')
            ->where('id',$id)
            ->first();

        return view('admin.edit_coupon',['edit_coupons'=>$edit_coupons]);

    }

     public function update_coupon(Request $request,$id)
    {
        $data=array();
        $data['amount']=$request->amount;
        $data['amount_type']=$request->amount_type;
        $data['expiry_date']=$request->expiry_date;

        DB::table('coupons')
            ->where('id',$id)
            ->update($data);

            Session::put('message','Coupon update Successfully !!');
            return Redirect::to('/all-coupon');
    }

    public function applyCoupon(Request $request)
      {
           

            $data=$request->all(); 
            $couponCount = Coupon::where('coupon_code',$data['coupon_code'])->count();
            if($couponCount == 0){
           Session::put('message','This Coupon doesnot exist!!');
           return Back();
                     
            }
            else
            {
                //get coupon details
                $couponDetails = Coupon::where('coupon_code',$data['coupon_code'])->first();

                // $orderCheck=Order::where('coupon_id',$couponDetails->id)->first();
                
                //if coupon inactive
                if($couponDetails->status == 0)
                {
                 Session::put('message','This Coupon is not active!!');
                return Back();
                     
                }
                //if coupon is expired
                $expiry_date = $couponDetails->expiry_date;
                $current_date = date('m-d-y');
                if($expiry_date < $current_date)
                {
                Session::put('message','This Coupon is expired');
                return Back();
                
                }

                $product_id = Session::get('product_id');
                $usercart=DB::table('tbl_product')
                         ->where('product_id',$product_id)      
                         ->get();
                $total_amount = 0;
                foreach($usercart as $v_content) {
                    $total_amount = $total_amount + ($v_content->product_price * $v_content->qty);
                }



                if($couponDetails->amount_type == "Fixed")
                {
                    $couponAmount = $couponDetails->amount;
                }
                else
                {
                    $couponAmount = $total_amount * ($couponDetails->amount/100);
                }
                Session::put('CouponAmount',$couponAmount);
                Session::put('Couponid',$couponDetails->id);

                Session::put('message','Coupon code applied successfully!! You are availing discount');
                return Back();

            }
       }

    
    
}

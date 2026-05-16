<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Users;
use Cart;
use App\Product;
use App\Order;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
session_start(); 

class OrderController extends Controller
{
 
    public function manage_order()
    {
    

       $all_order_info=DB::table('tbl_order')
                        ->join('users','tbl_order.customer_id','=','users.id')
                         
                        ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
                        
                         
                        ->select('tbl_order.*','users.name','tbl_payment.payment_method')


                        // ->select('tbl_order.*','users.name')
                        ->get();

       $manage_order=view('admin.manage_order')   
                      ->with('all_order_info',$all_order_info);
       return view('admin_layout')
                      ->with('admin.manage_order',$manage_order);
  

    }

    public function view_order($order_id)
    {
   
        $order_by_id=DB::table('tbl_order')
                        ->join('users','tbl_order.customer_id','=','users.id')
                        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
                        ->select('tbl_order.*','tbl_order_details.*','tbl_shipping.*','users.*')
                        ->where('tbl_order_details.order_id',$order_id)
                        ->get();
                      

       $view_order=view('admin.view_order')  
                      ->with('order_by_id',$order_by_id);
       return view('admin_layout')
                      ->with('admin.view_order',$view_order);

    }

    public function my_order()
     {
       $order=Order::where('customer_id',Auth::user()->id)->get();
        

            return view('pages.my_oredr',compact('','order'));
     }

      public function  order_details($order_id)
     {
      $order_details=DB::table('tbl_order')
                        ->join('users','tbl_order.customer_id','=','users.id')
                        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
                        ->select('tbl_order.*','tbl_order_details.*','tbl_shipping.*','users.*')
                        ->where('tbl_order_details.order_id',$order_id)
                        ->get();
                      

       $view_orders=view('pages.order_details')  
                      ->with('order_details',$order_details);
       return view('welcome')
                      ->with('pages.order_details',$view_orders);
                   
     }

     public function    track_order($order_id)
     {
      $track_orders=DB::table('tbl_order')
                        ->join('users','tbl_order.customer_id','=','users.id')
                        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
                        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
                        ->select('tbl_order.*','tbl_order_details.*','tbl_shipping.*','users.*')
                        ->where('tbl_order_details.order_id',$order_id)
                        ->get();
                      
                        return view('myaccount.order_track',['track_orders'=>$track_orders]);
                   
     }



      public function delete_order($order_id)
     {
        DB::table('tbl_order')
            ->where('order_id',$order_id)
            ->delete();

            Session::put('message','order Deleted Successfully !!');
            return Redirect::to('/manage-order');
     }



     public function orderStatusUpdate(Request $request){
      // return $request;
        if(isset($request->order_id) && isset($request->order_status)){
          //save order status
          $uptStatus =DB::table('tbl_order')->where('order_id',$request->order_id)
          ->update(['order_status' => $request->order_status]);
  
          if($uptStatus){
            return back();
            Session::put('message','Oredr status change Successfully !!');
          }
          else{
            return back();
            Session::put('message','You have something wrong!!');
          }
        }
      }


  public function payment()
     {
      
            return view('pages.payment');  
     }


    public function order_place(Request $request)
     {
    
       $payment_geteway=$request->payment_method;

//-----------payment function-----------
       $paymentdata=array();
       $paymentdata['payment_method']=$payment_geteway;
       $paymentdata['payment_status']='pending';

       $payment_id=DB::table('tbl_payment')
                ->insertGetId($paymentdata);


//-----------order function-----------    
       $orderdata=array();
       $orderdata['customer_id']=Auth::user()->id;
       $orderdata['shipping_id']=Session::get('shipping_id');
       $orderdata['payment_id']=$payment_id;
       $orderdata['order_total']=Session::get('new_total');

       $orderdata['coupon_id']=Session::get('Couponid');
       $orderdata['order_status']='pending';
       // $orderdata['coupon_code']='';


       $order_id=DB::table('tbl_order')
                ->insertGetId($orderdata);


//-----------order deatils function-----------   
       $content=Cart::content();
       $odetailsdata=array();

       foreach ($content as $v_content) 
       {
           
            $old_product=Product::where('product_id',$v_content->id)->first();

            if($old_product->qty>0 && $old_product->qty>=$v_content->qty)
            {
              $odetailsdata['order_id']=$order_id;
              $odetailsdata['product_id']=$v_content->id;
              $odetailsdata['product_name']=$v_content->name;
              $odetailsdata['product_price']=$v_content->price;
              $odetailsdata['product_sales_quantity']=$v_content->qty;

              DB::table('tbl_order_details')
                 ->insert($odetailsdata);

              DB::table('tbl_product')
                 ->where('product_id',$v_content->id)
                 ->update(['qty'=>$old_product->qty-$v_content->qty]);
            }
           

       }

       if ( $payment_geteway=='handcash') 
       {
           Cart::destroy();
           // Session::flush();
            Session::forget('CouponAmount');
            Session::forget('Couponid');
           return view ('pages.handcash');
           
       }
       elseif ( $payment_geteway=='cart') 
       {
           // sslapi();
           echo "cart";
           return view ('pages.handcash');
       }
       elseif ( $payment_geteway=='bkash') 
       {
           echo "bkash";
       }
       else
       {
         echo "Payment method not selected";
       }


     }

//-----------------payment API function--------------------
     // private function sslapi()
     // {

     // }

}

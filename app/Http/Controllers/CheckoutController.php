<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Cart;
use App\Product;
use App\Http\Requests;
use App\Users;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
	  public function login_check()
    {
        return view ('auth.login');
    }

    public function CheckoutPage(Request $request){
        $total=$request->total_amount;
        Session::put('new_total',$total);
         return view ('pages.checkout');
    }

      public function regi_check()
    {
        return view ('auth.register');
    }


      public function save_shipping_deatils(Request $request)
    {
      
        $data=array();
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_first_name']=$request->shipping_first_name;
        $data['shipping_last_name']=$request->shipping_last_name;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_mobile_number']=$request->shipping_mobile_number;
        $data['shipping_city']=$request->shipping_city;

        $shipping_id=DB::table('tbl_shipping')
        ->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return Redirect::to ('/payment');
    }

   
}

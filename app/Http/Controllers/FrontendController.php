<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Product;

use Session;

class FrontendController extends Controller
{
   
   public function index(){
   	$all_published_pro=Product::with(['Category','Brand']) 
   						->limit(9)
                    	->get();
    return view('pages.home_content',compact('all_published_pro'));
   }

   public function contact_admin()
    {
         
    	return view('pages.contact');
    }

      public function addreview(Request $request){
      DB::table('tbl_review')->insert(
    ['person_name' => $request->person_name, 'person_email' => $request->person_email,
      'review_content' => $request->review_content,
      'created_at' => date("Y-m-d H:i:s"),'updated_at' =>date("Y-m-d H:i:s")]
      );
      return back();
    }


}

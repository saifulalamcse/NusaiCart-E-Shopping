@extends('welcome')
@section('content')

	<p class="alert-success">
                     <?php 
                      $message=Session::get('message');
                      if ($message)
                      {
                      	echo $message;
                      	Session::put('message',null);

                      }

                      ?>									
					</p>
	<section id="cart_items">
		<div class="container col-sm-12">
		
			<div class="table-responsive cart_info">
                 <?php 
                    
                    $content=Cart::content();
                    
                 ?>

				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($content as $v_content) {?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{$v_content->options->image}}" height="80px"
								width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_content->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$v_content->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{url('/update-cart')}}" method="post">
										{{csrf_field()}}
									<input class="cart_quantity_input" type="text" name="qty" value="{{$v_content->qty}}" autocomplete="off" size="2">
									<input type="hidden" name="rowId" value="{{$v_content->rowId}}">
									<input  type="submit" name="submit" value="update" class="btn btn-sm btn-default">
								    </form>
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_content->total}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php }?> 
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			
			<div class="row">
			
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<p>Have a coupon code ?</p>
							<form action="{{url('/apply-coupon')}}" method="post">
							{{csrf_field()}}
								<label> Add Coupon </label>
								<input type="text" name="coupon_code">
				                <input type="submit" value="Apply"class="btn btn-default">
                           </form>
                            </li>
                            
				         </ul>
				    </div>
				</div> 
				
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<!-- {{ Session::get('CouponAmount') ?? '' }} -->
                            @if(Session::get('CouponAmount'))

                            <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                            <li>Coupon Discount <span>{{Session::get('CouponAmount')}}</span></li>
                            <li>Eco Tax <span>0.00</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Grand Total <span>{{Cart::total() - Session::get('CouponAmount')}}</span></li>
                            <!-- <li>Eco Tax <span>{{Cart::tax()}}</span></li -->
                            
                            @else
                            <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                            <li>Eco Tax <span>0.00</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Grand Total <span>{{Cart::total()}}</span></li>
                            

                            @endif
                        </ul>
						
							@auth
							<form   action="{{route('checkout.page')}}" method="get" >
								<input type="hidden" name="coupon_id" value="{{Session::get('Couponid') ?? ''}}">
								<input type="hidden" name="total_amount" value="{{Cart::total() - Session::get('CouponAmount') ?? ''}}">
								<button class="btn btn-default check_out">{{__('home.checkout_menu')}}</button>
							</form>
                               <!--  <a class="btn btn-default check_out" href="{{route('checkout.page')}}">{{__('home.checkout_menu')}}</a> -->
                            @else
                                <a class="btn btn-default check_out" href="{{URL::to('/login-check')}}">Check Out</a>
                            @endauth
					</div>
				</div>
			</div>
        </div>
		
	</section><!--/#do_action-->

@endsection
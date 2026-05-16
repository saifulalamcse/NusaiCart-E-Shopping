@extends('welcome')
@section('content')


<section id="cart_items">
		<div class="container col-sm-12">
			
			<div class="table-responsive cart_info">
				<?php
                     $contents=Cart::content();

				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($contents as $v_contents) {?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($v_contents->options->image)}}" height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_contents->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$v_contents->price}}</p>
							</td>
							<td class="cart_quantity">
							<div class="cart_quantity_button">
								
									<input class="cart_quantity_input" type="text" name="qty" value="{{$v_contents->qty}}" autocomplete="off" size="2">
									<input  type="hidden" name="rowId" value="{{$v_contents->rowId}}" >
									
							
							</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_contents->total}}</p>
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
		
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Payment method</li>
			</ol>
		</div>
		<div class="paymentCont col-sm-8">
					<div class="headingWrap">
							<h3 class="headingTop text-center">Select Your Payment Method</h3>	
							
					</div>

				<form action="{{url('/order-place')}}" method="post">
					{{csrf_field()}}
					<div class="paymentWrap">
						<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
							<label class="btn paymentMethod">
				            	<div class="method master-card"></div>
				                <input type="radio" name="payment_method" value="cart"> 
				            </label>
				            <label class="btn paymentMethod active">
				            	<div class="method visa"></div>
				                <input type="radio" name="payment_method" value="handcash" checked> 
				            </label>
				            
				            <label class="btn paymentMethod">
			            		<div class="method amex"></div>
				                <input type="radio" name="payment_method" value="bkash">
				            </label>
					      
	     
				        </div>        
					</div>
					   <label class="btn paymentMethod">
			                     <input type="submit" class="btn btn-default" value="Done">
				       </label>
				</form>
			</div>
	</div>
</section><!--/#do_action-->



@endsection



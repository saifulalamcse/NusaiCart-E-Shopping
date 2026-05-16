@extends('welcome')
@section('content')
				
				<div class="col-sm-9 padding-right">
					<div class="product-details">
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to($old_pro_details->product_image)}}" alt="" />
								
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information">
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>Name: {{$old_pro_details->product_name}}</h2>
						
								<img src="i{{URL::to('frontend/mages/product-details/rating.png')}}" alt="" />
								<span>
								    <span>{{$old_pro_details->product_price}} /-</span>

								
								</span>
								<p><b>Availability: </b> In Stock</p>
								<p><b>Condition: </b>Old</p>
								<p><b>Size: </b>{{$old_pro_details->product_size}}</p>
								<p><b>Contact: </b>{{$old_pro_details->mobile_number}}</p>
								
							</div>
						</div>
					</div>
					
					<div class="category-tab shop-details-tab">
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
							
								
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >					
							<p>{{$old_pro_details->product_description}}</p>
							</div>
							
						</div>
							
						</div>
					</div>
					
					

@endsection
@extends('welcome')
@section('content')
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to($pro_by_details->product_image)}}" alt="" />
								
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>Name: {{$pro_by_details->product_name}}</h2>
								<p>Color: {{$pro_by_details->product_color}}</p>
								<img src="i{{URL::to('frontend/mages/product-details/rating.png')}}" alt="" />
								<span>
								    <span>{{$pro_by_details->product_price}} /-</span>

									     <form action="{{url('/add-to-cart')}}" method="post" >
										{{  csrf_field() }}

									     <label>Quantity:</label>
									     <input name="qty" type="text" value="1" />
									     <input name="product_id" type="hidden" value="{{$pro_by_details->product_id}} " />
									     <button type="submit" class="btn btn-fefault cart">
										 <i class="fa fa-shopping-cart"></i>
										 Add to cart
									     </button>
								    </form>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b>{{$pro_by_details->brand_name}}</p>
								<p><b>Category:</b>{{$pro_by_details->category_name}}</p>
								<p><b>Size:</b>{{$pro_by_details->product_size}}</p>
							
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					<?php $reviews = DB::table('tbl_review')->get();
                    $count_reviews = count($reviews);?>
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews ({{$count_reviews}})</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >					
							<p>{{$pro_by_details->product_long_description}}</p>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
                                    
                                @foreach($reviews as $review)
 

									<ul>
										<li><a href=""><i class="fa fa-user"></i>{{$review->person_name}}</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>
                                      {{date('H: i', strtotime($review->created_at))}}</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>
                                        {{date('F j, Y', strtotime($review->created_at))}}</a></li>
									</ul>
									<p>{{$review->review_content}}</p>
                                    
                                     @endforeach

									<p><b>Write Your Review</b></p>
									
							 <form action="{{url('/addReview')}}" method="post">
                                  {{ csrf_field() }}
                                    <span>
                                        <input type="text" name="person_name" placeholder="Your Name"/>
                                        <input type="email", name="person_email" placeholder="Email Address"/>
                                    </span>
                                    <textarea placeholder="Write your review" name="review_content" ></textarea>
                                  


										<button type="submit" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					

@endsection
@extends('admin_layout')
@section('admin_content')


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

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Old product</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Product ID</th>
								  <th>Customer Mobile</th>
								  <th>Product Name</th>
								  <th>Product Image</th>
								  <th>Product price</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
 
						  <tbody>
                          @foreach($old_product_sell as $v_products)  
							 <tr>
								<td>{{$v_products->product_id}}</td>
								<td class="center">{{$v_products->mobile_number}}</td>
								<td class="center">{{$v_products->product_name}}</td>
								<td><img src="{{URL::to($v_products->product_image)}}" style="height: 80px; width: 80px"></td>
								<td class="center">{{$v_products->product_price}} Tk</td>
								
								
								<td class="center">
									@if($v_products->publication_status==1)
									<span class="label label-success">Active</span>
									@else
									<span class="label label-danger">Unactive</span>
									@endif
								</td>

								<td class="center">
									@if($v_products->publication_status==1)
									<a class="btn btn-danger " href="{{URL::to('/unactive-products/'.$v_products->product_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/active-products/'.$v_products->product_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif

									<!-- <a class="btn btn-info" href="{{URL::to('/edit-product/'.$v_products->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a> -->

									<a class="btn btn-danger" 
									href="{{URL::to('/delete-products/'.$v_products->product_id)}}" onclick="return confirm('Are you sure');">
										<i class="halflings-icon white trash"></i> 
									</a>

								</td>
							</tr>
						
						  @endforeach

						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection
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
						<h2><span class="break"></span>All Brands</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Brand ID</th>
								  <th>Brand Name</th>
								  <th>Brand Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
 
                          @foreach($all_brand_info as $v_brand)  
						  <tbody>
							<tr>
								<td>{{$v_brand->id ?? ''}}</td>
								<td class="center">{{$v_brand->brand_name}}</td>
								<td class="center">{{$v_brand->brand_description}}</td>
								
								<td class="center">
									@if($v_brand->publication_status==1)
									<span class="label label-success">Active</span>
									@else
									<span class="label label-danger">Unactive</span>
									@endif
								</td>

								<td class="center">
									@if($v_brand->publication_status==1)
									<a class="btn btn-danger " href="{{URL::to('/unactive-brand/'.$v_brand->id ?? '')}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/active-brand/'.$v_brand->id ?? '')}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif

									<a class="btn btn-info" href="{{URL::to('/edit-brand/'.$v_brand->id ?? '')}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" 
									href="{{URL::to('/delete-brand/'.$v_brand->id)}}" onclick="return confirm('Are you sure');">
										<i class="halflings-icon white trash"></i> 
									</a>

									<!-- <a class="btn btn-danger" 
									href="{{URL::to('/delete-brand/'.$v_brand->id ?? '')}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a> -->

								</td>
							</tr>
						@endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection
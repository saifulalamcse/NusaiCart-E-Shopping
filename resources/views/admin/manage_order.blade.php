@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
				<li>
					
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Orders</a></li>
			</ul>
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Orders</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order ID</th>
								  <th>Customer Name</th>
								  <th>Payment Method</th>
								  <th>Oredr Total</th>
								  <th>Oredr Date</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
                          
                          @foreach($all_order_info as $v_order)  
						  <tbody>
							<tr>
								<td>{{$v_order->order_id}}</td>
								<td class="center">{{$v_order->name}}</td>
								<td class="center">{{$v_order->payment_method}}</td>
								<td class="center">{{$v_order->order_total}}</td>
								<td class="center">{{$v_order->created_at}}</td>
								<td class="center">
								<form action="{{url('/orderStatusUpdate')}}" method="get" class="myFormName" onchange="">
									<input type="hidden" name="order_id" value="{{$v_order->order_id ?? ''}}">
													
						          <div class="col-md-2 col-xs-2 col-sm-2">
						        
						         <select name="order_status" class="form-control order_status" >
						          <option value="pending"
						          <?php if($v_order->order_status=='pending'){?> selected="selected"<?php }?>>pending</option>

						          <option value="dispatched"
						            <?php if($v_order->order_status=='dispatched'){?> selected="selected"<?php }?>>dispatched</option>

						          <option value="processed"
						          <?php if($v_order->order_status=='processed'){?> selected="selected"<?php }?>>processed</option>

						          <option value="shipped"
						          <?php if($v_order->order_status=='shipped'){?> selected="selected"<?php }?>>shipped</option>

						          <option value="cancelled"
						          <?php if($v_order->order_status=='cancelled'){?> selected="selected"<?php }?>>cancelled</option>

						          <option value="delivered" 
						          {{ $v_order->order_status=='delivered' ?'selected' : ''}}>delivered</option>
						      </select>
						        
						          </div>
						          </form>	

									</td>

                                    <td>
								

									<a class="btn btn-info" href="{{URL::to('/view-order/'.$v_order->order_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a class="btn btn-danger" 
									href="{{URL::to('/delete-order/'.$v_order->order_id)}}" onclick="return confirm('Are you sure');">
										<i class="halflings-icon white trash"></i> 
									</a>

								
								</td>
							</tr>
						
						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

@endsection
@section('js')
<script>
		$(document).ready(function() {
			$(document).on('change','.order_status',function(e){
				e.preventDefault()
			  	console.log('paise')
			     // document.forms[".myFormName"].submit();
			      this.form.submit();
			  });
	})
</script>
@endsection
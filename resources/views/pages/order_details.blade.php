@extends('welcome')
@section('content')


			
			
					<div class="box-header">
						<h4><i class="halflings-icon align-justify"></i><span class="break"></span> Order Details</h4>
						
					</div>
                     	<div class="box-content">
						<table class="table">
							  <thead>
								  <tr>
									  <td class="image">SL</td>
									  <th>Product Name</th>
									  <th>Product Price</th>
									  <th>Product sales Quantity</th>
									  <th>Total Amount</th>                                          
								  </tr>
							  </thead>   
							  <tbody>
							   @foreach($order_details as $v_order_details)
								<tr>
									 <td>{{$loop->iteration}}</td>
								     <td>{{$v_order_details->product_name}}</td>
								     <td>{{$v_order_details->product_price}} Tk</td>
								     <td>{{$v_order_details->product_sales_quantity}}</td>
								     <td>{{$v_order_details->product_price*$v_order_details->product_sales_quantity}} Tk</td>

								</tr>
						        @endforeach                       
							  </tbody>
							  <tfoot>
							  	<tr>
							  	<th colspan="4">Total with vat</th>
							  	<td><strong>{{$v_order_details->order_total}} Tk</strong></td>
							  	</tr>
							  </tfoot>
						 </table> 
						 <td><a href="{{URL::to('/my-order')}}" class="btn btn-info">My Order</a></td>
						</div>
				
			



@endsection
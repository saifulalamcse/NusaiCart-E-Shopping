@extends('welcome')
@section('content')


	<section id="cart_items">
		<div class="container col-sm-12">
		
			<div class="table-responsive cart_info">
                 <?php 
                    
                    $content=Cart::content();
                    
                 ?>
              <p>My Order</p>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">SL</td>
							<td class="description">Order ID</td>
							<td class="price">Order Date</td>
							<td class="quantity">Status</td>
							<td class="total">Total</td>
							<td class="total">Order Details</td>
							<td class="track">Track Order</td>
							
							
						</tr>
					</thead>
					<tbody>
						@foreach($order as $data)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$data->order_id ?? ''}}</td>
							<td>{{$data->created_at ?? ''}}</td>
							<td>{{$data->order_status ?? ''}}</td>
							<td>{{$data->order_total ?? ''}}</td>
							<td><a href="{{URL::to('/order-details/'.$data->order_id)}}" class="btn btn-info">Click here</a></td>
							<td><a href="{{URL::to('/track-order/'.$data->order_id)}}" class="btn btn-info">Click here</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	
@endsection
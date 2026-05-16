@extends('admin_layout')
@section('admin_content')

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">view Coupon</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>view coupons</h2>	
					</div>
					 
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

					<div class="widget-content nopadding">
            <table class="table table5-kw
              0-bordered data-table">
              <thead>
                <tr>
                  <th>Coupon ID</th>
                  <th>Coupon Code</th>
                  <th>Amount</th>
                  <th>Amount Type</th>
                  <th>Expiry Date</th>
                  <th>Created Dates</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($coupons as $coupon)
                <tr class="gradeX">
                  <td>{{ $coupon->id }}</td>
                  <td>{{ $coupon->coupon_code }}</td>
                  <td>{{ $coupon->amount }}
                  @if($coupon->amount_type=="Percentage")% @else Tk @endif
                  
                  </td>
                  <td>{{ $coupon->amount_type }}</td>
                  <td>{{ $coupon->expiry_date }}</td>
                  <td>{{ $coupon->created_at }}</td>
                  <td>
                     @if($coupon->status==1)Active @else Inactive @endif

                  
                  </td>
                  
                  <td class="center">
                    <a class="btn btn-danger" 
                            href="{{URL::to('/delete-coupon/'.$coupon->id)}}" onclick="return confirm('Are you sure');">
                            <i class="halflings-icon white trash"></i> 
                    </a>

                    <a class="btn btn-info" href="{{URL::to('/edit-coupon/'.$coupon->id)}}">
                    <i class="halflings-icon white edit"></i>  
                  </a>
                  </td>
                </tr>
                    
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    



@endsection
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
		<a href="#">Update Coupon</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Coupon</h2>	
		</div>
		 
		

		<div class="box-content">
			<form class="form-horizontal" action="{{ url('/update-coupon',$edit_coupons->id) }}" method="post">
				{{ csrf_field() }}
			  <fieldset>
					<div class="control-group">
					<label class="control-label" for="selectError3">Amount</label>
					<div class="controls">
					<input type="number" value="{{$edit_coupons->amount}}" class="input-xlarge" name="amount" min="0" required="">

					</div>
				  </div>

				  <div class="control-group">
					<label class="control-label" for="selectError3">Amount type</label>
					<div class="controls">
					  <select id="amount_type" value="{{$edit_coupons->amount_type}}" name="amount_type">
						<option>Select type</option>
						<option value="Percentage">Percentage</option>
					    <option value="Fixed">Fixed</option>

						
					  </select>
					</div>
				  </div>

				         
				<div class="control-group">
				  <label class="control-label" for="date01">Expiry date</label>
				  <div class="controls">
					  <input type="date" value="{{$edit_coupons->expiry_date}}" id="expiry_date" name="expiry_date">

				  </div>
				</div>


				<div class="form-actions">
				  <button type="submit" class="btn btn-primary"> Save</button>
				
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->


@endsection
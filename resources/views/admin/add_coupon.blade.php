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
					<a href="#">Add Coupon</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Coupon</h2>	
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

					<div class="box-content">
						<form class="form-horizontal" action="{{ url('/save-coupon') }}" 
						method="post">
							{{ csrf_field() }}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">Coupon Code</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="coupon_code" required="" minlength="5" maxlength="15">
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Amount</label>
								<div class="controls">
								<input type="number" class="input-xlarge" name="amount" min="0" required="">

								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="selectError3">Amount type</label>
								<div class="controls">
								  <select id="amount_type" name="amount_type">
									<option>Select type</option>
									
								    <option value="Fixed">Fixed</option>

									
								  </select>
								</div>
							  </div>
    
							

							<div class="control-group">
							  <label class="control-label" for="date01">Expiry date</label>
							  <div class="controls">
								  <input type="date" id="expiry_date" name="expiry_date">

							  </div>
							</div>

							
							

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Satus </label>
							  <div class="controls">
								<input type="checkbox" name="status" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Coupon</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection